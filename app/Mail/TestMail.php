<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=['name'=>'رضا حسینی'];
        return $this->view('emails.testMail',$data)
            ->to('sirreza.hhh@gmail.com','فلانی')
            ->subject('newest')
            ->with(['date'=>'بماند به یادگار'])
            ->replyTo(env('MAIL_USERNAME'),'اقا سید')
            ->attach(storage_path('app\6.jpg'))
            ->attach(storage_path('app\72.jpg'),[
                'as'=>'foo.jpg',
                'mime'=>'text/txt'
            ])
            ;
    }
}
