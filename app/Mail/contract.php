<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contract extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailData $emaildata)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
                

                return $this->view('emails.email');
                
        
    }
}
