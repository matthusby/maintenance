<?php

namespace Stevebauman\Maintenance\Services;

use Cartalyst\Sentry\Groups\Eloquent\Group;

class SentryGroupService extends BaseModelService
{
    public function __construct(Group $group)
    {
        $this->model = $group;
    }
}
