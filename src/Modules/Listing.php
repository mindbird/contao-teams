<?php

/*
 * This file is part of [contao-teams].
 *
 * (c) mindbird
 *
 * @license LGPL-3.0-or-later
 */

namespace Mindbird\Contao\Teams\Modules;

use Contao\Controller;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Contao\Module;
use Contao\StringUtil;
use Mindbird\Contao\Teams\Models\Teams;

class Listing extends Module
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_teams_list';

    protected $templateTeam = 'teams_item';

    /**
     * Compile the current element.
     */
    protected function compile()
    {
        $team = Teams::findBy(
            'pid',
            $this->teams_archiv,
            ['order' => 'sorting ASC']
        );
        $size = StringUtil::deserialize($this->imgSize);
        $html = '';
        if ($team) {
            while ($team->next()) {
                $template = new FrontendTemplate($this->templateTeam);
                $template->team = $team;

                $file = FilesModel::findByPk($team->image);
                if (null !== $file) {
                    if (null !== $file->path) {
                        Controller::addImageToTemplate($template, [
                            'singleSRC' => $file->path,
                            'size' => $size,
                            'alt' => $team->name,
                        ]);
                    }
                }

                $html .= $template->parse();
            }
        }
        $this->Template->strPeople = $html;
    }
}
