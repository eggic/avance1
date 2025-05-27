<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReciboMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfContent;

    public function __construct($pdfContent)
    {
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        return $this->subject('Tu recibo')
                    ->text('emails.recibo_plain')  // vista muy simple solo texto
                    ->attachData($this->pdfContent, 'recibo.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
