<?php

$GLOBALS['TL_HOOKS']['getUserNavigation'][] = ['real_estate.navigation_listener', 'onGetUserNavigation'];

// register back end modules
array_insert($GLOBALS['BE_MOD']['content'], 2 ,[
    'SeptemberRealEstate' => [
        'tables' => ['tl_realestate'],
        // TODO add icon
        'table' => ['TableWizard', 'importTable'],
        'list' => ['ListWizard', 'importList']
    ]
]);
