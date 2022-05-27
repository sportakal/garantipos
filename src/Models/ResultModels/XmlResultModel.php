<?php

namespace Sportakal\Garantipos\Models\ResultModels;

use Sportakal\Garantipos\Utils\Arrayable;

class XmlResultModel extends Arrayable implements ResultModelInterface
{
    public array $fields;
    public string $source;
    public string $code;
    public string $reason_code;
    public string $message;
    public string $error_message;
    public string $system_error_message;
    public string $ret_ref_num;
    public string $provision_date;
    public string $card_type;
    public string $hash_data;
    public array $host_messages;

    public function __construct(array $post_fields = [])
    {
        if (count($post_fields) < 0) {
            $post_fields = $_POST;
        }
        $this->fields = $post_fields;
        $this->source = $post_fields['Transaction']['Response']['Source'] ?? '';
        $this->code = $post_fields['Transaction']['Response']['Code'];
        $this->reason_code = $post_fields['Transaction']['Response']['ReasonCode'] ?? '';
        $this->message = $post_fields['Transaction']['Response']['Message'] ?? '';
        $this->error_message = $post_fields['Transaction']['Response']['ErrorMsg'] ?? '';
        $this->system_error_message = $post_fields['Transaction']['Response']['SysErrMsg'] ?? '';
        $this->ret_ref_num = $post_fields['Transaction']['RetrefNum'] ?? '';
        $this->provision_date = $post_fields['Transaction']['ProvDate'] ?? '';
        $this->card_type = $post_fields['Transaction']['CardType'] ?? '';
        $this->hash_data = $post_fields['Transaction']['HashData'] ?? '';
        $this->host_messages = $post_fields['Transaction']['HostMsgList']['HostMsg'] ?? [];
    }
}
