<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class JobAddedEvent extends Event
{

    public $job;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Job $job)
    {
//      echo "fine";
        $this->job = $job;

    }
}
