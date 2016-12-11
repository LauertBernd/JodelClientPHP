<?php

namespace LauertBernd\JodelClientPHP\JodelApi\Exceptions;
class StatusError extends \Exception
{
    protected $result;

    public function __construct($message, $code, \Exception $previous = null, $result)
    {
        parent::__construct($message, $code, $previous);
        $this->result = $result;
    }


    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }
}