<?php

namespace App\Exceptions\Offer;

use Exception;

class OfferException extends Exception
{
    public function __construct($message = '')
    {
        parent::__construct($message);
    }
}
