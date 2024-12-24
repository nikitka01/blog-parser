<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\ParseRequest;
use App\Jobs\BlogParsingJob;
use App\Services\TaskService;
use App\Services\TaskStatus;
use Illuminate\Support\Facades\Auth;

class HandleParseRequestController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    ) {}
    /**
     * Принимает запрос на парсинг блока на основе строки
     * 
     * @param \App\Http\Requests\ParseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(ParseRequest $request)
    {
        //Проверка имеющейся задачи. Если задача есть и она активна, то отправляем запрос обратно.
        //Если задача завершена, то удаляем ее.
        //TODO: Вынести логику в сервис
        $previousTask = $this->taskService->getPreviousTask(Auth::user());
        if ($previousTask) {
            if ($previousTask->isActive()) {
                return to_route('parse.show')->with([
                    'status' => 'fail',
                    'message' => 'Нельзя запустить парсинг, пока активна имеющаяся задача.'
                ]);
            } else {
                $this->taskService->deleteTask($previousTask);
            }
        }
        

        $task = $this->taskService->store(Auth::user(), TaskStatus::PROCESSING);

        BlogParsingJob::dispatch(
            'https://is-systems.org/blog',
            $request->validated('query'),
            $task, 
            10,
            0
        );

        return to_route('parse.show');
    }
}
