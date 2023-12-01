<?php

namespace App\Models\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Queued extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    public $subject;


    public function __construct($data,$subject)
    {
        $this->data = $data;
        $this->subject = $subject;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // support@jmibrokers.com
        return $this->from(['support@jmibrokers.com','JMIBrokers'])->subject($this->subject)->view('mails.queued')->with(['data', $this->data]);
    }
}
