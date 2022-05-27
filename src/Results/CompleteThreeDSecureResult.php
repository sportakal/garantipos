<?php

namespace Sportakal\Garantipos\Results;

use Sportakal\Garantipos\Results\Constructors\XmlResult;

class CompleteThreeDSecureResult extends XmlResult
{
    public function setHashData(): void
    {
        $this->hash_data = "";
    }
}
