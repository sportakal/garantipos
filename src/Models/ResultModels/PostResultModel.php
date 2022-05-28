<?php

namespace Sportakal\Garantipos\Models\ResultModels;

use Sportakal\Garantipos\Utils\Arrayable;

class PostResultModel extends Arrayable implements ResultModelInterface
{
    public array $fields;
    public string $secure3dsecuritylevel;
    public string $mode;
    public string $apiversion;
    public string $clientid;
    public string $terminalprovuserid;
    public string $terminaluserid;
    public string $terminalmerchantid;
    public string $customeripaddress;
    public string $customeremailaddress;
    public string $orderid;
    public string $txntype;
    public string $txninstallmentcount;
    public string $txnamount;
    public string $txncurrencycode;
    public string $cavv;
    public string $eci;
    public string $xid;
    public string $md;
    public string $mdstatus;
    public string $mderrormessage;
    public string $response;
    public string $errmsg;
    public string $hostmsg;
    public string $successurl;
    public string $errorurl;
    public string $hash;
    public string $secure3dhash;
    public string $hostrefnum;

    public function __construct(array $post_fields = [])
    {
        if (count($post_fields) === 0) {
            $post_fields = $_POST;
        }
        foreach ($post_fields as $key => $value) {
            $this->{$key} = $value;
        }
        $this->fields = $post_fields;
        $this->hash = $_POST['secure3dhash'] ?? '';
    }
}
