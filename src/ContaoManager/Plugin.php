<?php

namespace SeptemberWerbeagentur\ContaoRealEstateBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use SeptemberWerbeagentur\ContaoRealEstateBundle\ContaoRealEstateBundle;


class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoRealEstateBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
