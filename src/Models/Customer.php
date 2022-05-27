<?php

namespace Sportakal\Garantipos\Models;


class Customer extends BaseModel
{
    protected string $IPAddress;
    protected string $EmailAddress;

    /**
     * @return string
     */
    public function getIPAddress(): string
    {
        return $this->IPAddress;
    }

    /**
     * @param string $IPAddress
     */
    public function setIPAddress(string $IPAddress): void
    {
        $this->IPAddress = $IPAddress;
    }

    /**
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->EmailAddress;
    }

    /**
     * @param string $EmailAddress
     */
    public function setEmailAddress(string $EmailAddress): void
    {
        $this->EmailAddress = $EmailAddress;
    }




}
