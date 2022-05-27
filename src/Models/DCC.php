<?php

namespace Sportakal\Garantipos\Models;

class DCC extends BaseModel
{
    protected string $Currency;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->Currency;
    }

    /**
     * @param string $Currency
     */
    public function setCurrency(string $Currency): void
    {
        $this->Currency = $Currency;
    }






}
