<?php

namespace Sportakal\Garantipos\Models;

class Terminal extends BaseModel
{
    protected string $ProvUserID;
    protected string $ProvUserPassword;
    protected string $HashData;
    protected string $UserID;
    protected string $ID;
    protected string $ID_;
    protected string $MerchantID;

    /**
     * @return string
     */
    public function getProvUserID(): string
    {
        return $this->ProvUserID;
    }

    /**
     * @param string $ProvUserID
     */
    public function setProvUserID(string $ProvUserID): void
    {
        $this->ProvUserID = $ProvUserID;
    }

    /**
     * @return string
     */
    public function getProvUserPassword(): string
    {
        return $this->ProvUserPassword;
    }

    /**
     * @param string $ProvUserPassword
     */
    public function setProvUserPassword(string $ProvUserPassword): void
    {
        $this->ProvUserPassword = $ProvUserPassword;
    }


    /**
     * @return string
     */
    public function getHashData(): string
    {
        return $this->HashData;
    }

    /**
     * @param string $HashData
     */
    public function setHashData(string $HashData): void
    {
        $this->HashData = $HashData;
    }

    /**
     * @return string
     */
    public function getUserID(): string
    {
        return $this->UserID;
    }

    /**
     * @param string $UserID
     */
    public function setUserID(string $UserID): void
    {
        $this->UserID = $UserID;
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
        $this->ID_ = "0" . $ID;
    }

    /**
     * @return string
     */
    public function getID_(): string
    {
        return $this->ID_;
    }

    /**
     * @return string
     */
    public function getMerchantID(): string
    {
        return $this->MerchantID;
    }

    /**
     * @param string $MerchantID
     */
    public function setMerchantID(string $MerchantID): void
    {
        $this->MerchantID = $MerchantID;
    }


}
