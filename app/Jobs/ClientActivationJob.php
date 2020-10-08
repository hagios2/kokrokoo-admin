<?php

namespace App\Jobs;

use App\Mail\ClientActivationMail;
use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class ClientActivationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $client;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->client->company)
        {
            Mail::to($this->client->company->email)->queue(new ClientActivationMail($this->client));
        }else{

            Mail::to($this->client)->queue(new ClientActivationMail($this->client));
        }


    }
}
