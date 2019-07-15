<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Module;

use Contao\Config;
use Contao\Input;
use Contao\Module as Module;
use Contao\PageModel;
use Contao\StringUtil;
use Patchwork\Utf8;
use SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateApartmentsModel;
use SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateModel;
use SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateObjectsModel;

class ModuleApartmentReader extends Module
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_apartmentreader';

    /**
     * Display a wildcard in the back end
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '###' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['apartmentreader'][0]) . '###';
            $objTemplate->title = $this->name;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        // Set the item from the auto_item parameter
        if (!isset($_GET['items']) && Config::get('useAutoItem') && isset($_GET['auto_item'])) {
            Input::setGet('items', Input::get('auto_item'));
        }
        // Do not index or cache the page if no property has been specified
        if (!Input::get('items')) {
            /** @var PageModel $objPage */
            global $objPage;
            $objPage->noSearch = 1;
            $objPage->cache = 0;
            return '';
        }

        return parent::generate();
    }

    /**
     * Compile the current element
     */
    protected function compile()
    {
        /** @var PageModel $objPage */
        global $objPage;

        $objApartment = RealestateApartmentsModel::findByIdOrAlias(Input::get('items'));

        $this->Template->back = $GLOBALS['TL_LANG']['MSC']['goBack'];
        $this->Template->referer = 'javascript:history.go(-1)';

        if (null !== ($objImage = \FilesModel::findByUuid($objApartment->image))) {
            $this->Template->imagePath = $objImage->path;
        }

        // Get address from the project
        $objObject = RealestateObjectsModel::findByPk($objApartment->pid);
        $objProject = RealestateModel::findByPk($objObject->pid);
        $this->Template->address = $objProject->address;
        $this->Template->projectName = $objProject->name;

        $this->Template->name = $objApartment->name;
        $this->Template->availability = $objApartment->availability;
        $this->Template->number = $objApartment->number;
        $this->Template->floor = $objApartment->floor;
        $this->Template->roomcount = $objApartment->roomcount;
        $this->Template->rooms = StringUtil::deserialize($objApartment->rooms);
        $this->Template->area = $objApartment->area;
        $this->Template->description = $objApartment->description;
        $this->Template->highlights = $objApartment->highlights;
        $this->Template->features_apartment = StringUtil::deserialize($objApartment->features_apartment);
        $this->Template->features_object = StringUtil::deserialize($objApartment->features_object);
        $this->Template->features_infrastructure = StringUtil::deserialize($objApartment->features_infrastructure);
    }
}