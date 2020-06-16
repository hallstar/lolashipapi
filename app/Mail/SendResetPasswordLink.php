<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendResetPasswordLink extends Mailable
{
    use Queueable, SerializesModels;

    public $account;
    public $reset;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($account, $reset)
    {
        //
        $this->account = $account;
        $this->reset = $reset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset password')
            ->view('mail.reset_password');
    }
}
