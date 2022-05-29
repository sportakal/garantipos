<?php

namespace Sportakal\Garantipos\Requests;

use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\ResultModels\ResultModelInterface;
use Sportakal\Garantipos\Requests\Constructors\XmlRequest;
use Sportakal\Garantipos\Results\BinInqResult;
use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;
use Sportakal\Garantipos\Results\PayResult;
use Sportakal\Garantipos\Utils\CreateHashData;

class BinInq extends XmlRequest
{

    public function __construct(GVPSRequestModel $GVPSRequest)
    {
        parent::__construct($GVPSRequest);
        $this->requestModel->getTransaction()->setType('bininq');
    }

    public function setHashData(): void
    {
        $this->setSecurityData();
        $string = '';
        $string .= $this->requestModel->getOrder()->getOrderID();
        $string .= $this->requestModel->getTerminal()->getID();
        $string .= $this->requestModel->getCard()->getNumber();
        $string .= $this->requestModel->getTransaction()->getAmount();
        $string .= $this->security_data;
        $this->hash_data = CreateHashData::get($string);
        $this->requestModel->setHash($this->hash_data);
    }

    /**
     * @throws \DOMException
     * @throws \JsonException
     */
    public function getResult(): BinInqResult
    {
        if (empty($this->response)) {
            $this->exec();
        }

        return (new BinInqResult($this->response->getArray(), $this->requestModel));
    }
}
