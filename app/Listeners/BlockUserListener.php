<?php

namespace App\Listeners;

use App\Events\BlockUserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlockUserListener
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
     * @param  BlockUserEvent  $event
     * @return void
     */
    public function handle(BlockUserEvent $event)
    {
        $user  = $event->user;
        $user->update(['isActive'=>  $user->isActive = false]);
    }
}
