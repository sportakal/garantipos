<?php

namespace Sportakal\Garantipos\Requests\Constructors;

use Sportakal\Garantipos\Models\RequestModel;
use Sportakal\Garantipos\Utils\CreateHashData;
use Sportakal\Garantipos\Utils\Curl;
use Sportakal\Garantipos\Utils\GetHost;

abstract class PostRequest extends RequestBase
{

    public function __construct(RequestModel $GVPSRequest)
    {
        parent::__construct($GVPSRequest);
    }

    protected function exec(): void
    {
        $headers = ["Content-Type: application/x-www-form-urlencoded",];
        $data = [
            'secure3dsecuritylevel' => $this->secure3dsecuritylevel,
            'mode' => $this->GVPSRequest->getMode(),
            'apiversion' => $this->GVPSRequest->getVersion(),
            'terminalprovuserid' => $this->GVPSRequest->getTerminal()->getProvUserID(),
            'terminaluserid' => $this->GVPSRequest->getTerminal()->getUserID(),
            'terminalmerchantid' => $this->GVPSRequest->getTerminal()->getMerchantID(),
            'txntype' => $this->GVPSRequest->getTransaction()->getType(),
            'txnamount' => $this->GVPSRequest->getTransaction()->getAmount(),
            'txncurrencycode' => $this->GVPSRequest->getTransaction()->getCurrencyCode(),
            'txninstallmentcount' => $this->GVPSRequest->getTransaction()->getInstallmentCnt(),
            'orderid' => $this->GVPSRequest->getOrder()->getOrderID(),
            'terminalid' => $this->GVPSRequest->getTerminal()->getID(),
            'successurl' => $this->GVPSRequest->getSuccessUrl(),
            'errorurl' => $this->GVPSRequest->getErrorUrl(),
            'customeripaddress' => $this->GVPSRequest->getCustomer()->getIPAddress(),
            'customeremailaddress' => $this->GVPSRequest->getCustomer()->getEmailAddress(),
            'secure3dhash' => $this->hash_data,
            'cardnumber' => $this->GVPSRequest->getCard()->getNumber(),
            'cardexpiredatemonth' => substr($this->GVPSRequest->getCard()->getExpireDate(), 0, 2),
            'cardexpiredateyear' => substr($this->GVPSRequest->getCard()->getExpireDate(), -2, 2),
            'cardcvv2' => $this->GVPSRequest->getCard()->getCVV2(),
        ];

        $data = http_build_query($data);
        $curl = new Curl(GetHost::get($this->GVPSRequest->getMode(), false), $data, $headers);
        $this->response = $curl->getResponse();
    }
}
