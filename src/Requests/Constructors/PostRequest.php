<?php

namespace Sportakal\Garantipos\Requests\Constructors;

use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\PostRequestModel;
use Sportakal\Garantipos\Models\RequestModelInterface;
use Sportakal\Garantipos\Utils\CreateHashData;
use Sportakal\Garantipos\Utils\Curl;
use Sportakal\Garantipos\Utils\GetHost;

abstract class PostRequest extends RequestBase
{
    public function __construct(PostRequestModel $requestModel)
    {
        parent::__construct($requestModel);
    }

    protected function exec(): void
    {
        $headers = ["Content-Type: application/x-www-form-urlencoded",];

        $data = $this->requestModel->toArray();
//        $data = [
//            'secure3dsecuritylevel' => $this->secure3dsecuritylevel,
//            'mode' => $this->requestModel->getMode(),
//            'apiversion' => $this->requestModel->getVersion(),
//            'terminalprovuserid' => $this->requestModel->getTerminal()->getProvUserID(),
//            'terminaluserid' => $this->requestModel->getTerminal()->getUserID(),
//            'terminalmerchantid' => $this->requestModel->getTerminal()->getMerchantID(),
//            'txntype' => $this->requestModel->getTransaction()->getType(),
//            'txnamount' => $this->requestModel->getTransaction()->getAmount(),
//            'txncurrencycode' => $this->requestModel->getTransaction()->getCurrencyCode(),
//            'txninstallmentcount' => $this->requestModel->getTransaction()->getInstallmentCnt(),
//            'orderid' => $this->requestModel->getOrder()->getOrderID(),
//            'terminalid' => $this->requestModel->getTerminal()->getID(),
//            'successurl' => $this->requestModel->getSuccessUrl(),
//            'errorurl' => $this->requestModel->getErrorUrl(),
//            'customeripaddress' => $this->requestModel->getCustomer()->getIPAddress(),
//            'customeremailaddress' => $this->requestModel->getCustomer()->getEmailAddress(),
//            'secure3dhash' => $this->hash_data,
//            'cardnumber' => $this->requestModel->getCard()->getNumber(),
//            'cardexpiredatemonth' => substr($this->requestModel->getCard()->getExpireDate(), 0, 2),
//            'cardexpiredateyear' => substr($this->requestModel->getCard()->getExpireDate(), -2, 2),
//            'cardcvv2' => $this->requestModel->getCard()->getCVV2(),
//            'lang' => $this->requestModel->getOptions()->getLang(),
//        ];

        $data = http_build_query($data);
        $curl = new Curl(GetHost::get($this->requestModel->getMode(), false), $data, $headers);
        $this->response = $curl->getResponse();
    }
}
