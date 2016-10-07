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
        $signRequest = new Request();
        $signRequest->setMethod('POST');
        $signRequest->setPayload($payload);
        $signRequest->setUrl($url);

        $header = $signRequest->getSignHeaders();
        $payload = json_encode($payload);
        var_dump($payload);
        var_dump($header);
        $result = Requests::post($url, $header, $payload);
        switch($result->status_code){
            case 477:
                throw  new \Exception('Signing failed!');
                break;
            case 200:
                $result = json_decode($result->body);
                break;
        }
        return $result;



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

