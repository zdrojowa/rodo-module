<?php

namespace Selene\Modules\RodoModule\Services\Rodo;

use Exception;
use Throwable;

class RodoException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
