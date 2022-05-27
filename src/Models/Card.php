<?php

namespace Sportakal\Garantipos\Models;


class Card extends BaseModel
{
    protected string $Number;
    protected string $ExpireDate;
    protected string $CVV2;

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
     * @return string
     */
    public function getExpireDate(): string
    {
        return $this->ExpireDate;
    }

    /**
     * @param string $ExpireDate
     */
    public function setExpireDate(string $ExpireDate): void
    {
        $this->ExpireDate = $ExpireDate;
    }

    /**
     * @return string
     */
    public function getCVV2(): string
    {
        return $this->CVV2;
    }

    /**
     * @param string $CVV2
     */
    public function setCVV2(string $CVV2): void
    {
        $this->CVV2 = $CVV2;
    }
}
