<?php

namespace App\Services\Crawl;

use DiDom\Document;
use App\Services\Parse\AbstractParser;

abstract class AbstractCrawler
{
    protected AbstractParser $parser;
    protected Document $doc;

    /**
     * Устанавливает парсер
     * @param \App\Services\Parse\AbstractParser $parser
     * @return AbstractCrawler
     */
    public function loadParser(AbstractParser $parser): static
    {
        $this->parser = $parser;

        return $this;
    }

    /**
     * Загружает документ
     * @param \DiDom\Document $document
     * @return AbstractCrawler
     */
    public function loadDocument(Document $document): static
    {
        $this->doc = $document;

        return $this;
    }

    /**
     * Ищет и возвращает ссылку на следующую страницу для парсинга
     * @return string|null
     */
    abstract protected function getNextPageUrl(): string|null;

    /**
     * Запускает парсинг текущей страницы и поиск следующей страницы для парсинга
     * @return \App\Services\Crawl\AbstractCrawlResult
     */
    abstract public function crawlAndParse(): AbstractCrawlResult; 
}