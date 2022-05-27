<?php

namespace Sportakal\Garantipos\Utils;

use Sportakal\Garantipos\Models\Options;

class GetHost
{
    /**
     * @param string $mode
     * @return string
     */
    public static function get(string $mode = 'TEST', $xml = false): string
    {
        if ($mode === 'TEST') {
            if ($xml) {
                return 'https://sanalposprovtest.garanti.com.tr/VPServlet';
            }
            return 'https://sanalposprovtest.garanti.com.tr/servlet/gt3dengine';
        }

        if ($xml) {
            return 'https://sanalposprov.garanti.com.tr/VPServlet';
        }
        return 'https://sanalposprov.garanti.com.tr/servlet/gt3dengine';
    }
}
