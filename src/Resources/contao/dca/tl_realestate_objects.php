<?php

$GLOBALS['TL_DCA']['tl_realestate_objects'] = [
    'config' => [
        'dataContainer' => 'Table',
        'ptable' => 'tl_realestate',
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
            'mode' => 4,
            'fields' => ['id','name'],
            'headerFields' => ['name'],
            'flag' => 1,
            'panelLayout' => 'debug;filter;sort,search,limit',
            'child_record_callback' => array('tl_realestate_objects', 'listEntries'),
            'child_record_class' => 'no_padding',
            'disableGrouping' => true,
        ],
        'global_operations' => [
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate_objects']['edit'],
                'href' => 'table=tl_realestate_apartments',
                'icon' => 'edit.gif',
            ],
            'editheader' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate_objects']['editheader'],
                'href' => 'act=edit',
                'icon' => 'header.gif',
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate_objects']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif',
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate_objects']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_realestate_objects']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ],
    ],
    'palettes' => [
        '__selector__' => [],
        'default' => '{data_legend},name;{details_legend},description',
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
			'foreignKey'              => 'tl_realestate.id',
			'sql'                     => "int(10) unsigned NOT NULL default 0",
			'relation'                => array('type'=>'belongsTo', 'load'=>'lazy')
		),
        'name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_objects']['name'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'maxlength' => 255,
                'tl_class' => 'w50'
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'description' => [
            'label' => &$GLOBALS['TL_LANG']['tl_realestate_objects']['description'],
            'inputType' => 'textarea',
            'eval' => [
                'rte' => 'tinyMCE',
                'helpwizard' => true
            ],
            'sql' => "text NULL"
        ],
    ]
];

/**
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_realestate_objects extends Contao\Backend
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
        <li>{$arrRow['name']}</strong>
    </ul>
</div>
EOF;
	}
}

