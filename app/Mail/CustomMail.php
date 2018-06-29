<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $studio;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $studio)
    {
        $this->user = $user;
        $this->studio = $studio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.mailbody')->subject('Invito di partecipazione allo studio "' . $this->studio->goal . '"');
    }
}
