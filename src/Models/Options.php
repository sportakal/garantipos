<?php

namespace Sportakal\Garantipos\Models;


class Options extends BaseModel
{
    protected bool $_pass_in_xml = true;
    protected Terminal $terminal;
    protected string $mode;
    protected string $api_version;
    protected string $terminal_id;
    protected string $terminal_prov_user_id;
    protected string $terminal_prov_user_password;
    protected string $terminal_user_id;
    protected string $terminal_merchant_id;
    protected string $store_key;


    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }


    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->api_version;
    }

    /**
     * @param string $api_version
     */
    public function setApiVersion(string $api_version): void
    {
        $this->api_version = $api_version;
    }

    /**
     * @return string
     */
    public function getTerminalId(): string
    {
        return $this->terminal_id;
    }

    /**
     * @param string $terminal_id
     */
    public function setTerminalId(string $terminal_id): void
    {
        $this->terminal_id = $terminal_id;
    }

    /**
     * @return string
     */
    public function getTerminalProvUserId(): string
    {
        return $this->terminal_prov_user_id;
    }

    /**
     * @param string $terminal_prov_user_id
     */
    public function setTerminalProvUserId(string $terminal_prov_user_id): void
    {
        $this->terminal_prov_user_id = $terminal_prov_user_id;
    }

    /**
     * @return string
     */
    public function getTerminalProvUserPassword(): string
    {
        return $this->terminal_prov_user_password;
    }

    /**
     * @param string $terminal_prov_user_password
     */
    public function setTerminalProvUserPassword(string $terminal_prov_user_password): void
    {
        $this->terminal_prov_user_password = $terminal_prov_user_password;
    }

    /**
     * @return string
     */
    public function getTerminalUserId(): string
    {
        return $this->terminal_user_id;
    }

    /**
     * @param string $terminal_user_id
     */
    public function setTerminalUserId(string $terminal_user_id): void
    {
        $this->terminal_user_id = $terminal_user_id;
    }

    /**
     * @return string
     */
    public function getTerminalMerchantId(): string
    {
        return $this->terminal_merchant_id;
    }

    /**
     * @param string $terminal_merchant_id
     */
    public function setTerminalMerchantId(string $terminal_merchant_id): void
    {
        $this->terminal_merchant_id = $terminal_merchant_id;
    }

    /**
     * @return string
     */
    public function getStoreKey(): string
    {
        return $this->store_key;
    }

    /**
     * @param string $store_key
     */
    public function setStoreKey(string $store_key): void
    {
        $this->store_key = $store_key;
    }


    /**
     */
    public function setTerminal(): void
    {
        $this->terminal = new Terminal();
        $this->terminal->setID($this->terminal_id);
        $this->terminal->setProvUserID($this->terminal_prov_user_id);
        $this->terminal->setProvUserPassword($this->terminal_prov_user_password);
        $this->terminal->setUserID($this->terminal_user_id);
        $this->terminal->setMerchantID($this->terminal_merchant_id);
    }

    /**
     * @return Terminal
     */
    public function getTerminal(): Terminal
    {
        if (empty($this->terminal)) {
            $this->setTerminal();
        }
        return $this->terminal;
    }

}
