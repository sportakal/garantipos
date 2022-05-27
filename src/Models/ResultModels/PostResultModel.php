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
    public string $hostrefnum;

    public function __construct(array $post_fields = [])
    {
        if (count($post_fields) === 0) {
            $post_fields = $_POST;
        }
        $this->fields = $post_fields;
        $this->secure3dsecuritylevel = $post_fields['secure3dsecuritylevel'] ?? '';
        $this->mode = $post_fields['mode'] ?? '';
        $this->apiversion = $post_fields['apiversion'] ?? '';
        $this->clientid = $post_fields['clientid'] ?? '';
        $this->terminalprovuserid = $post_fields['terminalprovuserid'] ?? '';
        $this->terminaluserid = $post_fields['terminaluserid'] ?? '';
        $this->terminalmerchantid = $post_fields['terminalmerchantid'] ?? '';
        $this->customeripaddress = $post_fields['customeripaddress'] ?? '';
        $this->customeremailaddress = $post_fields['customeremailaddress'] ?? '';
        $this->orderid = $post_fields['orderid'] ?? '';
        $this->txntype = $post_fields['txntype'] ?? '';
        $this->txninstallmentcount = $post_fields['txninstallmentcount'] ?? '';
        $this->txnamount = $post_fields['txnamount'] ?? '';
        $this->txncurrencycode = $post_fields['txncurrencycode'] ?? '';
        $this->cavv = $post_fields['cavv'] ?? '';
        $this->eci = $post_fields['eci'] ?? '';
        $this->xid = $post_fields['xid'] ?? '';
        $this->md = $post_fields['md'] ?? '';
        $this->mdstatus = $post_fields['mdstatus'] ?? '';
        $this->mderrormessage = $post_fields['mderrormessage'] ?? '';
        $this->response = $post_fields['response'] ?? '';
        $this->errmsg = $post_fields['errmsg'] ?? '';
        $this->hostmsg = $post_fields['hostmsg'] ?? '';
        $this->successurl = $post_fields['successurl'] ?? '';
        $this->errorurl = $post_fields['errorurl'] ?? '';
        $this->hash = $_POST['secure3dhash'] ?? '';
        $this->hostrefnum = $_POST['hostrefnum'] ?? '';
    }
}
