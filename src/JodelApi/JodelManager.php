<?php
namespace LauertBernd\JodelClientPHP\JodelApi;
use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;
use LauertBernd\JodelClientPHP\JodelApi\Requests\CreateUserRequest;

class JodelManager{
    /**
     * @return AccountData
     */
    public function registerAccount(Location $location){

        $accountCreator = new CreateUserRequest();
        $accountCreator->setLocation($location);
        $data = $accountCreator->execute();
        var_dump($data);
        var_dump(json_encode($data));
        var_dump($data);
        $account = new AccountData();
        return $account;
    }
    public function login(AccountData $accountData,Location $location){

    }
}