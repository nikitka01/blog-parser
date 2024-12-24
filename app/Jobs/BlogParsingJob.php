<?php

namespace App\Jobs;

use App\Models\Task;
use App\Repositories\PostRepository;
use App\Services\Crawl\Crawler;
use App\Services\Parse\SearchQueryParser;
use App\Services\PostService;
use App\Services\TaskService;
use App\Services\UrlService;
use DateTime;
use DiDom\Document;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\ThrottlesExceptions;

class BlogParsingJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $initialPageUrl,
        public string $searchQuery,
        public Task $task,
        public int $depth = 10, 
        public int $currentPageIndex = 0
    ) {}

    /**
     * Выполнение парсинга блога
     * 
     * @param \App\Services\Parse\SearchQueryParser $parser
     * @param \App\Services\Crawl\Crawler $crawler
     * @param \App\Services\UrlService $urlService
     * @param \App\Services\PostService $postService
     * @param \App\Services\TaskService $taskService
     * @return void
     */
    public function handle(
        SearchQueryParser $parser, 
        Crawler $crawler,
        UrlService $urlService,
        PostService $postService,
        TaskService $taskService
    ): void 
    {
        $doc = new Document($this->initialPageUrl, true);
        
        $parser->loadDocument($doc)
               ->setSearchQuery($this->searchQuery);

        $crawler->loadDocument($doc)
                ->loadParser($parser);
                
        $result = $crawler->crawlAndParse();
        $next = $result->getNextPage();
        $parsed = $result->getResult();

        if (count($parsed) > 0) {
            $postService->createMany($this->task, $parsed, $this->initialPageUrl);
        }

        $this->currentPageIndex++;
        $taskService->updateTaskProgress($this->task);

        if ($this->currentPageIndex == $this->depth) {
            $taskService->markTaskAsProcessed($this->task);
        }

        //Если не достигли лимита и есть ссылка на следующую страницу, добавляем новое задание для парсинга
        if ($this->currentPageIndex < $this->depth && $next) {
            self::dispatch(
                $urlService->getAbsoluteUrl($this->initialPageUrl, $next),
                $this->searchQuery,
                $this->task,
                $this->depth,
                $this->currentPageIndex
            );
        }
    }

    public function middleware(): array
    {
        return [new ThrottlesExceptions(3, 2 * 60)];
    }

    public function retryUntil(): DateTime
    {
        return now()->addMinutes(10);
    }
}
