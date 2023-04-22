<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class CantactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $body_message;

    /**
     * Create a new message instance.
     */

     
    public function __construct($name,$email,$subject,$body_message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->body_message = $body_message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.contact.mail',

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
