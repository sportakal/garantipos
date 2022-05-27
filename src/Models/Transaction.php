<?php

namespace Sportakal\Garantipos\Models;

class Transaction extends BaseModel
{
    protected string $Type;
    protected string $SubType;
    protected string $FirmCardNo;
    protected string $InstallmentCnt;
    protected int $Amount;
    protected string $CurrencyCode;
    protected string $OriginalRetrefNum;
    protected string $DelayDayCount;
    protected string $DownPaymentRate;
    protected string $CardholderPresentCode;
    protected string $MotoInd;
    protected string $Description;
    protected CommercialCardExtendedCredit $CommercialCardExtendedCredit;
    protected Verification $Verification;
    protected DCC $DCC;
    protected UtilityPayment $UtilityPayment;
    protected GSMUnitSales $GSMUnitSales;
    protected CepBank $CepBank;
    protected Secure3D $Secure3D;
    protected array $RewardList;
    protected array $ChequeList;
    protected MoneyCard $MoneyCard;

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
    public function getSubType(): string
    {
        return $this->SubType;
    }

    /**
     * @param string $SubType
     */
    public function setSubType(string $SubType): void
    {
        $this->SubType = $SubType;
    }

    /**
     * @return string
     */
    public function getFirmCardNo(): string
    {
        return $this->FirmCardNo;
    }

    /**
     * @param string $FirmCardNo
     */
    public function setFirmCardNo(string $FirmCardNo): void
    {
        $this->FirmCardNo = $FirmCardNo;
    }

    /**
     * @return string
     */
    public function getInstallmentCnt(): string
    {
        return $this->InstallmentCnt;
    }

    /**
     * @param string $InstallmentCnt
     */
    public function setInstallmentCnt(string $InstallmentCnt): void
    {
        $this->InstallmentCnt = $InstallmentCnt;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->Amount;
    }

    /**
     * @param int $Amount
     */
    public function setAmount(int $Amount): void
    {
        $this->Amount = $Amount;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->CurrencyCode;
    }

    /**
     * @param $currency
     */
    public function setCurrencyCode($currency): void
    {
        $this->CurrencyCode = $currency;
        if (is_string($currency)) {
            switch ($currency) {
                case "USD":
                    $this->CurrencyCode = 840;
                    break;
                case "EUR":
                    $this->CurrencyCode = 978;
                    break;
                case "GBP":
                    $this->CurrencyCode = 826;
                    break;
                case "JPY":
                    $this->CurrencyCode = 392;
                    break;
                case "TRY":
                case "TRL":
                default:
                    $this->CurrencyCode = 949;
                    break;
            }
        }

    }

    /**
     * @return string
     */
    public function getOriginalRetrefNum(): string
    {
        return $this->OriginalRetrefNum;
    }

    /**
     * @param string $OriginalRetrefNum
     */
    public function setOriginalRetrefNum(string $OriginalRetrefNum): void
    {
        $this->OriginalRetrefNum = $OriginalRetrefNum;
    }

    /**
     * @return string
     */
    public function getDelayDayCount(): string
    {
        return $this->DelayDayCount;
    }

    /**
     * @param string $DelayDayCount
     */
    public function setDelayDayCount(string $DelayDayCount): void
    {
        $this->DelayDayCount = $DelayDayCount;
    }

    /**
     * @return string
     */
    public function getDownPaymentRate(): string
    {
        return $this->DownPaymentRate;
    }

    /**
     * @param string $DownPaymentRate
     */
    public function setDownPaymentRate(string $DownPaymentRate): void
    {
        $this->DownPaymentRate = $DownPaymentRate;
    }

    /**
     * @return string
     */
    public function getCardholderPresentCode(): string
    {
        return $this->CardholderPresentCode;
    }

    /**
     * @param string $CardholderPresentCode
     */
    public function setCardholderPresentCode(string $CardholderPresentCode): void
    {
        $this->CardholderPresentCode = $CardholderPresentCode;
    }

    /**
     * @return string
     */
    public function getMotoInd(): string
    {
        return $this->MotoInd;
    }

    /**
     * @param string $MotoInd
     */
    public function setMotoInd(string $MotoInd): void
    {
        $this->MotoInd = $MotoInd;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription(string $Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @return CommercialCardExtendedCredit
     */
    public function getCommercialCardExtendedCredit(): CommercialCardExtendedCredit
    {
        return $this->CommercialCardExtendedCredit;
    }

    /**
     * @param CommercialCardExtendedCredit $CommercialCardExtendedCredit
     */
    public function setCommercialCardExtendedCredit(CommercialCardExtendedCredit $CommercialCardExtendedCredit): void
    {
        $this->CommercialCardExtendedCredit = $CommercialCardExtendedCredit;
    }

    /**
     * @return Verification
     */
    public function getVerification(): Verification
    {
        return $this->Verification;
    }

    /**
     * @param Verification $Verification
     */
    public function setVerification(Verification $Verification): void
    {
        $this->Verification = $Verification;
    }

    /**
     * @return DCC
     */
    public function getDCC(): DCC
    {
        return $this->DCC;
    }

    /**
     * @param DCC $DCC
     */
    public function setDCC(DCC $DCC): void
    {
        $this->DCC = $DCC;
    }

    /**
     * @return UtilityPayment
     */
    public function getUtilityPayment(): UtilityPayment
    {
        return $this->UtilityPayment;
    }

    /**
     * @param UtilityPayment $UtilityPayment
     */
    public function setUtilityPayment(UtilityPayment $UtilityPayment): void
    {
        $this->UtilityPayment = $UtilityPayment;
    }

    /**
     * @return GSMUnitSales
     */
    public function getGSMUnitSales(): GSMUnitSales
    {
        return $this->GSMUnitSales;
    }

    /**
     * @param GSMUnitSales $GSMUnitSales
     */
    public function setGSMUnitSales(GSMUnitSales $GSMUnitSales): void
    {
        $this->GSMUnitSales = $GSMUnitSales;
    }

    /**
     * @return CepBank
     */
    public function getCepBank(): CepBank
    {
        return $this->CepBank;
    }

    /**
     * @param CepBank $CepBank
     */
    public function setCepBank(CepBank $CepBank): void
    {
        $this->CepBank = $CepBank;
    }

    /**
     * @return Secure3D
     */
    public function getSecure3D(): Secure3D
    {
        return $this->Secure3D;
    }

    /**
     * @param Secure3D $Secure3D
     */
    public function setSecure3D(Secure3D $Secure3D): void
    {
        $this->Secure3D = $Secure3D;
    }

    /**
     * @return array
     */
    public function getRewardList(): array
    {
        return $this->RewardList;
    }

    /**
     * @param array $RewardList
     */
    public function setRewardList(array $RewardList): void
    {
        $this->RewardList = $RewardList;
    }

    /**
     * @return array
     */
    public function getChequeList(): array
    {
        return $this->ChequeList;
    }

    /**
     * @param array $ChequeList
     */
    public function setChequeList(array $ChequeList): void
    {
        $this->ChequeList = $ChequeList;
    }

    /**
     * @return MoneyCard
     */
    public function getMoneyCard(): MoneyCard
    {
        return $this->MoneyCard;
    }

    /**
     * @param MoneyCard $MoneyCard
     */
    public function setMoneyCard(MoneyCard $MoneyCard): void
    {
        $this->MoneyCard = $MoneyCard;
    }

    /**
     * @param Reward $Reward
     */
    public function addReward(Reward $Reward): void
    {
        $this->RewardList[] = $Reward;
    }

    /**
     * @param Cheque $Cheque
     */
    public function addCheque(Cheque $Cheque): void
    {
        $this->ChequeList[] = $Cheque;
    }
}
