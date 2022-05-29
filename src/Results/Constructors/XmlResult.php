<?php

namespace Sportakal\Garantipos\Results\Constructors;

use Sportakal\Garantipos\Models\Address;
use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\Item;
use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\PostRequestModel;
use Sportakal\Garantipos\Models\RequestModelInterface;
use Sportakal\Garantipos\Models\ResultModels\XmlResultModel;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;

abstract class XmlResult implements PaymentResultInterface
{
    protected XmlResultModel $xmlResultModel;
    protected RequestModelInterface $request_model;
    protected string $hash_data;
    protected bool $status;
    protected string $status_code;
    protected string $status_message;
    protected string $reason_code;
    protected string $error_message;
    protected string $host_message;
    protected string $reference_number;

    /**
     * @param array $postFields
     */
    public function __construct(array $postFields, RequestModelInterface $request_model)
    {
        $this->xmlResultModel = new XmlResultModel($postFields);

        $this->setStatus($this->xmlResultModel->code === "00");
        $this->setStatusCode($this->xmlResultModel->code);
        $this->setStatusMessage($this->xmlResultModel->message);
        $this->setReasonCode($this->xmlResultModel->reason_code);
        $this->setErrorMessage($this->xmlResultModel->error_message . " " . $this->xmlResultModel->system_error_message);
        $this->setHostMessage($this->xmlResultModel->host_message[0] ?? '');
        $this->setReferenceNumber($this->xmlResultModel->ret_ref_num);

        $this->setRequest($request_model);
    }

    public function setRequest(RequestModelInterface $request_model): void
    {
        $this->request_model = $request_model;
    }

    public function getData(): array
    {
        return $this->xmlResultModel->fields ?? [];
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
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    protected function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->status_code;
    }

    /**
     * @return string
     */
    public function getStatusMessage(): string
    {
        return $this->status_message;
    }


    /**
     * @param string $status_code
     */
    protected function setStatusCode(string $status_code): void
    {
        $this->status_code = $status_code;
    }


    /**
     * @param string $status_message
     */
    protected function setStatusMessage(string $status_message): void
    {
        $this->status_message = $status_message;
    }


    /**
     * @return string
     */
    public function getReasonCode(): string
    {
        return $this->reason_code;
    }

    /**
     * @param string $reason_code
     */
    public function setReasonCode(string $reason_code): void
    {
        $this->reason_code = $reason_code;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error_message;
    }

    /**
     * @param string $error_message
     */
    protected function setErrorMessage(string $error_message): void
    {
        $this->error_message = $error_message;
    }

    /**
     * @return string
     */
    public function getHostMessage(): string
    {
        return $this->host_message;
    }

    /**
     * @param string $host_message
     */
    protected function setHostMessage(string $host_message): void
    {
        $this->host_message = $host_message;
    }


}
