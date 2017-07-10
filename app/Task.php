<?php

namespace App;

use App\Events\TaskWasPublished;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $events = [
        'created' => TaskWasPublished::class
    ];
}
