<?php

namespace Sportakal\Garantipos\Results\Interfaces;

use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\Transaction;

interface PaymentResultInterface
{
    public function setHashData(): void;

    public function getOrder(): Order;

    public function getTransaction(): Transaction;
}
