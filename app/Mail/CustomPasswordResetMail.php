<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomPasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.custom_password_reset') // Certifique-se de que o nome da view está correto
            ->with([
                'token' => $this->token,
                'email' => $this->email,
            ])
            ->subject('Redefinição de Senha');
    }
}
