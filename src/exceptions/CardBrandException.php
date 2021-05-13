<?php

namespace WebforceHQ\Midigator\Exceptions;

use Exception;

class CardBrandException extends Exception
{

    protected $message = "There was an error trying to set the card brand";

    public function __construct($msg = null)
    {
        if ($msg) {
            $this->message = $msg;
        }
    }
}