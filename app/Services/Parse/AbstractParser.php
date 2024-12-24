<?php

namespace App\Services\Parse;

use DiDom\Document;

abstract class AbstractParser
{
    protected Document $doc;

    /**
     * Загружает документ
     * @param \DiDom\Document $doc
     * @return AbstractParser
     */
    public function loadDocument(Document $doc): static
    {
        $this->doc = $doc;

        return $this;
    }

    /**
     * Парсит документ и возвращает массив с найденной информацией
     * @return array
     */
    abstract public function parse(): array;
}