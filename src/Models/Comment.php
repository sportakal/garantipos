<?php

namespace Sportakal\Garantipos\Models;

class Comment extends BaseModel
{
    protected string $_parent_key = 'Comment';
    protected string $Number;
    protected string $Text;

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->Number;
    }

    /**
     * @param string $Number
     */
    public function setNumber(string $Number): void
    {
        $this->Number = $Number;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->Text;
    }

    /**
     * @param string $Text
     */
    public function setText(string $Text): void
    {
        $this->Text = $Text;
    }



}
