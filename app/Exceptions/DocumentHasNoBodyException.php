<?php

namespace App\Exceptions;

class DocumentHasNoBodyException extends \Exception
{
    protected $message = 'В документе не найден тег body';
}