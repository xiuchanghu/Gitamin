<?php

/*
 * This file is part of Gitamin.
 * 
 * Copyright (C) 2015-2016 The Gitamin Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gitamin\Events\Invite;

use Gitamin\Models\Invite;

final class InviteWasClaimed
{
    /**
     * The invite that has been claimed.
     *
     * @var \Gitamin\Models\Invite
     */
    public $invite;

    /**
     * Create a new invite was claimed event instance.
     *
     * @return void
     */
    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
    }
}
