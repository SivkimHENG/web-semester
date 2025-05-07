<?php

namespace App\Exceptions;

use Exception;

class CustomHandlerException extends Exception
{
    protected $code;

    protected $userMessage;

    public function __construct($message = '', $code = 0, $userMessage = '')
    {
        parent::__construct($message,$code);
        $this->userMessage = $userMessage;
    }

    public function getUserMessage()
    {
        return $this->userMessage;
    }

}
