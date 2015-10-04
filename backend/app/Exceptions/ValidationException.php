<?php

namespace App\Exceptions;


class ValidationException extends ApiException
{

    /**
     * @var integer
     */
    protected $statusCode = 400;

    /**
     * @param string  $message
     * @param integer $statusCode
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}