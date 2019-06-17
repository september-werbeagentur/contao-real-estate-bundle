<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Module;

use Contao\Config;
use Contao\Input;
use Contao\Module as Module;
use Contao\PageModel;
use Contao\StringUtil;
use Patchwork\Utf8;
use SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateApartmentsModel;
use SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateModel as RealestateModel;

class ModulePropertyReader extends Module
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_propertyreader';

    /**
     * Display a wildcard in the back end
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '###' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['propertyreader'][0]) . '###';
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
        $this->Template->back = $GLOBALS['TL_LANG']['MSC']['goBack'];
        $this->Template->referer = 'javascript:history.go(-1)';
        $objApartments = RealestateApartmentsModel::findAllByPid($this->id);

        if ($objApartments !== null ) {
            $arrTemp = array();
            while ($objApartments->next()) {
                $arrTemp[] = $objApartments->row();
            }
            $this->Template->apartments = $arrTemp;
        }

        $objProperty = RealestateModel::findByIdOrAlias(Input::get('items'));
        if (null !== ($objImage = \FilesModel::findByUuid($objProperty->image))) {
            $this->Template->imagePath = $objImage->path;
        }
        if (null !== ($objImage = \FilesModel::findByUuid($objProperty->logo))) {
            $this->Template->logoPath = $objImage->path;
        }

        $this->Template->name = $objProperty->name;
        $this->Template->address = $objProperty->address;
        $this->Template->teaser = $objProperty->teaser;
        $this->Template->description = $objProperty->description;
        $this->Template->features = StringUtil::deserialize($objProperty->features);
    }
}