<?php

namespace Sportakal\Garantipos\Results\Constructors;

use Sportakal\Garantipos\Exceptions\HashCheckFailedException;
use Sportakal\Garantipos\Models\Address;
use Sportakal\Garantipos\Models\Customer;
use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\Item;
use Sportakal\Garantipos\Models\Options;
use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\PostRequestModel;
use Sportakal\Garantipos\Models\RequestModelInterface;
use Sportakal\Garantipos\Models\ResultModels\PostResultModel;
use Sportakal\Garantipos\Models\Secure3D;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Requests\Interfaces\RequestInterface;
use Sportakal\Garantipos\Requests\ThreeDSecurePay;
use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;
use Sportakal\Garantipos\Utils\Arrayable;

abstract class PostResult extends Arrayable implements PaymentResultInterface
{
    protected PostResultModel $postResultModel;
    protected Options $options;
    protected PostRequestModel $request_model;
    protected string $hash_data;
    protected bool $md_status;
    protected int $md_status_code;
    protected string $md_error_message;
    protected string $response_message;
    protected string $error_message;
    protected string $host_message;
    protected string $reference_number;


    /**
     * @param array $postFields
     * @throws HashCheckFailedException
     */
    public function __construct(Options $options, array $postFields = [])
    {
        $this->postResultModel = new PostResultModel($postFields);
        $this->options = $options;

        $this->setMdStatus(in_array((int)$this->postResultModel->mdstatus, [1, 2, 3, 4], true));
        $this->setMdStatusCode((int)($this->postResultModel->mdstatus ?? 0));
        $this->setMdErrorMessage($this->postResultModel->mderrormessage ?? '');
        $this->setResponseMessage($this->postResultModel->response ?? '');
        $this->setErrorMessage($this->postResultModel->errmsg ?? '');
        $this->setHostMessage($this->postResultModel->hostmsg ?? '');
        $this->setReferenceNumber($this->postResultModel->hostrefnum ?? '');

        $this->setRequest();
        if ($this->getHashData() !== $this->postResultModel->secure3dhash) {
            throw new HashCheckFailedException();
        }
    }

    public function setRequest(): void
    {
        $order = new Order();
        $order->setOrderID($this->postResultModel->orderid);

        $order_item_count = $this->postResultModel->orderitemcount ?? 0;
        for ($i = 1; $i <= $order_item_count; $i++) {
            $item = new Item();
            $item->setNumber($this->postResultModel->{"orderitem_number$i"} ?? '');
            $item->setProductID($this->postResultModel->{"orderitem_productid$i"} ?? '');
            $item->setProductCode($this->postResultModel->{"orderitem_productcode$i"} ?? '');
            $item->setQuantity($this->postResultModel->{"orderitem_quantity$i"} ?? '');
            $item->setPrice($this->postResultModel->{"orderitem_price$i"} ?? '');
            $item->setTotalAmount($this->postResultModel->{"orderitem_totalamount$i"} ?? '');
            $item->setDescription($this->postResultModel->{"orderitem_description$i"} ?? '');
            $order->addItem($item);
        }

        $order_address_count = $this->postResultModel->orderaddresscount ?? 0;
        for ($i = 1; $i <= $order_address_count; $i++) {
            $address = new Address();
            $address->setType($this->postResultModel->{"orderaddresstype$i"} ?? '');
            $address->setName($this->postResultModel->{"orderaddressname$i"} ?? '');
            $address->setLastName($this->postResultModel->{"orderaddresslastname$i"} ?? '');
            $address->setCompany($this->postResultModel->{"orderaddresscompany$i"} ?? '');
            $address->setText($this->postResultModel->{"orderaddresstext$i"} ?? '');
            $address->setPhoneNumber($this->postResultModel->{"orderaddressphonenumber$i"} ?? '');
            $address->setFaxNumber($this->postResultModel->{"orderaddressfaxnumber$i"} ?? '');
            $address->setGsmNumber($this->postResultModel->{"orderaddressgsmnumber$i"} ?? '');
            $address->setCity($this->postResultModel->{"orderaddresscity$i"} ?? '');
            $address->setCountry($this->postResultModel->{"orderaddresscountry$i"} ?? '');
            $address->setDistrict($this->postResultModel->{"orderaddressdistrict$i"} ?? '');
            $address->setPostalCode($this->postResultModel->{"orderaddresspostalcode$i"} ?? '');
            $order->addAddress($address);
        }

        $transaction = new Transaction();
        $transaction->setType($this->postResultModel->txntype);
        $transaction->setCurrencyCode($this->postResultModel->txncurrencycode);
        $transaction->setInstallmentCnt($this->postResultModel->txninstallmentcount);
        $transaction->setAmount($this->postResultModel->txnamount);

        $customer = new Customer();
        $customer->setIPAddress($this->postResultModel->customeripaddress);
        $customer->setEmailAddress($this->postResultModel->customeremailaddress);

        $request = new PostRequestModel();
        $request->setOptions($this->options);
        $request->setOrder($order);
        $request->setCustomer($customer);
        $request->setTransaction($transaction);
        $request->setSuccessurl($this->postResultModel->successurl);
        $request->setErrorurl($this->postResultModel->errorurl);

        if (isset($this->postResultModel->cavv)) {
            $Secure3D = new Secure3D();
            $Secure3D->setAuthenticationCode($this->postResultModel->cavv);
            $Secure3D->setSecurityLevel($this->postResultModel->eci);
            $Secure3D->setTxnID($this->postResultModel->xid);
            $Secure3D->setMd($this->postResultModel->md);
            $transaction->setSecure3D($Secure3D);
            $transaction->setMotoInd('N');
        }


        $this->request_model = $request;
    }

    public function getGVPSRequest(): GVPSRequestModel
    {
        $gvps_request = new GVPSRequestModel();
        $gvps_request->setOptions($this->request_model->getOptions());
        $gvps_request->setCustomer($this->request_model->getCustomer());
        $gvps_request->setOrder($this->request_model->getOrder());
        $gvps_request->setTransaction($this->request_model->getTransaction());
        return $gvps_request;
    }

    public function getData(): array
    {
        return $this->postResultModel->fields ?? [];
    }

    public function getOrder(): Order
    {
        return $this->request_model->getOrder();
    }

    public function getTransaction(): Transaction
    {
        return $this->request_model->getTransaction();
    }

    /**
     * @return string
     */
    public function getHashData(): string
    {
        if (empty($this->hash_data)) {
            $this->setHashData();
        }
        return $this->hash_data; //1B493654D0089F8D202E8EC3B54EB590EDE84C42
    }


    /**
     * @return string
     */
    public function getReferenceNumber(): string
    {
        return $this->reference_number;
    }

    /**
     * @param string $reference_number
     */
    protected function setReferenceNumber(string $reference_number): void
    {
        $this->reference_number = $reference_number;
    }


    /**
     * @param bool $md_status
     * @return void
     */
    protected function setMdStatus(bool $md_status): void
    {
        $this->md_status = $md_status;
    }

    /**
     * @param $md_status_code
     * @return void
     */
    protected function setMdStatusCode($md_status_code): void
    {
        $this->md_status_code = $md_status_code;
    }

    /**
     * @param $md_error_message
     * @return void
     */
    protected function setMdErrorMessage($md_error_message): void
    {
        if ($this->md_status_code === 1) {
            $this->md_error_message = "Tam Doğrulama";
        } else if ($this->md_status_code === 2) {
            $this->md_error_message = "Kart Sahibi veya bankası sisteme kayıtlı değil";
        } else if ($this->md_status_code === 3) {
            $this->md_error_message = "Kartın bankası sisteme kayıtlı değil";
        } elseif ($this->md_status_code === 4) {
            $this->md_error_message = "Doğrulama denemesi, kart sahibi sisteme daha sonra kayıt olmayı seçmiş";
        } else if ($this->md_status_code === 5) {
            $this->md_error_message = "Doğrulama yapılamıyor";
        } else if ($this->md_status_code === 7) {
            $this->md_error_message = "Sistem Hatası";
        } else if ($this->md_status_code === 8) {
            $this->md_error_message = "Bilinmeyen Kart No";
        } else if ($this->md_status_code === 0) {
            $this->md_error_message = "Doğrulama Başarısız, 3-D Secure imzası geçersiz.";
        } else if ($md_error_message !== '') {
            $this->md_error_message = $md_error_message;
        }
    }

    /**
     * @param string $response_message
     */
    protected function setResponseMessage(string $response_message): void
    {
        $this->response_message = $response_message;
    }

    /**
     * @param string $error_message
     */
    protected function setErrorMessage(string $error_message): void
    {
        $this->error_message = $error_message;
    }

    /**
     * @param string $host_message
     */
    protected function setHostMessage(string $host_message): void
    {
        $this->host_message = $host_message;
    }


    /**
     * @return bool
     */
    public function getMdStatus(): bool
    {
        return $this->md_status;
    }

    /**
     * @return int
     */
    public function getMdStatusCode(): int
    {
        return $this->md_status_code;
    }

    /**
     * @return string
     */
    public function getMdErrorMessage(): string
    {
        return $this->md_error_message;
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->response_message;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error_message;
    }

    /**
     * @return string
     */
    public function getHostMessage(): string
    {
        return $this->host_message;
    }

}
