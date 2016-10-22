<?php
namespace LauertBernd\JodelClientPHP\JodelApi;

use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;
use LauertBernd\JodelClientPHP\JodelApi\Requests\CreateUserRequest;
use LauertBernd\JodelClientPHP\JodelApi\Requests\GetPosts;

class JodelManager
{
    /**
     * @return AccountData
     */
    public function registerAccount(Location $location)
    {

        $accountCreator = new CreateUserRequest();
        $accountCreator->setLocation($location);
        $data = $accountCreator->execute();
        var_dump($data);
        $account = new AccountData();
        //$account->setAccessToken('')
        // TODO : Fill Data to the Account


        return $account;
    }

    public function getPosts(AccountData $accountData)
    {
        $accountCreator = new GetPosts();
        $accountCreator->setAccessToken($accountData->getAccessToken());
        $data = $accountCreator->execute();
        //var_dump($data);
        //var_dump(json_encode($data));
        return $data;
    }
}