<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $mailDate;

    public function __construct($message)
    {
        $this->mailDate = $message;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Hello world',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email',
            with: ['my_message' => $this->mailDate],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromPath('https://www.google.com/imgres?imgurl=https%3A%2F%2Fgratisography.com%2Fwp-content%2Fuploads%2F2023%2F01%2Fgratisography-dino-skateboard-free-stock-photo-800x525.jpg&tbnid=gUGISpMjVcTO7M&vet=12ahUKEwjbhvyaiOb-AhXmtlYBHewpD5EQMyg3egQIARBM..i&imgrefurl=https%3A%2F%2Fgratisography.com%2Fphotos%2Fanimals%2F&docid=y3-AwHUIgYK-NM&w=800&h=525&q=photo&ved=2ahUKEwjbhvyaiOb-AhXmtlYBHewpD5EQMyg3egQIARBM'),
        ];
    }
}
