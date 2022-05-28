<?php

namespace Sportakal\Garantipos\Requests\Constructors;

use Sportakal\Garantipos\Models\GVPSRequestModel;
use Sportakal\Garantipos\Models\RequestModelInterface;
use Sportakal\Garantipos\Models\ResultModels\ResultModelInterface;
use Sportakal\Garantipos\Requests\Interfaces\RequestInterface;
use Sportakal\Garantipos\Utils\CreateHashData;
use Sportakal\Garantipos\Utils\CreateSecurityData;
use Sportakal\Garantipos\Utils\Response;

abstract class RequestBase implements RequestInterface
{
    protected string $hash_data;
    protected string $security_data;
    protected RequestModelInterface $requestModel;
    protected Response $response;

    public function __construct(RequestModelInterface $requestModel)
    {
        $this->requestModel = $requestModel;
        $this->setHashData();
    }

    protected function setSecurityData(): void
    {
        $this->security_data = CreateSecurityData::get($this->requestModel->getTerminal());
    }

    public function getHashData(): string
    {
        if (empty($this->hash_data)) {
            $this->setHashData();
        }
        return $this->hash_data;
    }

}
