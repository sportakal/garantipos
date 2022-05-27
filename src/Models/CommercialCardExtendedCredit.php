<?php

namespace Sportakal\Garantipos\Models;

class CommercialCardExtendedCredit extends BaseModel
{
    protected array $PaymentList;

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
    public function addPayment(Payment $Payment):void
    {
        $this->PaymentList[] = $Payment;
    }

}
