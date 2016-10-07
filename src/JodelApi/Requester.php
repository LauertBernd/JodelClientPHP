<?php
namespace LauertBernd\JodelClientPHP\JodelApi;
use Requests;
/**
 * Class Requester
 */
class Requester
{
    CONST CLIENTID = '6a62f24e-7784-0226-3fffb-5e0e895aaaf';
    CONST APIURL = 'https://api.go-tellm.com/api';
    CONST URL_USERREGISTER = '/v2/users';

    public function createAccount()
    {
        $payload = array("client_id" => self::CLIENTID,
            "device_uid" => $this->generateDeviceId(),
            "location" => $this->getLocation()->toArray());
        $url = self::APIURL . self::URL_USERREGISTER;
        $header = array("Connection" => "keep-alive",
            "Accept-Encoding" => "gzip",
            "Content-Type" => "application/json; charset=UTF-8",
            "User-Agent" => "Jodel/1.1 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)"
        );
        $payload = json_encode($payload);
        Requests::post($url, $header, $payload);

    }

    public function generateDeviceId()
    {
        return hash('sha256', microtime());
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        $location = new Location();
        $location->setLat(50.1183);
        $location->setLng(8.7011);
        $location->setCityName('Frankfurt am Main');
        return $location;

    }

}

