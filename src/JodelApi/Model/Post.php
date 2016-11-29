<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Model;

use DateTime;

class Post
{
    protected $rawData;

    public function __construct($rawData)
    {
        $this->rawData = $rawData;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->rawData["message"];
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->rawData['post_id'];
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->rawData['user_handle'];
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        $dateTime = new DateTime($this->rawData['created_at']);
        return $dateTime;
    }

    public function getImageURL()
    {
        return "http:".$this->rawData['image_url'];
    }
    public function hasImage(){
        return isset($this->rawData['image_url']);
    }

    public function getThumbnailURL()
    {
        return "http:".$this->rawData['thumbnail_url'];
    }

}