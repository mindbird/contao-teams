<?php

$GLOBALS ['TL_DCA'] ['tl_module'] ['palettes'] ['teams_list'] = '{title_legend},name,headline,type;{archiv_legend},teams_archiv,imgSize;';

$GLOBALS ['TL_DCA'] ['tl_module'] ['fields'] ['teams_archiv'] = array(
    'label' => &$GLOBALS ['TL_LANG'] ['tl_module'] ['teams_archiv'],
    'default' => '',
    'exclude' => true,
    'inputType' => 'select',
    'foreignKey' => 'tl_teams_archive.title',
    'eval' => array(
        'mandatory' => true,
        'tl_class' => 'w50'
    ),
    'sql' => "int(10) unsigned NOT NULL default '0'"
);
