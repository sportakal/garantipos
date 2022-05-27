<?php

namespace Sportakal\Garantipos\Models;

class Reward extends BaseModel
{
    protected string $_parent_key = 'Reward';
    protected string $Type; //MR, BNS, Mil, FirmBasedBns, FirmBasedCheque
    protected string $UsedAmount;
    protected string $GainedAmount;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     */
    public function setType(string $Type): void
    {
        $this->Type = $Type;
    }

    /**
     * @return string
     */
    public function getUsedAmount(): string
    {
        return $this->UsedAmount;
    }

    /**
     * @param string $UsedAmount
     */
    public function setUsedAmount(string $UsedAmount): void
    {
        $this->UsedAmount = $UsedAmount;
    }

    /**
     * @return string
     */
    public function getGainedAmount(): string
    {
        return $this->GainedAmount;
    }

    /**
     * @param string $GainedAmount
     */
    public function setGainedAmount(string $GainedAmount): void
    {
        $this->GainedAmount = $GainedAmount;
    }


}
