<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewAdminAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $account;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($account, $password)
    {
        //
        $this->account = $account;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New admin account')
            ->view('mail.new_admin_account');
    }
}
