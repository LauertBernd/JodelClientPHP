<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Requests;

use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;

class GetChannel extends GetPosts
{
    public function getChannelName()
    {
        return "test";
    }

    function getApiEndPoint()
    {
        return '/v3/posts/channel/combo?channel='.$this->getChannelName();
    }


}