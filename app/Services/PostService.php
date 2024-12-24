<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\PostRepository;

class PostService
{
    public function __construct(
        protected PostRepository $postRepository,
        protected UrlService $urlService
    ) {}

    /**
     * Сохраняет массив постов в базу
     * 
     * @param \App\Models\Task $task
     * @param array $posts
     * @param mixed $initialUrl
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function createMany(Task $task, array $posts, $initialUrl)
    {
        return $this->postRepository->createMany($task, collect($posts)->map(
            function($post) use ($initialUrl) {
                $post['descr'] = $post['description'];
                unset($post['description']);
                $post['link'] = $this->urlService->getAbsoluteUrl($initialUrl, $post['link']);
        
                return $post;
            }
        )
        ->toArray());
    }

}