<?php

namespace App\Services\Crawl;

class CrawlResult extends AbstractCrawlResult
{
    public function __construct(
        protected array $result, 
        protected ?string $nextPage
    ) {}
    
    /**
     * Возвращает результат парсинга
     * @return mixed
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * Возвращает ссылку на следующую страницу для парсинга
     * @return mixed
     */
    public function getNextPage(): string|null
    {
        return $this->nextPage;
    }
}