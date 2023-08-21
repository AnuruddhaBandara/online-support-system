<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailToCustomer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $ticket_no;
    public $customer_name;
    /**
     * Create a new job instance.
     */
    public function __construct($email)
     {
        $this->email = $email;

    }

    /**
     * Execute the job.
     */
    public function handle()
    {
       



    }
}
