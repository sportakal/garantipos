<?php

namespace Sportakal\Garantipos\Models;

class Secure3D extends BaseModel
{
    protected string $AuthenticationCode;
    protected string $SecurityLevel;
    protected string $TxnID;
    protected string $Md;

    /**
     * @return string
     */
    public function getAuthenticationCode(): string
    {
        return $this->AuthenticationCode;
    }

    /**
     * @param string $AuthenticationCode
     */
    public function setAuthenticationCode(string $AuthenticationCode): void
    {
        $this->AuthenticationCode = $AuthenticationCode;
    }

    /**
     * @return string
     */
    public function getSecurityLevel(): string
    {
        return $this->SecurityLevel;
    }

    /**
     * @param string $SecurityLevel
     */
    public function setSecurityLevel(string $SecurityLevel): void
    {
        $this->SecurityLevel = $SecurityLevel;
    }

    /**
     * @return string
     */
    public function getTxnID(): string
    {
        return $this->TxnID;
    }

    /**
     * @param string $TxnID
     */
    public function setTxnID(string $TxnID): void
    {
        $this->TxnID = $TxnID;
    }

    /**
     * @return string
     */
    public function getMd(): string
    {
        return $this->Md;
    }

    /**
     * @param string $Md
     */
    public function setMd(string $Md): void
    {
        $this->Md = $Md;
    }


}
