<?php

namespace Sportakal\Garantipos\Utils;

use Sportakal\Garantipos\Models\Options;
use Sportakal\Garantipos\Models\Terminal;

class CreateSecurityData
{
    public static function get(Terminal $terminal)
    {
        return strtoupper(sha1($terminal->getProvUserPassword() . $terminal->getID_()));
    }
}
