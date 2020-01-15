<?php

namespace App\Listeners;

use App\Events\AcceptUserEvent;
use App\Jobs\AcceptUserMailJob;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptUserListener
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
     * @param  AcceptUserEvent  $event
     * @return void
     */
    public function handle(AcceptUserEvent $event)
    {
        AcceptUserMailJob::dispatch($event->user)->delay(Carbon::now()->addSecond(10));
    }
}
