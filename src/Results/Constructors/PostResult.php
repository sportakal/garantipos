<?php

namespace Sportakal\Garantipos\Results\Constructors;

use Sportakal\Garantipos\Exceptions\HashCheckFailedException;
use Sportakal\Garantipos\Models\Options;
use Sportakal\Garantipos\Models\Order;
use Sportakal\Garantipos\Models\ResultModels\PostResultModel;
use Sportakal\Garantipos\Models\Transaction;
use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;
use Sportakal\Garantipos\Utils\Arrayable;

abstract class PostResult extends Arrayable implements PaymentResultInterface
{
    protected PostResultModel $postResultModel;
    protected Options $options;
    protected string $hash_data;
    protected bool $md_status;
    protected int $md_status_code;
    protected string $md_error_message;
    protected string $response_message;
    protected string $error_message;
    protected string $host_message;
    protected string $reference_number;


    /**
     * @param array $postFields
     * @throws HashCheckFailedException
     */
    public function __construct(Options $options, array $postFields = [])
    {
        $this->postResultModel = new PostResultModel($postFields);
        $this->options = $options;

        $this->setMdStatus(in_array((int)$this->postResultModel->mdstatus, [1, 2, 3, 4], true));
        $this->setMdStatusCode((int)$this->postResultModel->mdstatus);
        $this->setMdErrorMessage($this->postResultModel->mderrormessage);
        $this->setResponseMessage($this->postResultModel->response);
        $this->setErrorMessage($this->postResultModel->errmsg);
        $this->setHostMessage($this->postResultModel->hostmsg);
        $this->setReferenceNumber($this->postResultModel->hostrefnum);

        if ($this->getHashData() !== $this->postResultModel->hash) {
            throw new HashCheckFailedException();
        }
    }

    /**
     * @return string
     */
    public function getReferenceNumber(): string
    {
        return $this->reference_number;
    }

    /**
     * @param string $reference_number
     */
    protected function setReferenceNumber(string $reference_number): void
    {
        $this->reference_number = $reference_number;
    }


    /**
     * @return string
     */
    public function getHashData(): string
    {
        if (empty($this->hash_data)) {
            $this->setHashData();
        }
        return $this->hash_data; //1B493654D0089F8D202E8EC3B54EB590EDE84C42
    }

    /**
     * @param bool $md_status
     * @return void
     */
    protected function setMdStatus(bool $md_status): void
    {
        $this->md_status = $md_status;
    }

    /**
     * @param $md_status_code
     * @return void
     */
    protected function setMdStatusCode($md_status_code): void
    {
        $this->md_status_code = $md_status_code;
    }

    /**
     * @param $md_error_message
     * @return void
     */
    protected function setMdErrorMessage($md_error_message): void
    {
        if ($this->md_status_code === 1) {
            $this->md_error_message = "Tam Doğrulama";
        } else if ($this->md_status_code === 2) {
            $this->md_error_message = "Kart Sahibi veya bankası sisteme kayıtlı değil";
        } else if ($this->md_status_code === 3) {
            $this->md_error_message = "Kartın bankası sisteme kayıtlı değil";
        } elseif ($this->md_status_code === 4) {
            $this->md_error_message = "Doğrulama denemesi, kart sahibi sisteme daha sonra kayıt olmayı seçmiş";
        } else if ($this->md_status_code === 5) {
            $this->md_error_message = "Doğrulama yapılamıyor";
        } else if ($this->md_status_code === 7) {
            $this->md_error_message = "Sistem Hatası";
        } else if ($this->md_status_code === 8) {
            $this->md_error_message = "Bilinmeyen Kart No";
        } else if ($this->md_status_code === 0) {
            $this->md_error_message = "Doğrulama Başarısız, 3-D Secure imzası geçersiz.";
        } else if ($md_error_message !== '') {
            $this->md_error_message = $md_error_message;
        }
    }

    /**
     * @param string $response_message
     */
    protected function setResponseMessage(string $response_message): void
    {
        $this->response_message = $response_message;
    }

    /**
     * @param string $error_message
     */
    protected function setErrorMessage(string $error_message): void
    {
        $this->error_message = $error_message;
    }

    /**
     * @param string $host_message
     */
    protected function setHostMessage(string $host_message): void
    {
        $this->host_message = $host_message;
    }


    /**
     * @return bool
     */
    public function getMdStatus(): bool
    {
        return $this->md_status;
    }

    /**
     * @return int
     */
    public function getMdStatusCode(): int
    {
        return $this->md_status_code;
    }

    /**
     * @return string
     */
    public function getMdErrorMessage(): string
    {
        return $this->md_error_message;
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->response_message;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error_message;
    }

    /**
     * @return string
     */
    public function getHostMessage(): string
    {
        return $this->host_message;
    }

}
