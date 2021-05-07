<?php

namespace WebforceHQ\Midigator\Exceptions;

use Exception;

class FetchTokenException extends Exception
{

    protected $message = "There was an error trying to fetch the token";

    public function __construct($msg = null)
    {
        if ($msg) {
            $this->message = $msg;
        }
    }
}
