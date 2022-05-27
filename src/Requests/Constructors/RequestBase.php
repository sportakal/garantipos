<?php

namespace Sportakal\Garantipos\Requests\Constructors;

use Sportakal\Garantipos\Models\RequestModel;
use Sportakal\Garantipos\Models\ResultModels\ResultModelInterface;
use Sportakal\Garantipos\Requests\Interfaces\RequestInterface;
use Sportakal\Garantipos\Utils\CreateHashData;
use Sportakal\Garantipos\Utils\CreateSecurityData;
use Sportakal\Garantipos\Utils\Response;

abstract class RequestBase implements RequestInterface
{
    protected string $hash_data;
    protected string $security_data;
    protected RequestModel $GVPSRequest;
    protected Response $response;

    public function __construct(RequestModel $GVPSRequest)
    {
        $this->GVPSRequest = $GVPSRequest;
        $this->setHashData();
    }

    protected function setSecurityData(): void
    {
        $this->security_data = CreateSecurityData::get($this->GVPSRequest->getTerminal());
    }

    public function getHashData(): string
    {
        if (empty($this->hash_data)) {
            $this->setHashData();
        }
        return $this->hash_data;
    }

}
