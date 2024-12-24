<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ShowParsePageController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    ) {}

    /**
     * Выводит страницу с формой для парсинга
     * @return \Inertia\Response
     */
    public function __invoke()
    {
        $existingTask = $this->taskService->getPreviousTask(Auth::user());

        return Inertia::render('Parse', [
            'task' => $existingTask,
            'posts' => $existingTask?->posts
        ]);
    }
}
