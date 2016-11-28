<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Requests;

use LauertBernd\JodelClientPHP\JodelApi\Exceptions\SigningError;
use LauertBernd\JodelClientPHP\JodelApi\Exceptions\StatusError;
use Requests;
use DateTime;

abstract class AbstractRequest
{
    CONST CLIENTID = '81e8a76e-1e02-4d17-9ba0-8a7020261b26';
    CONST APIURL = 'https://api.go-tellm.com/api';
    const SECRET = "aPLFAjyUusVPHgcgvlAxihthmRaiuqCjBsRCPLan";
    const USERAGENT = "Jodel/4.4.9 Dalvik/2.1.0 (Linux; U; Android 5.1.1; )";
    const CLIENT_TYPE = 'android_4.28.1';
    /**
     * @var string
     */
    protected $accessToken = null;
    private $payLoad;

    public function execute()
    {
        $this->payLoad = json_encode($this->getPayload());
        $header = $this->getSignHeaders();
        $url = $this->getFullUrl();
        $result = new \stdClass();
        if ($this->getAccessToken()) {
            $header['Authorization'] = "Bearer " . $this->getAccessToken();
        }

        /* Comment out to debug the Request:
        var_dump($url);
        var_dump($header);
        var_dump($this->payLoad);
        */
        switch ($this->getMethod()) {
            case 'POST':
                $result = Requests::post($url, $header, $this->payLoad);
                break;
            case 'GET':
                $result = Requests::get($url, $header);
                break;
        }

        switch ($result->status_code) {
            case 477:
                throw  new SigningError('Signing failed!');
                break;
            case 200:
                $result = json_decode($result->body, true);
                break;
            default:
                throw  new StatusError('Status Error', 0, null, $result);
        }
        return $result;
    }

    abstract function getPayload();

    /**
     * Gets Sign headers
     * @return array headers
     */
    public function getSignHeaders()
    {
        $headers = array(
            "Connection" => "keep-alive",
            "Accept-Encoding" => "gzip",
            "Content-Type" => "application/json; charset=UTF-8",
            "User-Agent" => self::USERAGENT
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
            $this->payLoad];
        $reqString = implode("%", $req);


        $secret = self::SECRET;
        $signature = hash_hmac('sha1', $reqString, $secret);
        $signature = strtoupper($signature);


        $headers['X-Authorization'] = 'HMAC ' . $signature;
        $headers['X-Client-Type'] = self::CLIENT_TYPE;
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

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }
}