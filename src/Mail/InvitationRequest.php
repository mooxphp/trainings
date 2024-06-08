<?php

namespace Moox\Training\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvitationRequest extends Mailable
{
    use Queueable, SerializesModels;

    public int $invitationId;

    public function __construct(int $invitationId)
    {
        $this->invitationId = $invitationId;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invitation Request',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'trainings::emails.invitation-request',
            with: [
                'invitationId' => $this->invitationId,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
