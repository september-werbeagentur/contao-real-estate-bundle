<?php

declare(strict_types=1);

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Tests;

use Contao\CoreBundle\Routing\UrlGenerator;
use Symfony\Component\HttpFoundation\Request;
use SeptemberWerbeagentur\ContaoRealEstateBundle\EventListener\NavigationListener;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouterInterface;

class NavigationListenerTest extends TestCase
{
    public function testCanAddMenuEntry()
    {
        $GLOBALS['TL_LANG']['MOD']['september_real_estate']['label'] = "label0";
        $GLOBALS['TL_LANG']['MOD']['september_real_estate']['title'] = "title0";

        $request = Request::create('/contao');
        $requestStack = new RequestStack();
        $requestStack->push($request);

        $router = $this->createMock(RouterInterface::class);

        $navigationListener = new NavigationListener($requestStack, $router);
        $arrModules = [
          'content' => [
            'modules' => [
              'module1' => [
                'label' => 'label1',
                'title' => 'title1',
                'href' => '/contao'
              ]
            ]
          ]
        ];

        $arrModulesWithNewEntry = $navigationListener->onGetUserNavigation($arrModules);

        $this->assertNotSame($arrModules,$arrModulesWithNewEntry);
        $this->assertArrayHasKey('realEstate',$arrModulesWithNewEntry['content']['modules']);
    }
}