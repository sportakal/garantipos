<?php

namespace Sportakal\Garantipos\Requests;

use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\PostRequestModel;
use Sportakal\Garantipos\Requests\Constructors\PostRequest;
use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;
use Sportakal\Garantipos\Results\ThreeDSecurePayResult;
use Sportakal\Garantipos\Results\InitializeThreeDSecureResult;
use Sportakal\Garantipos\Utils\CreateHashData;

class ThreeDSecurePay extends PostRequest
{

    public function __construct(PostRequestModel $requestModel, string $secure3dsecuritylevel = '3D_PAY')
    {
        $requestModel->setSecure3dsecuritylevel($secure3dsecuritylevel);
        parent::__construct($requestModel);
    }

    public function setHashData(): void
    {
        $this->setSecurityData();
        $string = '';
        $string .= $this->requestModel->getTerminal()->getID();
        $string .= $this->requestModel->getOrder()->getOrderID();
        $string .= $this->requestModel->getTransaction()->getAmount();
        $string .= $this->requestModel->getSuccessURL();
        $string .= $this->requestModel->getErrorURL();
        $string .= $this->requestModel->getTransaction()->getType();
        $string .= $this->requestModel->getTransaction()->getInstallmentCnt();
        $string .= $this->requestModel->getOptions()->getStoreKey();
        $string .= $this->security_data;
        $this->hash_data = CreateHashData::get($string);

        $this->requestModel->setHash($this->hash_data);
    }

    public function getResult(): InitializeThreeDSecureResult
    {
        if (empty($this->response)) {
            $this->exec();
        }

        return (new InitializeThreeDSecureResult($this->response));
    }
}
