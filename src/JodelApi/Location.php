<?php
namespace LauertBernd\JodelClientPHP\JodelApi;
class Location{
    /**
     * @var string
     */
    protected $cityName;
    /**
     * @var string
     */
    protected $lat;
    /**
     * @var string
     */
    protected $lng;

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

    /**
     * @param string $cityName
     */
    public function setCityName(string $cityName)
    {
        $this->cityName = $cityName;
    }

    /**
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     */
    public function setLat(string $lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return string
     */
    public function getLng(): string
    {
        return $this->lng;
    }

    /**
     * @param string $lng
     */
    public function setLng(string $lng)
    {
        $this->lng = $lng;
    }
    public function toArray(){
        return array(
            "loc_accuracy" => 10.0,
            "city" => $this->getCityName(),
            "loc_coordinates" => array(
                "lat" => $this->getLat(),
                "lng" => $this->getLng(),
            ),
            "country" => 'DE',
            "name" => "41"
        );
    }
}