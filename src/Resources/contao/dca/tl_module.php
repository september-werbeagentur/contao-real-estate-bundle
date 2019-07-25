<?php

// Add palette to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['propertylist'] = '{title_legend},name,type,jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['propertyreader'] = '{title_legend},name,type,jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


$GLOBALS['TL_DCA']['tl_module']['fields']['september_realEstate_jumpTo'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['jumpTo'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'foreignKey' => 'tl_page.title',
    'eval' => [
        'fieldType' => 'radio',
        'tl_class' => 'clr'
    ],
    'sql' => "int(10) unsigned NOT NULL default 0",
    'relation' => [
        'type' => 'hasOne',
        'load' => 'lazy'
    ]
];
