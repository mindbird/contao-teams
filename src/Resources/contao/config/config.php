<?php

$GLOBALS ['BE_MOD'] ['content'] ['teams'] = [
    'tables' => [
        'tl_teams_archive',
        'tl_teams'
    ]
];

$GLOBALS['TL_MODELS']['tl_teams'] = \Mindbird\Contao\Teams\Models\Teams::class;
