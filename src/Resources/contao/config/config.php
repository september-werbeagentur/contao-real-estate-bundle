<?php

// register back end modules
array_insert($GLOBALS['BE_MOD']['content'], 2, [
    'SeptemberRealEstate' => [
        'tables' => ['tl_realestate', 'tl_realestate_objects', 'tl_realestate_apartments'],
        // TODO add icon
        'table' => ['TableWizard', 'importTable'],
        'list' => ['ListWizard', 'importList']
    ]
]);

// Front end modules
array_insert($GLOBALS['FE_MOD'], 3, [
    'SeptemberRealEstate' => [
        'propertylist' => 'SeptemberWerbeagentur\ContaoRealEstateBundle\Module\ModulePropertyList',
        'propertyreader' => 'SeptemberWerbeagentur\ContaoRealEstateBundle\Module\ModulePropertyReader',
        'apartmentreader' => 'SeptemberWerbeagentur\ContaoRealEstateBundle\Module\ModuleApartmentReader'
    ]
]);

$GLOBALS['TL_CSS'][] = 'bundles/contaorealestate/lib/realestate.css|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/contaorealestate/lib/slider.js|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/contaorealestate/js/autofill-form.js|static';

$GLOBALS['TL_MODELS']['tl_realestate'] = 'SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateModel';
$GLOBALS['TL_MODELS']['tl_realestate_objects'] = 'SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateObjectsModel';
$GLOBALS['TL_MODELS']['tl_realestate_apartments'] = 'SeptemberWerbeagentur\ContaoRealEstateBundle\Model\RealestateApartmentsModel';
