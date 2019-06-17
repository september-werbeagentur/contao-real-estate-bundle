<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Module;

use Contao\Module as Module;
use Contao\PageModel;
use Patchwork\Utf8;
use SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateModel as RealestateModel;

class ModulePropertyList extends Module
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_propertylist';

    /**
     * Display a wildcard in the back end
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '###' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['propertylist'][0]) . '###';
            $objTemplate->title = $this->name;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }
        return parent::generate();
    }

    /**
     * Compile the current element
     */
    protected function compile()
    {
        $this->Template->publishedProperties = $this->getPublishedProperties();
        $jumpToId = (int)$this->jumpTo;
        $jumpTo = PageModel::findByPk($jumpToId);
        $this->Template->jumpTo = ampersand($jumpTo->getFrontendUrl());
    }

    private function getPublishedProperties()
    {
        // TODO get all published properties and return them
        return RealestateModel::findPublished();
    }
}