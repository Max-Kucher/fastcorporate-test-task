<?php

namespace App\Enum\Events;

enum EventNames: string
{
    case BUY_A_COW = 'buy a cow';

    case EXE_DOWNLOAD = 'exe download';

    case USER_LOGIN = 'user login';

    case USER_LOGOUT = 'user logout';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }
}
