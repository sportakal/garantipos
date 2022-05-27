<?php

namespace Sportakal\Garantipos\Utils;

use Sportakal\Garantipos\Models\BaseModel;

class Arrayable
{
    public function toArray(): array
    {
        $array = get_object_vars($this);
        $array = $this->parseArray($array);

        return $array;
    }

    protected function parseArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if ($value instanceof self) {
                $array[$key] = $value->toArray();
                continue;
            }

            if (!is_array($value)) {
                continue;
            }

            $array[$key] = $this->parseArray($value);
        }

        return $array;
    }
}
