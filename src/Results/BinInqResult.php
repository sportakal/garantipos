<?php

namespace Sportakal\Garantipos\Results;

use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Results\Constructors\XmlResult;

class BinInqResult extends XmlResult
{
    public function setHashData(): void
    {
        $this->hash_data = "";
    }

    public function getBinList(): array
    {
        return $this->getData()['Order']['BINInqResult']['BINList']['BIN'] ?? [];
    }

    public function getBin(): array
    {
        $card_bin = [];
        foreach ($this->getBinList() as $bin) {
            if (strpos($this->request_model->getCard()->getNumber(), $bin['BINNum']) === 0) {
                $card_bin = $bin;
                break;
            }
        }

        return $card_bin;
    }
}
