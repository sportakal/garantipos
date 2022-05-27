<?php

namespace Sportakal\Garantipos\Models;

class Payment extends BaseModel
{
    protected string $_parent_key = 'Payment';
    protected string $PaymentNum;
    protected string $Number;
    protected int $Amount;
    protected string $DueDate;//YYYYMMDD


    /**
     * @return string
     */
    public function getPaymentNum(): string
    {
        return $this->PaymentNum;
    }

    /**
     * @param string $PaymentNum
     */
    public function setPaymentNum(string $PaymentNum): void
    {
        $this->PaymentNum = $PaymentNum;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->Number;
    }

    /**
     * @param string $Number
     */
    public function setNumber(string $Number): void
    {
        $this->Number = $Number;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->Amount;
    }

    /**
     * @param int $Amount
     */
    public function setAmount(int $Amount): void
    {
        $this->Amount = $Amount;
    }

    /**
     * @return string
     */
    public function getDueDate(): string
    {
        return $this->DueDate;
    }

    /**
     * @param string $DueDate
     */
    public function setDueDate(string $DueDate): void
    {
        $this->DueDate = $DueDate;
    }
}
