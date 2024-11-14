<?php

namespace App\Mail;

use App\Models\Review;
use App\Models\User;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BadReview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $reviewer;
    public $review;
    
    public function __construct(User $reviewer, Review $review)
    {
        $this->reviewer = $reviewer;
        $this->review = $review;    
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('crm@example.com', 'John Doe'),
            subject: 'Bad Review',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.reviews.bad_review',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
