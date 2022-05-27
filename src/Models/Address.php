<?php

namespace Sportakal\Garantipos\Models;

class Address extends BaseModel
{
    protected string $_parent_key = 'Address';
    protected string $Type = 'B'; // B for 'billing' or S for 'shipping'
    protected string $Name='';
    protected string $LastName='';
    protected string $Company='';
    protected string $Text='';
    protected string $District='';
    protected string $City='';
    protected string $Country='';
    protected string $PostalCode='';
    protected string $PhoneNumber='';
    protected string $GsmNumber='';
    protected string $FaxNumber='';

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
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName(string $Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->LastName;
    }

    /**
     * @param string $LastName
     */
    public function setLastName(string $LastName): void
    {
        $this->LastName = $LastName;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->Company;
    }

    /**
     * @param string $Company
     */
    public function setCompany(string $Company): void
    {
        $this->Company = $Company;
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

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->District;
    }

    /**
     * @param string $District
     */
    public function setDistrict(string $District): void
    {
        $this->District = $District;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->City;
    }

    /**
     * @param string $City
     */
    public function setCity(string $City): void
    {
        $this->City = $City;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->Country;
    }

    /**
     * @param string $Country
     */
    public function setCountry(string $Country): void
    {
        $this->Country = $Country;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->PostalCode;
    }

    /**
     * @param string $PostalCode
     */
    public function setPostalCode(string $PostalCode): void
    {
        $this->PostalCode = $PostalCode;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->PhoneNumber;
    }

    /**
     * @param string $PhoneNumber
     */
    public function setPhoneNumber(string $PhoneNumber): void
    {
        $this->PhoneNumber = $PhoneNumber;
    }

    /**
     * @return string
     */
    public function getGsmNumber(): string
    {
        return $this->GsmNumber;
    }

    /**
     * @param string $GsmNumber
     */
    public function setGsmNumber(string $GsmNumber): void
    {
        $this->GsmNumber = $GsmNumber;
    }

    /**
     * @return string
     */
    public function getFaxNumber(): string
    {
        return $this->FaxNumber;
    }

    /**
     * @param string $FaxNumber
     */
    public function setFaxNumber(string $FaxNumber): void
    {
        $this->FaxNumber = $FaxNumber;
    }


}
