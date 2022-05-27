<?php

namespace Sportakal\Garantipos\Models;

class Verification extends BaseModel
{
    protected string $identity;
    protected string $extre_info;
    protected string $SMS_password;

    /**
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     */
    public function setIdentity(string $identity): void
    {
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getExtreInfo(): string
    {
        return $this->extre_info;
    }

    /**
     * @param string $extre_info
     */
    public function setExtreInfo(string $extre_info): void
    {
        $this->extre_info = $extre_info;
    }

    /**
     * @return string
     */
    public function getSMSPassword(): string
    {
        return $this->SMS_password;
    }

    /**
     * @param string $SMS_password
     */
    public function setSMSPassword(string $SMS_password): void
    {
        $this->SMS_password = $SMS_password;
    }


}
