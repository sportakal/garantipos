<?php

namespace Sportakal\Garantipos\Models;

class PostRequestModel extends BaseModel implements RequestModelInterface
{
    protected Options $options;
    protected Terminal $terminal;
    protected Customer $customer;
    protected Card $card;
    protected Order $order;
    protected Transaction $transaction;

    protected string $secure3dsecuritylevel; // 3D 3D_PAY 3D_FULL 3D_HALF 3D_OOS_PAY 3D_OOS_FULL 3D_OOS_HALF OOS_PAY
    protected string $mode = 'TEST';
    protected string $apiversion = 'v0.01';

    protected string $cardnumber;
    protected string $cardexpiredatemonth;
    protected string $cardexpiredateyear;
    protected string $cardcvv2;

    protected string $terminalprovuserid;
    protected string $terminaluserid;
    protected string $terminalid;
    protected string $terminalmerchantid;

    protected string $customeripaddress;
    protected string $customeremailaddress;

    protected string $txntype;
    protected string $txnamount;
    protected string $txncurrencycode;
    protected string $txninstallmentcount;

    protected string $txntimestamp;
    protected string $Lang;
    protected string $Refreshtime;

    protected string $orderid;

    protected string $companyname;

    protected string $secure3dhash;

    protected string $successurl;
    protected string $errorurl;

    /**
     * @param Options $options
     */
    public function setOptions(Options $options): void
    {
        $this->options = $options;
        $this->mode = $options->getMode();
        $this->apiversion = $options->getApiVersion();
        $this->terminalprovuserid = $options->getTerminalProvUserId();
        $this->terminaluserid = $options->getTerminalUserId();
        $this->terminalid = $options->getTerminalId();
        $this->terminalmerchantid = $options->getTerminalMerchantId();
        $this->terminal = $options->getTerminal();
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
        $this->customeripaddress = $customer->getIPAddress();
        $this->customeremailaddress = $customer->getEmailAddress();
    }

    /**
     * @param Card $card
     */
    public function setCard(Card $card): void
    {
        $this->card = $card;
        $this->cardnumber = $card->getNumber();
        $this->cardexpiredatemonth = substr($card->getExpireDate(), 0, 2);
        $this->cardexpiredateyear = substr($card->getExpireDate(), 2, 2);
        $this->cardcvv2 = $card->getCVV2();
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order): void
    {
        $this->order = $order;
        $this->orderid = $order->getOrderID();

        $address_list = $this->order->getAddressList();
        $this->orderaddresscount = count($address_list);
        $i = 1;
        foreach ($address_list as $address) {
            $address = $address->toArray();
            $this->{"orderaddresscity$i"} = $address['City'] ?? '';
            $this->{"orderaddresscompany$i"} = $address['Company'] ?? '';
            $this->{"orderaddresscountry$i"} = $address['Country'] ?? '';
            $this->{"orderaddressdistrict$i"} = $address['District'] ?? '';
            $this->{"orderaddressfaxnumber$i"} = $address['FaxNumber'] ?? '';
            $this->{"orderaddressgsmnumber$i"} = $address['GsmNumber'] ?? '';
            $this->{"orderaddressname$i"} = $address['Name'] ?? '';
            $this->{"orderaddresslastname$i"} = $address['LastName'] ?? '';
            $this->{"orderaddressphonenumber$i"} = $address['PhoneNumber'] ?? '';
            $this->{"orderaddresspostalcode$i"} = $address['PostalCode'] ?? '';
            $this->{"orderaddresstext$i"} = $address['Text'] ?? '';
            $this->{"orderaddresstype$i"} = $address['Type'] ?? '';
            $i++;
        }

        $item_list = $this->order->getItemList();
        $this->orderitemcount = count($item_list);
        $i = 1;
        foreach ($item_list as $item) {
            $item = $item->toArray();
            $this->{"orderitemnumber$i"} = $item['Number'] ?? '';
            $this->{"orderitemproductid$i"} = $item['ProductID'] ?? '';
            $this->{"orderitemproductcode$i"} = $item['ProductCode'] ?? '';
            $this->{"orderitemquantity$i"} = $item['Quantity'] ?? '';
            $this->{"orderitemprice$i"} = $item['Price'] ?? '';
            $this->{"orderitemtotalamount$i"} = $item['TotalAmount'] ?? '';
            $this->{"orderitemdescription$i"} = $item['Description'] ?? '';
            $i++;
        }
    }

    /**
     * @param Transaction $transaction
     */
    public function setTransaction(Transaction $transaction): void
    {
        $this->transaction = $transaction;
        $transaction_array = $transaction->toArray();
        $this->txntype = $transaction_array['Type'] ?? '';
        $this->txnamount = $transaction_array['Amount'] ?? '';
        $this->txncurrencycode = $transaction_array['CurrencyCode'] ?? '';
        $this->txninstallmentcount = $transaction_array['InstallmentCnt'] ?? '';
        $this->txntimestamp = time();
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }


    /**
     * @return Options
     */
    public function getOptions(): Options
    {
        return $this->options;
    }

    /**
     * @return Terminal
     */
    public function getTerminal(): Terminal
    {
        return $this->terminal;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return Card
     */
    public function getCard(): Card
    {
        return $this->card;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @return Transaction
     */
    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }


    /**
     * @param string $secure3dsecuritylevel
     */
    public function setSecure3dsecuritylevel(string $secure3dsecuritylevel): void
    {
        $this->secure3dsecuritylevel = $secure3dsecuritylevel;
    }


    /**
     * @param string $Lang
     */
    public function setLang(string $Lang): void
    {
        $this->Lang = $Lang;
    }

    /**
     * @param string $Refreshtime
     */
    public function setRefreshtime(string $Refreshtime): void
    {
        $this->Refreshtime = $Refreshtime;
    }

    /**
     * @param string $companyname
     */
    public function setCompanyname(string $companyname): void
    {
        $this->companyname = $companyname;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->setSecure3dhash($hash);
    }

    /**
     * @param string $secure3dhash
     */
    public function setSecure3dhash(string $secure3dhash): void
    {
        $this->getTerminal()->setHashData($secure3dhash);
        $this->secure3dhash = $secure3dhash;
    }

    /**
     * @param string $successurl
     */
    public function setSuccessurl(string $successurl): void
    {
        $this->successurl = $successurl;
    }

    /**
     * @param string $errorurl
     */
    public function setErrorurl(string $errorurl): void
    {
        $this->errorurl = $errorurl;
    }

    /**
     * @return string
     */
    public function getSuccessurl(): string
    {
        return $this->successurl ?? '';
    }

    /**
     * @return string
     */
    public function getErrorurl(): string
    {
        return $this->errorurl ?? '';
    }

    public function toArray(): array
    {
        $array = parent::toArray();
        foreach ($array as $key => $value) {
            if (is_null($value) || is_object($value) || is_array($value)) {
                unset($array[$key]);
            }
        }
        return $array;
    }
}

