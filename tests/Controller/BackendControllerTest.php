<?php

declare(strict_types=1);

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Tests\Controller;

use SeptemberWerbeagentur\ContaoRealEstateBundle\Controller\BackendController;
use Contao\CoreBundle\Security\Authentication\FrontendPreviewAuthenticator;
use PHPUnit\Framework\TestCase;

class BackendControllerTest extends TestCase
{

    public function testCanBeInstantiated(): void
    {
        $controller = new BackendController();
        $this->assertInstanceOf('SeptemberWerbeagentur\ContaoRealEstateBundle\Controller\BackendController',
          $controller);
    }
}
