<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Requests;
use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;

class GetPosts extends AbstractRequest {








    function getApiEndPoint()
    {
        return '/v2/posts';
    }


    function getPayload()
    {
        return array(
        );
    }

    function getMethod()
    {
        return 'GET';
    }

}