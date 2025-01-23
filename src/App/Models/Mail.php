<?php

namespace App\Models;

use Framework\Mailer;

class Mail extends Mailer 
{
    /**
     * Send a basic email.
     *
     * @param string $to Recipient's email address
     * @param string $subject Email subject
     * @param string $body Email body
     * @return bool True if email was sent successfully, false otherwise
     */
    public function sendBasicEmail(string $subject, string $body): bool
    {
        try {
            $this->mail->setFrom($_ENV['SMTP_USER'], 'App Name');
            $this->mail->addAddress('tugglem@rrjva.org');
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            return $this->mail->send();
        } catch (\Exception $e) {
            // Log the error or display it
            echo "Mailer Error: {$this->mail->ErrorInfo}";
            return false;
        }
    }
}
