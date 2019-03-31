<?php

/**
 * Table tl_teams
 */
$GLOBALS ['TL_DCA'] ['tl_teams'] = [
    // Config
    'config' => [
        'dataContainer' => 'Table',
        'ptable' => 'tl_teams_archive',
        'switchToEdit' => true,
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'pid' => 'index'
            ]
        ]
    ],
    // List
    'list' => [
        'sorting' => [
            'mode' => 4,
            'fields' => [
                'sorting'
            ],
            'headerFields' => [
                'title'
            ],
            'child_record_callback' => array(
                '\Mindbird\Contao\Teams\Table\Teams',
                'listTeam'
            )
        ],
        'label' => [
            'fields' => [
                'name'
            ],
            'format' => '%s'
        ],
        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS ['TL_LANG'] ['MSC'] ['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();"'
            ]
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_teams'] ['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
            ],
            'copy' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_teams'] ['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ],
            'delete' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_teams'] ['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS ['TL_LANG'] ['MSC'] ['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ],
            'show' => [
                'label' => &$GLOBALS ['TL_LANG'] ['tl_teams'] ['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ]
    ],
    // Palettes
    'palettes' => [
        'default' => '{name_legend}, name, function, race, description; {image_legend}, image;'
    ],
    // Fields
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'pid' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'sorting' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'name' => [
            'label' => &$GLOBALS ['TL_LANG'] ['tl_teams'] ['name'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'tl_class' => 'w50',
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'function' => [
            'label' => &$GLOBALS ['TL_LANG'] ['tl_teams'] ['function'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'race' => [
            'label' => &$GLOBALS ['TL_LANG'] ['tl_teams'] ['race'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'maxlength' => 255
            ],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'image' => [
            'label' => &$GLOBALS ['TL_LANG'] ['tl_teams'] ['image'],
            'exclude' => true,
            'search' => false,
            'inputType' => 'fileTree',
            'eval' => [
                'filesOnly' => true,
                'fieldType' => 'radio',
                'tl_class' => 'clr',
                'extensions' => 'jpg, jpeg, png, gif'
            ],
            'sql' => "binary(16) NULL"
        ],
        'description' => [
            'label' => &$GLOBALS['TL_LANG']['tl_teams']['description'],
            'exclude' => true,
            'search' => true,
            'inputType' => 'textarea',
            'eval' => [
                'rte' => 'tinyMCE'
            ],
            'sql' => "mediumtext NULL"
        ]
    ]
];
