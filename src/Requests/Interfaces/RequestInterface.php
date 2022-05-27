<?php

namespace Sportakal\Garantipos\Requests\Interfaces;

use Sportakal\Garantipos\Models\ResultModels\ResultModelInterface;
use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;

interface RequestInterface
{
    public function setHashData(): void;

    public function getHashData(): string;

    public function getResult(): PaymentResultInterface;

}
