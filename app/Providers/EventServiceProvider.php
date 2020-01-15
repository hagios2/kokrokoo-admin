<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\AcceptUserEvent' => [
            'App\Listeners\AcceptUserListener',
        ],
        'App\Events\BlockUserEvent' => [
            'App\Listeners\BlockUserListener',
        ],
        'App\Events\UnblockUserEvent' => [
            'App\Listeners\UnblockUserListener',
        ],
        'App\Events\SendAdminCredentialsEvent' => [
            'App\Listeners\SendAdminCredentialsListener',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
