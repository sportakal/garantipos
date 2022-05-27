<?php

namespace Sportakal\Garantipos\Exceptions;

class HashCheckFailedException extends \Exception
{
    public function __construct($message = "Hash Check Failed", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
