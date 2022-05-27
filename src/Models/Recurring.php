<?php

namespace Sportakal\Garantipos\Models;

class Recurring extends BaseModel
{
    protected string $Type; // R:Sabit Tutarli   G:Degisken Tutarli
    protected string $TotalPaymentNum;
    protected string $FrequencyType; //M for Monthly, W for weekly, D for daily
    protected string $FrequencyInterval;
    protected string $StartDate;
    protected array $PaymentList;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     */
    public function setType(string $Type): void
    {
        $this->Type = $Type;
    }

    /**
     * @return string
     */
    public function getTotalPaymentNum(): string
    {
        return $this->TotalPaymentNum;
    }

    /**
     * @param string $TotalPaymentNum
     */
    public function setTotalPaymentNum(string $TotalPaymentNum): void
    {
        $this->TotalPaymentNum = $TotalPaymentNum;
    }

    /**
     * @return string
     */
    public function getFrequencyType(): string
    {
        return $this->FrequencyType;
    }

    /**
     * @param string $FrequencyType
     */
    public function setFrequencyType(string $FrequencyType): void
    {
        $this->FrequencyType = $FrequencyType;
    }

    /**
     * @return string
     */
    public function getFrequencyInterval(): string
    {
        return $this->FrequencyInterval;
    }

    /**
     * @param string $FrequencyInterval
     */
    public function setFrequencyInterval(string $FrequencyInterval): void
    {
        $this->FrequencyInterval = $FrequencyInterval;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->StartDate;
    }

    /**
     * @param string $StartDate
     */
    public function setStartDate(string $StartDate): void
    {
        $this->StartDate = $StartDate;
    }

    /**
     * @return array
     */
    public function getPaymentList(): array
    {
        return $this->PaymentList;
    }

    /**
     * @param array $PaymentList
     */
    public function setPaymentList(array $PaymentList): void
    {
        $this->PaymentList = $PaymentList;
    }

    /**
     * @param Payment $Payment
     */
    public function addPayment(Payment $Payment): void
    {
        $this->PaymentList[] = $Payment;
    }
}
