<?php

$GLOBALS['TL_DCA']['tl_realestate'] = [
    'config' => [
        'dataContainer' => 'Table',
        'ctable' => array('tl_realestate_apartments'),
        'switchToEdit' => true,
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ]
        ]
    ],
    'list' => [
        'sorting' => [
            'mode' => 2,
            'fields' => ['name','address'],
            'headerFields' => ['name','address'],
            'flag' => 1,
            'panelLayout' => 'debug;filter;sort,search,limit',
        ],
        'label' => [
            'fields' => ['name','address'],
            'format' => '%s',
            'showColumns' => true,
        ],
        'global_operations' => [
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate']['edit'],
                'href' => 'table=tl_realestate_apartments',
                'icon' => 'edit.gif',
            ],
            'editheader' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate']['editheader'],
                'href' => 'act=edit',
                'icon' => 'header.gif',
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif',
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ],
    ],
    'palettes' => [
        '__selector__' => [],
        'default' => '{header_legend},name,address,logo,image;{details_legend},teaser,description,features',
    ],
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate']['name'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'address' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate']['address'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => ['maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'teaser' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate']['teaser'],
            'inputType' => 'textarea',
            'eval' => ['mandatory' => true, 'rte' => 'tinyMCE', 'helpwizard' => true],
            'sql' => "text NULL"
        ],
        'description' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate']['description'],
            'inputType' => 'textarea',
            'eval' => ['mandatory' => true, 'rte' => 'tinyMCE', 'helpwizard' => true],
            'sql' => "text NULL"
        ],
        'features' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate']['features'],
            'inputType' => 'listWizard',
            'eval' => ['maxlength' => 40, 'tl_class' => 'w50'],
            'sql' => "blob NULL"
        ],
        'logo' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate']['logo'],
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => ['fieldType'=>'radio', 'filesOnly'=>true, 'extensions'=>Contao\Config::get('validImageTypes'), 'tl_class' => 'w50'],
            'sql' => "binary(16) NULL"
        ],
        'image' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate']['image'],
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => ['fieldType'=>'radio', 'filesOnly'=>true, 'extensions'=>Contao\Config::get('validImageTypes'), 'tl_class' => 'w50'],
            'sql' => "binary(16) NULL"
        ],
    ]
];
