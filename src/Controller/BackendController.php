<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BackendController extends Controller
{
    public function indexAction()
    {
        $this->get('contao.framework')->initialize();

        return new Response($this->get('twig')->render('@ContaoRealEstate/Backend/index.html.twig'));
    }
}
