<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Model;

use Contao\Model;

class RealestateApartmentsModel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_realestate_apartments';

    public static function findAllByPid(int $pid) {
        $t = static::$strTable;
        $arrColumns = array("$t.pid=?");

        return static::findBy($arrColumns, $pid, array());
    }
}