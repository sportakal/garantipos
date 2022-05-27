<?php

namespace Sportakal\Garantipos\Requests;

use Sportakal\Garantipos\Models\Card;
use Sportakal\Garantipos\Models\Customer;
use Sportakal\Garantipos\Models\RequestModel;
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
    public function __construct($TerminalProvUserPassword)
    {
        $options = new Options();
        $options->setMode($_POST['mode']); //TEST
        $options->setApiVersion($_POST['apiversion']);
        $options->setTerminalId($_POST['clientid']);
        $options->setTerminalProvUserId($_POST['terminalprovuserid']);
        $options->setTerminalProvUserPassword($TerminalProvUserPassword);
        $options->setTerminalUserId($_POST['terminaluserid']);
        $options->setTerminalMerchantId($_POST['terminalmerchantid']);

        $card = new Card();
        $card->setNumber('');
        $card->setExpireDate('');
        $card->setCVV2('');

        $customer = new Customer();
        $customer->setIpAddress($_POST['customeripaddress']);
        $customer->setEmailAddress($_POST['customeremailaddress']);


        $order = new Order();
        $order->setOrderID($_POST['orderid']);
//        $order->addAddress(new Address());

        $transaction = new Transaction();
        $transaction->setType($_POST['txntype']);
        $transaction->setInstallmentCnt($_POST['txninstallmentcount']);
        $transaction->setAmount($_POST['txnamount']);
        $transaction->setCurrencyCode($_POST['txncurrencycode']);
        $transaction->setCardholderPresentCode('13');
        $Secure3D = new Secure3D();
        $Secure3D->setAuthenticationCode($_POST['cavv']);
        $Secure3D->setSecurityLevel($_POST['eci']);
        $Secure3D->setTxnID($_POST['xid']);
        $Secure3D->setMd($_POST['md']);
        $transaction->setSecure3D($Secure3D);
        $transaction->setMotoInd('N');

        $request = new RequestModel();
        $request->setOptions($options);
        $request->setCard($card);
        $request->setCustomer($customer);
        $request->setOrder($order);
        $request->setTransaction($transaction);

        parent::__construct($request);
    }

    public function setHashData(): void
    {
        $this->setSecurityData();
        $string = '';
        $string .= $this->GVPSRequest->getOrder()->getOrderID();
        $string .= $this->GVPSRequest->getTerminal()->getID();
        $string .= $this->GVPSRequest->getCard()->getNumber();
        $string .= $this->GVPSRequest->getTransaction()->getAmount();
        $string .= $this->security_data;
        $this->hash_data = CreateHashData::get($string);

        $this->GVPSRequest->getTerminal()->setHashData($this->hash_data);
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
        return (new CompleteThreeDSecureResult($this->response->getArray()));
    }

}
