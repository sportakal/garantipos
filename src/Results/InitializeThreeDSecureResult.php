<?php

namespace Sportakal\Garantipos\Results;

use Sportakal\Garantipos\Results\Interfaces\PaymentResultInterface;
use Sportakal\Garantipos\Utils\Response;

class InitializeThreeDSecureResult implements PaymentResultInterface
{
    protected Response $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function setHashData(): void
    {

    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function getHtml(): string
    {
        return $this->response->getRawBody();
    }
}
