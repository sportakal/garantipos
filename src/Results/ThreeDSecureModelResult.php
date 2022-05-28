<?php

namespace Sportakal\Garantipos\Results;

use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\PostRequestModel;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Requests\InitializeThreeDSecure;
use Sportakal\Garantipos\Requests\ThreeDSecurePay;
use Sportakal\Garantipos\Results\Constructors\PostResult;

class ThreeDSecureModelResult extends PostResult
{
    public function setHashData(): void
    {
        $pay = new InitializeThreeDSecure($this->request_model);
        $this->hash_data = $pay->getHashData();;
    }
}
