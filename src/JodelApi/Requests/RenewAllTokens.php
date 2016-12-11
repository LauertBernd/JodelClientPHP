<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Requests;
use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;

class RenewAllTokens extends AbstractRequest {


    /**
     * @var string
     */
    protected $deviceId;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }






    function getApiEndPoint()
    {
        return '/v2/users';
    }


    function getPayload()
    {
        return array(
            "location" => $this->getLocation()->toArray(),
            "client_id" => self::CLIENTID,
            "device_uid" => $this->getDeviceId(),
        );
    }

    function getMethod()
    {
        return 'POST';
    }

    /**
     * @return string
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * @param string $deviceId
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

}