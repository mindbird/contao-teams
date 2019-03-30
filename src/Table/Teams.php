<?php

namespace Mindbird\Contao\Person\Table;

use Contao\FilesModel;
use Contao\Image;

class Teams
{
    public function listTeam($row)
    {
        $return = '';
        if ($row['image'] != null) {
            $file = FilesModel::findByPk(deserialize($row['image']));
            $singleSRC = $file->path;
            $return = '<figure style="float: left; margin-right: 1em;"><img src="' .
                Image::get($singleSRC, 80, 80, 'center_top') .
                '"></figure>';
        }
        $return .= '<div>' . $row ['name'] . '</div>';

        return $return;
    }

}
