<?php

/*
 * This file is part of [contao-teams].
 *
 * (c) mindbird
 *
 * @license LGPL-3.0-or-later
 */

namespace Mindbird\Contao\Teams\Tests;

use Contao\SkeletonBundle\TeamsBundle;
use PHPUnit\Framework\TestCase;

class TeamsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new TeamsBundle();

        $this->assertInstanceOf('Contao\SkeletonBundle\TeamsBundle', $bundle);
    }
}
