<?php

namespace Sportakal\Garantipos\Requests;

use Sportakal\Garantipos\Models\RequestModel;
use Sportakal\Garantipos\Requests\Constructors\XmlRequest;
use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;
use Sportakal\Garantipos\Results\PayResult;
use Sportakal\Garantipos\Results\RefundResult;
use Sportakal\Garantipos\Utils\CreateHashData;

class Refund extends XmlRequest
{
    public function __construct(RequestModel $GVPSRequest)
    {
        parent::__construct($GVPSRequest);
        $this->GVPSRequest->getTransaction()->setType('refund');
    }

    public function setHashData(): void
    {
        $this->setSecurityData();
        $string = '';
        $string .= $this->GVPSRequest->getOrder()->getOrderID();
        $string .= $this->GVPSRequest->getTerminal()->getID();
        $string .= $this->GVPSRequest->getTransaction()->getAmount();
        $string .= $this->security_data;
        $this->hash_data = CreateHashData::get($string);

        $this->GVPSRequest->getTerminal()->setHashData($this->hash_data);
    }

    /**
     * @throws \DOMException
     * @throws \JsonException
     */
    public function getResult(): RefundResult
    {
        if (empty($this->response)) {
            $this->exec();
        }
        return (new RefundResult($this->response->getArray()));
    }

}
