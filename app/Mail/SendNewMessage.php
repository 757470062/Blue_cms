<?php

namespace App\Mail;

use App\Entities\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $article;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($article)
    {
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $article = $this->article;
        return $this->view('emails.send_new_message', compact('article'));
        //return $this->view('view.name');
    }
}
