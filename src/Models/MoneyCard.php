<?php

namespace Sportakal\Garantipos\Models;

class MoneyCard extends BaseModel
{
    protected string $InvoiceAmount;
    protected string $MigrosCCDiscountAmount;
    protected string $PaymentAmount;
    protected string $ExtraDiscountAmount;
    protected string $ProductBasedDiscountAmount;

    /**
     * @return string
     */
    public function getInvoiceAmount(): string
    {
        return $this->InvoiceAmount;
    }

    /**
     * @param string $InvoiceAmount
     */
    public function setInvoiceAmount(string $InvoiceAmount): void
    {
        $this->InvoiceAmount = $InvoiceAmount;
    }

    /**
     * @return string
     */
    public function getMigrosCCDiscountAmount(): string
    {
        return $this->MigrosCCDiscountAmount;
    }

    /**
     * @param string $MigrosCCDiscountAmount
     */
    public function setMigrosCCDiscountAmount(string $MigrosCCDiscountAmount): void
    {
        $this->MigrosCCDiscountAmount = $MigrosCCDiscountAmount;
    }

    /**
     * @return string
     */
    public function getPaymentAmount(): string
    {
        return $this->PaymentAmount;
    }

    /**
     * @param string $PaymentAmount
     */
    public function setPaymentAmount(string $PaymentAmount): void
    {
        $this->PaymentAmount = $PaymentAmount;
    }

    /**
     * @return string
     */
    public function getExtraDiscountAmount(): string
    {
        return $this->ExtraDiscountAmount;
    }

    /**
     * @param string $ExtraDiscountAmount
     */
    public function setExtraDiscountAmount(string $ExtraDiscountAmount): void
    {
        $this->ExtraDiscountAmount = $ExtraDiscountAmount;
    }

    /**
     * @return string
     */
    public function getProductBasedDiscountAmount(): string
    {
        return $this->ProductBasedDiscountAmount;
    }

    /**
     * @param string $ProductBasedDiscountAmount
     */
    public function setProductBasedDiscountAmount(string $ProductBasedDiscountAmount): void
    {
        $this->ProductBasedDiscountAmount = $ProductBasedDiscountAmount;
    }



}
