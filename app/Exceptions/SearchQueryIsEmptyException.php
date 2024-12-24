<?php

namespace App\Exceptions;

class SearchQueryIsEmptyException extends \Exception
{
    protected $message = 'Пустой поисковый запрос';
}