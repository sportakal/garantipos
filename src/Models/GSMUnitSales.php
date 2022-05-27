<?php

namespace Sportakal\Garantipos\Models;

class GSMUnitSales extends BaseModel
{
    protected string $UnitID;
    protected string $Quantity;
    protected string $Amount;

    /**
     * @return string
     */
    public function getUnitID(): string
    {
        return $this->UnitID;
    }

    /**
     * @param string $UnitID
     */
    public function setUnitID(string $UnitID): void
    {
        $this->UnitID = $UnitID;
    }

    /**
     * @return string
     */
    public function getQuantity(): string
    {
        return $this->Quantity;
    }

    /**
     * @param string $Quantity
     */
    public function setQuantity(string $Quantity): void
    {
        $this->Quantity = $Quantity;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->Amount;
    }

    /**
     * @param string $Amount
     */
    public function setAmount(string $Amount): void
    {
        $this->Amount = $Amount;
    }
}
