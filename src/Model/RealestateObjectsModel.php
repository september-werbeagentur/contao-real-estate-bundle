<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Model;

use Contao\Model;
use SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateModel;

class RealestateObjectsModel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_realestate_objects';

    public static function findAllByPid(int $pid) {
        $t = static::$strTable;
        $arrColumns = array("$t.pid=?");

        return static::findBy($arrColumns, $pid, array());
    }
}