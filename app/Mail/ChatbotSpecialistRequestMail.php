<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChatbotSpecialistRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        $name = $this->data['name'] ?? 'Sin nombre';
        $email = $this->data['email'] ?? 'bshgroupcrm@gmail.com';

        return new Envelope(
            subject: 'Solicitud de ayuda - Chatbot montacargas - ' . $name,
            replyTo: [
                new Address($email, $name),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.chatbot-specialist-request',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}