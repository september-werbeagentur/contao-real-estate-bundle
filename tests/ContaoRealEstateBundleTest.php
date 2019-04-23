<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Tests;

use SeptemberWerbeagentur\ContaoRealEstateBundle\ContaoRealEstateBundle;
use PHPUnit\Framework\TestCase;

class ContaoRealEstateBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoRealEstateBundle();
        $this->assertInstanceOf('SeptemberWerbeagentur\ContaoRealEstateBundle\ContaoRealEstateBundle', $bundle);
    }
}