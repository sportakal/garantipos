<?php

namespace Sportakal\Garantipos\Utils;


class Response
{
    protected $curl;
    protected string $result;
    protected string $requestMethod;

    public function __construct($curl, string $result, string $requestMethod)
    {
        $this->curl = $curl;
        $this->result = $result;
        $this->requestMethod = $requestMethod;
    }

    /**
     * @return string
     */
    public function getRawBody(): string
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function getInfo(): array
    {
        return curl_getinfo($this->curl);
    }

    /**
     * @return array
     * @throws \JsonException
     */
    public function getArray(): array
    {
        return (new XmlParser($this->getRawBody()))->getArray();
    }

    /**
     * @param $key
     * @return array|string|null
     * @throws \JsonException
     */
    public function getValue($key)
    {
        return (new XmlParser($this->getRawBody()))->getValue($key);
    }
}
