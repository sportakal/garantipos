<?php

namespace Sportakal\Garantipos\Models;

class Item extends BaseModel
{
    protected string $_parent_key = 'Item';
    protected string $Number;
    protected string $ProductID;
    protected string $ProductCode;
    protected string $Quantity;
    protected string $Price;
    protected string $TotalAmount;

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
    public function getProductID(): string
    {
        return $this->ProductID;
    }

    /**
     * @param string $ProductID
     */
    public function setProductID(string $ProductID): void
    {
        $this->ProductID = $ProductID;
    }

    /**
     * @return string
     */
    public function getProductCode(): string
    {
        return $this->ProductCode;
    }

    /**
     * @param string $ProductCode
     */
    public function setProductCode(string $ProductCode): void
    {
        $this->ProductCode = $ProductCode;
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
    public function getPrice(): string
    {
        return $this->Price;
    }

    /**
     * @param string $Price
     */
    public function setPrice(string $Price): void
    {
        $this->Price = $Price;
    }

    /**
     * @return string
     */
    public function getTotalAmount(): string
    {
        return $this->TotalAmount;
    }

    /**
     * @param string $TotalAmount
     */
    public function setTotalAmount(string $TotalAmount): void
    {
        $this->TotalAmount = $TotalAmount;
    }



}
