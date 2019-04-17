<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\EventListener;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\RouterInterface;

class NavigationListener
{
    protected $requestStack;
    protected $router;

    public function __construct(
        RequestStack $requestStack,
        RouterInterface $router
    ) {
        $this->requestStack = $requestStack;
        $this->router = $router;
    }

    public function onGetUserNavigation($arrModules)
    {
        $request = $this->requestStack->getCurrentRequest();

        // Todo find out if sorting can be manipulated
        $arrModules['content']['modules'] = array_merge(
          [
            'realEstate' => [
              'label' => $GLOBALS['TL_LANG']['MOD']['september_real_estate']['label'],
              'title' => $GLOBALS['TL_LANG']['MOD']['september_real_estate']['title'],
              'class' => 'navigation',
              'href' => $this->router->generate('contao_real_estate'),
              'isActive' => 'contao_real_estate' === $request->attributes->get('_route'),
            ],
          ],
          $arrModules['content']['modules']
        );

        return $arrModules;
    }
}
