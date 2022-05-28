<?php

namespace Sportakal\Garantipos\Requests\Constructors;

use Sportakal\Garantipos\Results\PayResult;
use Sportakal\Garantipos\Utils\Curl;
use Sportakal\Garantipos\Utils\GetHost;
use Sportakal\Garantipos\Utils\Response;
use Sportakal\Garantipos\Utils\XmlCreator;

abstract class XmlRequest extends RequestBase
{
    /**
     * @throws \DOMException
     */
    protected function exec():void
    {
        $array = [$this->requestModel->toArray()];
        $xml = (new XmlCreator($array, false))->getXml();
        $body = "data=" . $xml;
        $this->response = (new Curl(GetHost::get($this->requestModel->getMode(), true), $body))->getResponse();
    }
}
