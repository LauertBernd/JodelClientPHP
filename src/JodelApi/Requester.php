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

        $payload = array(
            "location" => $this->getLocation()->toArray(),
            "client_id" => self::CLIENTID,
            "device_uid" => $this->generateDeviceId(),
        );
        $url = self::APIURL . self::URL_USERREGISTER;
        $signRequest = new Request();
        $signRequest->setMethod('POST');
        $signRequest->setPayload($payload);
        $signRequest->setUrl($url);

        $header = $signRequest->getSignHeaders();
        $payload = json_encode($payload);
        $result = Requests::post($url, $header, $payload);
        switch ($result->status_code) {
            case 477:
                throw  new \Exception('Signing failed!');
                break;
            case 200:
                $result = json_decode($result->body);
                break;
        }
        var_dump($result);
        return $result;


    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        $location = new Location();
        $location->setLat(48.148434);
        $location->setLng(11.567867);
        $location->setCityName('Munich');
        return $location;

    }

    public function generateDeviceId()
    {
        return $this->random_str(64, 'abcdef0123456789');
    }

    function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

}

