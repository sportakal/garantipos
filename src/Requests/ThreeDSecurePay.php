<?php

namespace Sportakal\Garantipos\Requests;

use Sportakal\Garantipos\Models\RequestModel;
use Sportakal\Garantipos\Requests\Constructors\PostRequest;
use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;
use Sportakal\Garantipos\Results\ThreeDSecurePayResult;
use Sportakal\Garantipos\Results\InitializeThreeDSecureResult;
use Sportakal\Garantipos\Utils\CreateHashData;

class ThreeDSecurePay extends PostRequest
{
    protected string $secure3dsecuritylevel;

    public function setHashData(): void
    {
        $this->setSecurityData();
        $string = '';
        $string .= $this->GVPSRequest->getTerminal()->getID();
        $string .= $this->GVPSRequest->getOrder()->getOrderID();
        $string .= $this->GVPSRequest->getTransaction()->getAmount();
        $string .= $this->GVPSRequest->getSuccessURL();
        $string .= $this->GVPSRequest->getErrorURL();
        $string .= $this->GVPSRequest->getTransaction()->getType();
        $string .= $this->GVPSRequest->getTransaction()->getInstallmentCnt();
        $string .= $this->GVPSRequest->getOptions()->getStoreKey();
        $string .= $this->security_data;
        $this->hash_data = CreateHashData::get($string);

        $this->GVPSRequest->getTerminal()->setHashData($this->hash_data);
    }

    public function __construct(RequestModel $GVPSRequest, string $secure3dsecuritylevel = '3D_PAY')
    {
        parent::__construct($GVPSRequest);
        $this->secure3dsecuritylevel = $secure3dsecuritylevel;
    }

    public function getResult(): InitializeThreeDSecureResult
    {
        if (empty($this->response)) {
            $this->exec();
        }

        return (new InitializeThreeDSecureResult($this->response));
    }
}
