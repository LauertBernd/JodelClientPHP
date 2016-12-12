<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Model;
class AccountData implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $accessToken;
    /**
     * @var string
     */
    protected $expirationDate;
    /**
     * @var string
     */
    protected $refreshToken;
    /**
     * @var string
     */
    protected $distinctId;
    /**
     * @var string
     */
    protected $deviceUid;

    /**
     * @return string
     */
    public function getAccessToken(): string
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

    /**
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     */
    public function setExpirationDate(string $expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken(string $refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return string
     */
    public function getDistinctId(): string
    {
        return $this->distinctId;
    }

    /**
     * @param string $distinctId
     */
    public function setDistinctId(string $distinctId)
    {
        $this->distinctId = $distinctId;
    }

    /**
     * @return string
     */
    public function getDeviceUid(): string
    {
        return $this->deviceUid;
    }

    /**
     * @param string $deviceUid
     */
    public function setDeviceUid(string $deviceUid)
    {
        $this->deviceUid = $deviceUid;
    }


    function jsonSerialize()
    {
        return json_encode(get_object_vars($this),JSON_PRETTY_PRINT);
    }
    function loadFromJson(string $data){
        $data = json_decode($data);
        foreach($data as $key => $val)
        {
            if(property_exists(__CLASS__,$key))
            {
                $this->$key =  $val;
            }
        }
    }
}