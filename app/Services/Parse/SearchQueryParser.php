<?php

namespace App\Services\Parse;

use App\Exceptions\DocumentHasNoBodyException;
use App\Exceptions\SearchQueryIsEmptyException;
use DiDom\Document;
use App\Exceptions\DocumentNotFoundException;

/**
 * Осуществляет парсинг постов на основе поиска по подстроке
 */
class SearchQueryParser extends AbstractParser
{
    protected string $searchQuery = '';

    /**
     * Парсит документ и возвращает массив с найденной информацией
     * @return array
     */
    public function parse(): array
    {
        if (!($this->doc instanceof Document)) {
            throw new DocumentNotFoundException();
        }

        if (!$this->searchQuery) {
            throw new SearchQueryIsEmptyException();
        }

        $parsedPosts = [];
        
        $searchPattern = '#' . preg_quote($this->searchQuery, '#') . '\s+#iu';
        $bodyOffset = strpos($this->doc->html(), '<body');

        if ($bodyOffset === false) {
            throw new DocumentHasNoBodyException();
        }

        //Если в документе не встречается запрос, то не нужно осуществлять парсинг по статьям
        //Проверку начинаем от тега body, так как в head тоже может встретиться этот запрос
        if (preg_match(pattern: $searchPattern, subject: $this->doc->html(), offset: $bodyOffset) === 0) {
            return $parsedPosts;
        }

        $elements = $this->doc->find('article.widg_newsblock_element');
        
        foreach ($elements as $el) {
            $title = $el->first('span[itemprop="name headline"]');
            $description = $el->first('div[itemprop="description"]');

            if (
                preg_match($searchPattern, $title->text()) === 0 && 
                preg_match($searchPattern, $description->text()) === 0
            ) {
                continue;
            }
            
            $parsedPosts[] = [
                'title' => $title->text(),
                'description' => $description->text(),
                'link' => $title->parent()->getAttribute('href'),
            ];
        }

        return $parsedPosts;
    }

    /**
     * Устаналивает поисковый запрос
     * @param string $query
     * @return SearchQueryParser
     */
    public function setSearchQuery(string $query): static
    {
        $this->searchQuery = $query;

        return $this;
    }
}