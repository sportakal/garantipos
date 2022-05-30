<?php

namespace Sportakal\Garantipos\Models;

class Order extends BaseModel
{
    protected string $OrderID;
    protected string $GroupID;
    protected array $AddressList = [];
    protected string $StartDate;
    protected string $EndDate;
    protected array $ItemList = [];
    protected Recurring $Recurring;
    protected array $CommentList;

    /**
     * @return string
     */
    public function getOrderID(): string
    {
        return $this->OrderID;
    }

    /**
     * @param string $OrderID
     */
    public function setOrderID(string $OrderID): void
    {
        $this->OrderID = $OrderID;
    }

    /**
     * @return string
     */
    public function getGroupID(): string
    {
        return $this->GroupID;
    }

    /**
     * @param string $GroupID
     */
    public function setGroupID(string $GroupID): void
    {
        $this->GroupID = $GroupID;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->StartDate;
    }

    /**
     * @param string $StartDate
     */
    public function setStartDate(string $StartDate): void
    {
        $this->StartDate = $StartDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->EndDate;
    }

    /**
     * @param string $EndDate
     */
    public function setEndDate(string $EndDate): void
    {
        $this->EndDate = $EndDate;
    }

    /**
     * @return array
     */
    public function getItemList(): array
    {
        return $this->ItemList;
    }

    /**
     * @param array $ItemList
     */
    public function setItemList(array $ItemList): void
    {
        $this->ItemList = $ItemList;
    }

    /**
     * @return array
     */
    public function getAddressList(): array
    {
        return $this->AddressList;
    }

    /**
     * @param array $AddressList
     */
    public function setAddressList(array $AddressList): void
    {
        $this->AddressList = $AddressList;
    }

    /**
     * @return Recurring
     */
    public function getRecurring(): Recurring
    {
        return $this->Recurring;
    }

    /**
     * @param Recurring $Recurring
     */
    public function setRecurring(Recurring $Recurring): void
    {
        $this->Recurring = $Recurring;
    }

    /**
     * @return array
     */
    public function getCommentList(): array
    {
        return $this->CommentList;
    }

    /**
     * @param array $CommentList
     */
    public function setCommentList(array $CommentList): void
    {
        $this->CommentList = $CommentList;
    }

    /**
     * @param Item $item
     */
    public function addItem(Item $item): void
    {
        $item_count = count($this->ItemList);
        $item->setNumber($item_count + 1);
        $this->ItemList[] = $item;
    }


    /**
     * @param Comment $Comment
     */
    public function addComment(Comment $Comment): void
    {
        $this->CommentList[] = $Comment;
    }

    /**
     * @param Address $Address
     */
    public function addAddress(Address $Address): void
    {
        $this->AddressList[] = $Address;
    }
}
