<?php

namespace Sportakal\Garantipos\Requests;

use Sportakal\Garantipos\Models\Card;
use Sportakal\Garantipos\Models\Customer;
use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\Options;
use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\Secure3D;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Requests\Constructors\XmlRequest;
use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;
use Sportakal\Garantipos\Results\PayResult;
use Sportakal\Garantipos\Results\RefundResult;
use Sportakal\Garantipos\Results\CompleteThreeDSecureResult;
use Sportakal\Garantipos\Results\ThreeDSecureModelResult;
use Sportakal\Garantipos\Utils\CreateHashData;

class CompleteThreeDSecure extends XmlRequest
{
    public function __construct(GVPSRequestModel $GVPSRequest)
    {
        parent::__construct($GVPSRequest);
    }


    public function setHashData(): void
    {
        $this->setSecurityData();
        $string = '';
        $string .= $this->requestModel->getOrder()->getOrderID();
        $string .= $this->requestModel->getTerminal()->getID();
        $string .= $this->requestModel->getTransaction()->getAmount();
        $string .= $this->security_data;
        $this->hash_data = CreateHashData::get($string);

        $this->requestModel->getTerminal()->setHashData($this->hash_data);
    }

    /**
     * @throws \DOMException
     * @throws \JsonException
     */
    public function getResult(): CompleteThreeDSecureResult
    {
        if (empty($this->response)) {
            $this->exec();
        }
        return (new CompleteThreeDSecureResult($this->response->getArray(), $this->requestModel));
    }

}
