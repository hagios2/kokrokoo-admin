<?php

namespace App\Listeners;

use App\Events\UnblockUserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnblockUserListener
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
     * @param  UnblockUserEvent  $event
     * @return void
     */
    public function handle(UnblockUserEvent $event)
    {
        $user  = $event->user;
        $user->update(['isActive'=>  $user->isActive = true]);
    }
}
