<?php

namespace Sportakal\Garantipos\Models;

class UtilityPayment extends BaseModel
{
    protected string $type;
    protected string $subscriber_code;
    protected string $invoice_id;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getSubscriberCode(): string
    {
        return $this->subscriber_code;
    }

    /**
     * @param string $subscriber_code
     */
    public function setSubscriberCode(string $subscriber_code): void
    {
        $this->subscriber_code = $subscriber_code;
    }

    /**
     * @return string
     */
    public function getInvoiceId(): string
    {
        return $this->invoice_id;
    }

    /**
     * @param string $invoice_id
     */
    public function setInvoiceId(string $invoice_id): void
    {
        $this->invoice_id = $invoice_id;
    }



}
