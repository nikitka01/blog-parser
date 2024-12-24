<?php

namespace App\Services\Crawl;

abstract class AbstractCrawlResult
{
    /**
     * Возвращает результат парсинга
     * @return mixed
     */
    abstract public function getResult(): mixed;

    /**
     * Возвращает ссылку на следующую страницу для парсинга
     * @return mixed
     */
    abstract public function getNextPage(): mixed;
}