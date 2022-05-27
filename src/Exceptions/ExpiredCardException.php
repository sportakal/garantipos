<?php

namespace Sportakal\Garantipos\Exceptions;

class ExpiredCardException extends \Exception
{
    public function __construct($message = "Card Expired", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
