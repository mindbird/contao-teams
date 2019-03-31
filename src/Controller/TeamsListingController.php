<?php

/*
 * This file is part of [contao-teams].
 *
 * (c) mindbird
 *
 * @license LGPL-3.0-or-later
 */

namespace Mindbird\Contao\Teams\Controller;

use Contao\Controller;
use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Contao\ModuleModel;
use Contao\StringUtil;
use Contao\Template;
use Mindbird\Contao\Teams\Models\Teams;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamsListingController extends AbstractFrontendModuleController
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_teams_list';

    protected $templateTeam = 'teams_list_item';

    protected function getResponse(Template $template, ModuleModel $model, Request $request): Response
    {
        $team = Teams::findBy(
            'pid',
            $model->teams_archiv,
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
        $template->html = $html;

        return $template->getResponse();
    }
}
