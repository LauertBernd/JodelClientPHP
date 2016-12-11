<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Requests;
use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;

class CreateUserRequest extends RenewAllTokens {



    public function generateDeviceId()
    {
        return $this->random_str(64, 'abcdef0123456789');
    }

    function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }
    /**
     * @return string
     */
    public function getDeviceId()
    {
        return $this->generateDeviceId();
    }
}