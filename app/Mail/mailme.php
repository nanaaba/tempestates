<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailme extends Mailable {

    use Queueable,
        SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $event;

    public function __construct($event) {
        $this->event = $event;
        return;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        
        
        return $this->from('hello@rotamac.com', 'Rotamac')
                        ->subject($this->event['subject'])
                        ->view('emails.mailme') > with(['message' => $this->event['message']]);
    }

}
