<?php
namespace LauertBernd\JodelClientPHP\JodelApi;

use DateTime;

class Request
{

    /**
     * @var string
     */
    protected $method;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var array
     */
    protected $payload;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @param array $payload
     */
    public function setPayload(array $payload)
    {
        $this->payload = $payload;
    }

    public function getSignHeaders()
    {
        $headers = array("Connection" => "keep-alive",
            "Accept-Encoding" => "gzip",
            "Content-Type" => "application/json; charset=UTF-8",
            "User-Agent" => "Jodel/1.1 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)"
        );
        $timestamp = new DateTime();
        $timestamp = $timestamp->format(DateTime::ATOM);
        $timestamp = substr($timestamp, 0, -6);
        $timestamp .= "Z";



        $urlParts = parse_url($this->url);
        $url2 = "";
        $req = [$this->method,
            $urlParts['host'],
            "443",
            $urlParts['path'],
            "",
            $timestamp,
            $url2,
            json_encode($this->payload)];
        $reqString = implode("%",$req);



        $secret = "bgulhzgo9876GFKgguzTZITFGMn879087vbgGFuz";
        $signature = hash_hmac ( 'sha1' , $reqString , $secret );
        $signature = strtoupper($signature);


        $headers['X-Authorization'] = 'HMAC ' . $signature;
        $headers['X-Client-Type'] = 'wodel_1.1';
        $headers['X-Timestamp'] = $timestamp;
        $headers['X-Api-Version'] = '0.2';

        return $headers;
    }

}