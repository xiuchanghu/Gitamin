<?php

/*
 * This file is part of Gitamin.
 * 
 * Copyright (C) 2015-2016 The Gitamin Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gitamin\Handlers\Commands\User;

use Gitamin\Commands\User\SignupUserCommand;
use Gitamin\Events\User\UserWasAddedEvent;
use Gitamin\Models\User;

class SignupUserCommandHandler
{
    /**
     * Handle the signup user command.
     *
     * @param \Gitamin\Commands\User\SignupUserCommand $command
     *
     * @return \Gitamin\Models\User
     */
    public function handle(SignupUserCommand $command)
    {
        $user = User::create([
            'username' => $command->username,
            'password' => $command->password,
            'email'    => $command->email,
            'level'    => 2,
        ]);

        event(new UserWasAddedEvent($user));

        return $user;
    }
}
