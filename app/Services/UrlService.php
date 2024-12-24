<?php

namespace App\Services;

class UrlService
{
    /**
     * Возвращает хост у переданной ссылки
     * 
     * @param string $url
     * @return string
     */
    public function getHost(string $url): string
    {
        $parsedUrl = parse_url($url);
        return $parsedUrl['scheme'] . '://' . $parsedUrl['host'];
    }

    /**
     * Генерирует абсолютный URL на основе имеющегося URL и path
     * @param mixed $url
     * @param mixed $path
     * @return string
     */
    public function getAbsoluteUrl($url, $path): string
    {
        $path = str($path);
        if ($path->startsWith('http')) {
            return $path;
        }

        if (!$path->startsWith('/')) {
            $path = '/' . $path;
        }

        return $this->getHost($url) . $path;
    }
}