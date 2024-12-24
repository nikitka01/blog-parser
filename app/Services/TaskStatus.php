<?php

namespace App\Services;

enum TaskStatus: string
{
    case PROCESSING = 'processing';
    case PROCESSED = 'processed';
}