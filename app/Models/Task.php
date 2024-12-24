<?php

namespace App\Models;

use App\Services\TaskStatus;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'page_count',
        'processed_pages',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'task_id');
    }

    /**
     * Метод проверяет, активна ли данная задача
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status === TaskStatus::PROCESSING;
    }
}
