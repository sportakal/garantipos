<?php

namespace Sportakal\Garantipos\Results;

use Sportakal\Garantipos\Models\Address;
use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\Item;
use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\PostRequestModel;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Requests\ThreeDSecurePay;
use Sportakal\Garantipos\Results\Constructors\PostResult;

class ThreeDSecurePayResult extends PostResult
{
    public function setHashData(): void
    {
        $pay = new ThreeDSecurePay($this->request_model);
        $this->hash_data = $pay->getHashData();
    }
}
