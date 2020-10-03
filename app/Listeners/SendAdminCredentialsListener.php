<?php

namespace App\Listeners;

use App\Events\SendAdminCredentialsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAdminCredentialsListener
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
     * @param  SendAdminCredentialsEvent  $event
     * @return void
     */
    public function handle(SendAdminCredentialsEvent $event)
    {
        //
    }
}
