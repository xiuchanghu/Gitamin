<?php

/*
 * This file is part of Gitamin.
 * 
 * Copyright (C) 2015-2016 The Gitamin Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gitamin\Events\ProjectNamespace;

use Gitamin\Models\ProjectNamespace;

class ProjectNamespaceWasAddedEvent
{
    /**
     * The project team that was added.
     *
     * @var \Gitamin\Models\ProjectTeam
     */
    public $group;

    /**
     * Create a new project team was added event instance.
     *
     * @return void
     */
    public function __construct(ProjectNamespace $group)
    {
        $this->group = $group;
    }
}
