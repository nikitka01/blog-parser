<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;

class TaskService
{
    public function __construct(
        protected TaskRepository $taskRepository
    ) {}

    /**
     * Создание и вставка в базу задачи
     * 
     * @param \App\Models\User $user
     * @param mixed $status
     * @param mixed $pageCount
     * @return \App\Models\Task
     */
    public function store(
        User $user,
        ?TaskStatus $status,
        $pageCount = 10,
    ): Task
    {
        return Task::create([
            'user_id' => $user->id,
            'page_count' => $pageCount,
            'status' => $status ?? TaskStatus::PROCESSING
        ]);
    }

    /**
     * Меняет статус задачи на выполненную
     * @param \App\Models\Task $task
     * @return \App\Models\Task
     */
    public function markTaskAsProcessed(Task $task): Task
    {
        return $this->taskRepository->updateStatus($task, TaskStatus::PROCESSED);
    }

    /**
     * Возвращает имеющуюся задачу пользователя
     * 
     * @param \App\Models\User $user
     * @return \App\Models\Task|null
     */
    public function getPreviousTask(User $user): Task|null
    {
        return $this->taskRepository->getTaskByUserId($user->id);
    }

    /**
     * Увеличивает счетчик количества пройденных страниц
     * 
     * @param \App\Models\Task $task
     * @return \App\Models\Task
     */
    public function updateTaskProgress(Task $task): Task
    {
        return $this->taskRepository->incrementProcessedPages($task);
    }

    /**
     * Удаляет задачу
     * 
     * @param \App\Models\Task $task
     * @return void
     */
    public function deleteTask(Task $task)
    {
        $this->taskRepository->delete($task);
    }
}