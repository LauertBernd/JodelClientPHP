<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Requests;

use Requests;
use DateTime;

abstract class AbstractRequest
{
    CONST CLIENTID = '6a62f24e-7784-0226-3fffb-5e0e895aaaf';
    CONST APIURL = 'https://api.go-tellm.com/api';

    public function execute()
    {
        $header = $this->getSignHeaders();
        $payload = json_encode($this->getPayload());
        $url = $this->getFullUrl();
        $result = new \stdClass();
        switch ($this->getMethod()) {
            case 'POST':
                $result = Requests::post($url, $header, $payload);
                break;
            case 'GET':
                break;
        }

        switch ($result->status_code) {
            case 477:
                throw  new \Exception('Signing failed!');
                break;
            case 200:
                $result = json_decode($result->body);
                break;
            default:
                throw  new \Exception('Unknown Error');
        }
        return $result;
    }

    /**
     * Gets Sign headers
     * @return array headers
     */
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


        $urlParts = parse_url($this->getFullUrl());
        $url2 = "";
        $req = [$this->getMethod(),
            $urlParts['host'],
            "443",
            $urlParts['path'],
            "",
            $timestamp,
            $url2,
            json_encode($this->getPayload())];
        $reqString = implode("%", $req);


        $secret = "bgulhzgo9876GFKgguzTZITFGMn879087vbgGFuz";
        $signature = hash_hmac('sha1', $reqString, $secret);
        $signature = strtoupper($signature);


        $headers['X-Authorization'] = 'HMAC ' . $signature;
        $headers['X-Client-Type'] = 'wodel_1.1';
        $headers['X-Timestamp'] = $timestamp;
        $headers['X-Api-Version'] = '0.2';

        return $headers;
    }

    public function getFullUrl()
    {
        return self::APIURL . $this->getApiEndPoint();
    }

    abstract function getApiEndPoint();

    abstract function getMethod();

    abstract function getPayload();
}