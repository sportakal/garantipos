<?php

namespace Sportakal\Garantipos\Models;

class Cheque extends BaseModel
{
    protected string $_parent_key = 'Cheque';
    protected string $Type; //P for Player, S for Sozunuze urun
    protected string $Amount;
    protected string $ID;
    protected string $Bitmap;

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

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->ID;
    }

    /**
     * @param string $ID
     */
    public function setID(string $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getBitmap(): string
    {
        return $this->Bitmap;
    }

    /**
     * @param string $Bitmap
     */
    public function setBitmap(string $Bitmap): void
    {
        $this->Bitmap = $Bitmap;
    }


}
