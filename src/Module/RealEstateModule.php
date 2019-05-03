<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Module;

use BackendTemplate;
use Module;

class RealEstateModule extends Module
{
    /**
     * @var string
     */
    protected $strTemplate = "mod_realestate";

    /**
     * Displays a wildcard in the back end.
     *
     * @return string
     */
    public function generate()
    {
        if(TL_MODE == 'BE') {
            $template = new BackendTemplate('be_wildcard');

            $template->wildcard = '### '.strtoupper($GLOBALS['TL_LANG']['MOD']['september_real_estate']['label']).' ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id='.$this->id;

            return $template->parse();
        }
        return parent::generate();
    }

    protected function compile()
    {
        // TODO figure out if we need this and what to write here
        $this->Template->message = 'empty';
    }
}
