<?php

namespace App\Exceptions;

class DocumentNotFoundException extends \Exception
{
    protected $message = 'Документ для парсинга отсутствует';
}