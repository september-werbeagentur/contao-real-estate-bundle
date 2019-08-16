<?php

$GLOBALS['TL_DCA']['tl_realestate_apartments'] = [
    'config' => [
        'dataContainer' => 'Table',
        'ptable' => 'tl_realestate_objects',
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
            'mode' => 4,
            'fields' => ['number','roomcount','floor'],
            'headerFields' => ['name'],
            'flag' => 1,
            'panelLayout' => 'debug;filter;sort,search,limit',
            'child_record_callback' => array('tl_realestate_apartments', 'listEntries'),
            'child_record_class' => 'no_padding',
            'disableGrouping' => true,
        ],
        'global_operations' => [
        ],
        'operations' => [
            'editheader' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['editheader'],
                'href' => 'act=edit',
                'icon' => 'header.gif',
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif',
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ],
    ],
    'palettes' => [
        '__selector__' => [],
        'default' => '{data_legend},number,floor,roomcount,rooms,misc,area,availability;{details_legend},description,highlights;{features_legend},features_apartment,features_object,features_infrastructure;{image_legend},images,blueprints',
    ],
    // TODO add 'availability'
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'pid' => array
		(
			'foreignKey'              => 'tl_realestate_objects.id',
			'sql'                     => "int(10) unsigned NOT NULL default 0",
			'relation'                => array('type'=>'belongsTo', 'load'=>'lazy')
		),
        'number' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['number'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'maxlength' => 20,
                'tl_class' => 'w50'
            ],
            'sql' => "varchar(20) NOT NULL default ''"
        ],
        'floor' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['floor'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'maxlength' => 50,
                'tl_class' => 'w50'
            ],
            'sql' => "varchar(50) NOT NULL default ''"
        ],
        'roomcount' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['roomcount'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'maxlength' => 3,
                'tl_class' => 'w50',
                'rgxp' => 'digit'
            ],
            'sql' => "varchar(3) NOT NULL default ''"
        ],
        'rooms' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['rooms'],
            'exclude' => true,
            'inputType' => 'tableWizard',
            'eval' => [
                'allowHtml'=>true,
                'doNotSaveEmpty'=>true,
                'style'=>'width:142px;height:32px;',
                'tl_class'=>'clr'
            ],
            'sql' => "blob NULL"
        ],
        'area' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['area'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'maxlength' => 20,
                'tl_class' => 'w50'
            ],
            'sql' => "varchar(20) NOT NULL default ''"
        ],
        'availability' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['availability'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'select',
            'options' => [
                '',
                'available',
                'sold',
                'reserved'
            ],
            'reference' => &$GLOBALS['TL_LANG']['tl_realestate_apartments'],
            'eval' => [
                'mandatory' => true,
                'maxlength' => 20,
                'tl_class' => 'w50 wizard'
            ],
            'sql' => "varchar(20) NOT NULL default ''"
        ],
        'highlights' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['highlights'],
            'inputType' => 'textarea',
            'eval' => [
                'mandatory' => true,
                'rte' => 'tinyMCE',
                'helpwizard' => true
            ],
            'sql' => "text NULL"
        ],
        'misc' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['misc'],
            'inputType' => 'text',
            'eval' => ['mandatory' => true],
            'sql' => "varchar(50) NULL"
        ],
        'description' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['description'],
            'inputType' => 'textarea',
            'eval' => [
                'mandatory' => true,
                'rte' => 'tinyMCE',
                'helpwizard' => true
            ],
            'sql' => "text NULL"
        ],
        'features_apartment' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['features_apartment'],
            'inputType' => 'listWizard',
            'eval' => [
                'maxlength' => 60,
                'tl_class' => 'w50'
            ],
            'sql' => "blob NULL"
        ],
        'features_object' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['features_object'],
            'inputType' => 'listWizard',
            'eval' => [
                'maxlength' => 60,
                'tl_class' => 'w50'
            ],
            'sql' => "blob NULL"
        ],
        'features_infrastructure' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['features_infrastructure'],
            'inputType' => 'listWizard',
            'eval' => [
                'maxlength' => 60,
                'tl_class' => 'w50'
            ],
            'sql' => "blob NULL"
        ],
        'images' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['images'],
            'inputType' => 'fileTree',
            'eval' => [
                'fieldType'=>'checkbox',
                'filesOnly'=>true,
                'extensions'=>Contao\Config::get('validImageTypes'),
                'tl_class' => 'clr w50',
                'multiple' => true,
            ],
            'sql' => "blob NULL"
        ],
        'blueprints' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_apartments']['blueprints'],
            'inputType' => 'fileTree',
            'eval' => [
                'fieldType'=>'checkbox',
                'filesOnly'=>true,
                'extensions'=>Contao\Config::get('validImageTypes'),
                'tl_class' => 'w50',
                'multiple' => true,
            ],
            'sql' => "blob NULL"
        ],
    ]
];

/**
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_realestate_apartments extends Contao\Backend
{
    /**
	 * Render the apartment entries for the contao admin panel
	 *
	 * @param array $arrRow
	 *
	 * @return string
	 */
	public function listEntries($arrRow)
	{
        return <<<EOF
<div class="tl_content_left">
    <ul>
        <li><strong>{$GLOBALS['TL_LANG']['tl_realestate_apartments']['number'][0]}: {$arrRow['number']}</strong>
        <li>{$GLOBALS['TL_LANG']['tl_realestate_apartments']['floor'][0]}: {$arrRow['floor']}
        <li>{$GLOBALS['TL_LANG']['tl_realestate_apartments']['roomcount'][0]}: {$arrRow['roomcount']}
        <li>{$GLOBALS['TL_LANG']['tl_realestate_apartments']['area'][0]}: {$arrRow['area']}
    </ul>
</div>
EOF;
	}
}

