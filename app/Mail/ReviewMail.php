<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $review;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($review)
    {
        $this->review = $review;
        $this->url = env('APP_URL') . '/review/on/' . $review->id . '/' . $review->code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.review')
            ->subject('Новый отзыв!');
    }
}
