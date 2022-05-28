<?php

namespace Sportakal\Garantipos\Results;

use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Results\Constructors\XmlResult;

class PayResult extends XmlResult
{
    public function setHashData(): void
    {
        $this->hash_data = "";
    }
}
