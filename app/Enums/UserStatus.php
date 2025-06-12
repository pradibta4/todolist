<?php

namespace App\Enums;

enum UserStatus: string
{
    case Online = 'online';
    case Invisible = 'invisible';
    case Busy = 'busy';
    case Offline = 'offline';
}