<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostRepository
{
    /**
     * Сохраняет массив постов в базу с установкой отношения к задаче
     * 
     * @param \App\Models\Task $task
     * @param array $posts
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function createMany(Task $task, array $posts)
    {
        return $task->posts()->createMany($posts);
    }
}