<?php

namespace Sportakal\Garantipos\Models;

class CepBank extends BaseModel
{
    protected string $GSMNumber;
    protected string $PaymentType; //K for credit, D for Debit, V for Account
    protected string $HashDate;
    protected string $HashValue;

    /**
     * @return string
     */
    public function getGSMNumber(): string
    {
        return $this->GSMNumber;
    }

    /**
     * @param string $GSMNumber
     */
    public function setGSMNumber(string $GSMNumber): void
    {
        $this->GSMNumber = $GSMNumber;
    }

    /**
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->PaymentType;
    }

    /**
     * @param string $PaymentType
     */
    public function setPaymentType(string $PaymentType): void
    {
        $this->PaymentType = $PaymentType;
    }

    /**
     * @return string
     */
    public function getHashDate(): string
    {
        return $this->HashDate;
    }

    /**
     * @param string $HashDate
     */
    public function setHashDate(string $HashDate): void
    {
        $this->HashDate = $HashDate;
    }

    /**
     * @return string
     */
    public function getHashValue(): string
    {
        return $this->HashValue;
    }

    /**
     * @param string $HashValue
     */
    public function setHashValue(string $HashValue): void
    {
        $this->HashValue = $HashValue;
    }




}
