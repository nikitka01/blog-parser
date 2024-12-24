<?php

namespace App\Services\Crawl;

use DiDom\Query;

class Crawler extends AbstractCrawler
{
    /**
     * Запускает парсинг текущей страницы и поиск следующей страницы для парсинга
     * @return \App\Services\Crawl\CrawlResult
     */
    public function crawlAndParse(): CrawlResult
    {
        return new CrawlResult(
            $this->parser->parse(),
            $this->getNextPageUrl()
        );
    }

    /**
     * Ищет и возвращает ссылку на следующую страницу для парсинга
     * @return string|null
     */
    protected function getNextPageUrl(): string|null
    {
        if (!$this->doc->has("//a[@class='pgNextLink' and not(contains(@class, 'pgLinkUnactive'))]", Query::TYPE_XPATH)) {
            return null;
        }

        return $this->doc->first("//a[@class='pgNextLink' and not(contains(@class, 'pgLinkUnactive'))]", Query::TYPE_XPATH)->getAttribute('href');
    }
}