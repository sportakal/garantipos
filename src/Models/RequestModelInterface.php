<?php

namespace Sportakal\Garantipos\Models;

interface RequestModelInterface
{
    public function getMode(): string;

    public function getOptions(): Options;

    public function setOptions(Options $options): void;

    public function getTerminal(): Terminal;

    public function getCustomer(): Customer;

    public function setCustomer(Customer $Customer): void;

    public function getCard(): Card;

    public function setCard(Card $Card): void;

    public function getOrder(): Order;

    public function setOrder(Order $Order): void;

    public function getTransaction(): Transaction;

    public function setTransaction(Transaction $Transaction): void;

    public function setHash(string $hash): void;
}
