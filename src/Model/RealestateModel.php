<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Model;

use Contao\Model;

class RealestateModel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_realestate';

    public static function findPublished()
    {
        /*
         * TODO: either implement some logic in here or just use findAll() instead
         * of this method.
         */
        return static::findAll();
    }
}