<?php

namespace Sportakal\Garantipos\Utils;

use Sportakal\Garantipos\Models\Options;

class CreateHashData
{
    public static function get(string $string): string
    {
        return strtoupper(sha1($string));
    }
}
