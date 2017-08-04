<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;


class SendNewMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $article,$user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($article, $user)
    {
        $this->article = $article;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->user as $item => $value){
            Mail::to($value->email)->send(new \App\Mail\SendNewMessage($this->article));
        }

    }
}
