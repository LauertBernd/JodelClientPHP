<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Model;
class Post
{
    protected $rawData;

    public function __construct($rawData)
    {
        $this->rawData = $rawData;
    }
    public function getText(){
        return $this->rawData["message"];
    }
    public function getId(){
        return $this->rawData['post_id'];
    }


}