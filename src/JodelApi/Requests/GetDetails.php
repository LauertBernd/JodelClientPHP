<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Requests;

use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;

class GetDetails extends AbstractRequest
{

    protected $postId;

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }


    function getApiEndPoint()
    {
        return sprintf('/v2/posts/%s/',$this->getPostId());
    }


    function getPayload()
    {
        return array();
    }

    function getMethod()
    {
        return 'GET';
    }

}
