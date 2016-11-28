<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Requests;

use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;

class GetNewPosts extends GetPosts
{


    function getApiEndPoint()
    {
        return '/v2/posts/location';
    }


}