<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovedPOMail extends Mailable
{
    use Queueable, SerializesModels;

    public $company;

    public $transaction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Company $company, Transaction $transaction)
    {
        $this->company = $company;

        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.ApprovedPOMail')
            ->subject('Purchase Order Accepted');
    }
}
