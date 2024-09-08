<?php

namespace App\Enum\Users\Permissions;

enum Permissions: string
{
    case VIEW_STATISTICS = 'view statistics';

    case VIEW_REPORTS = 'view reports';
}
