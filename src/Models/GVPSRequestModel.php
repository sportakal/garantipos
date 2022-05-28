<?php

namespace Sportakal\Garantipos\Models;

class GVPSRequestModel extends BaseModel implements RequestModelInterface
{
    protected string $_parent_key = 'GVPSRequest';
    protected string $Mode = 'TEST';
    protected string $Version = 'v0.01';
    protected string $ChannelCode = '';
    protected Options $options;
    protected Terminal $Terminal;
    protected Customer $Customer;
    protected Card $Card;
    protected Order $Order;
    protected Transaction $Transaction;

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->Mode;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->Version;
    }

    /**
     * @param string $Version
     */
    public function setVersion(string $Version): void
    {
        $this->Version = $Version;
    }

    /**
     * @return string
     */
    public function getChannelCode(): string
    {
        return $this->ChannelCode;
    }

    /**
     * @param string $ChannelCode
     */
    public function setChannelCode(string $ChannelCode): void
    {
        $this->ChannelCode = $ChannelCode;
    }

    /**
     * @return Options
     */
    public function getOptions(): Options
    {
        return $this->options;
    }

    /**
     * @param Options $options
     */
    public function setOptions(Options $options): void
    {
        $this->options = $options;
        $this->Terminal = $options->getTerminal();
        $this->Mode = $options->getMode();
    }

    /**
     * @return Terminal
     */
    public function getTerminal(): Terminal
    {
        return $this->Terminal;
    }


    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->Customer;
    }

    /**
     * @param Customer $Customer
     */
    public function setCustomer(Customer $Customer): void
    {
        $this->Customer = $Customer;
    }

    /**
     * @return Card
     */
    public function getCard(): Card
    {
        return $this->Card;
    }

    /**
     * @param Card $Card
     */
    public function setCard(Card $Card): void
    {
        $this->Card = $Card;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->Order;
    }

    /**
     * @param Order $Order
     */
    public function setOrder(Order $Order): void
    {
        $this->Order = $Order;
    }

    /**
     * @return Transaction
     */
    public function getTransaction(): Transaction
    {
        return $this->Transaction;
    }

    /**
     * @param Transaction $Transaction
     */
    public function setTransaction(Transaction $Transaction): void
    {
        $this->Transaction = $Transaction;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->getTerminal()->setHashData($hash);
    }
}
