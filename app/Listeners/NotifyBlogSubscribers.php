<?php

namespace App\Listeners;

use App\Events\TaskWasPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyBlogSubscribers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskWasPublished  $event
     * @return void
     */
    public function handle(TaskWasPublished $event)
    {
        dd($event->post->toArray());
    }
}
