<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use App\Services\TaskStatus;

class TaskRepository
{
    /**
     * Создает и сохраняет задачу в базу
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
     * Обновляет статус задачи
     * 
     * @param \App\Models\Task $task
     * @param \App\Services\TaskStatus $taskStatus
     * @return \App\Models\Task
     */
    public function updateStatus(Task $task, TaskStatus $taskStatus): Task
    {
        $task->status = $taskStatus;
        $task->save();

        return $task;
    }

    /**
     * Инкрементирует счетчик количества пройденных страниц
     * 
     * @param \App\Models\Task $task
     * @return \App\Models\Task
     */
    public function incrementProcessedPages(Task $task): Task
    {
        $task->increment('processed_pages');
        return $task;
    }

    /**
     * Возвращает первую задачу по ID пользователя
     * @param mixed $id
     * @return \App\Models\Task|null
     */
    public function getTaskByUserId($id): Task|null
    {
        return Task::where('user_id', $id)->first();
    }

    /**
     * Удаляет задачу
     * 
     * @param \App\Models\Task $task
     * @return void
     */
    public function delete(Task $task)
    {
        $task->delete();
    }
}