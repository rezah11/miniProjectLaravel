<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendToUsers extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        //
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        dd($this->user);
        return $this->view('emails.sendToUsers')
            ->subject('این برای سیدرضا حسینی است')
            ->with([
                'user'=>$this->user
            ])
            ;
    }
}
