<?php

namespace App\Models\Warehouse;

use Framework\Mailer;

class Mail extends Mailer 
{
    /**
     * Send a password reset email.
     *
     * @param string $to Recipient's email address
     * @param string $resetLink Password reset link
     * @return bool|string Returns true on success, error message on failure
     */
    public function sendNewPass($to, $resetLink) {
        try {
            $from = 'rrjweb2@rrjva.org'; // Specific sender's email address
            $fromName = 'Password Reset Service'; // Sender's name
            $subject = 'Password Reset Request';
            $body = "Hello,<br><br>Please click the following link to reset your password:<br><a href=\"$resetLink\">Reset Password</a><br><br>If you did not request a password reset,
                     please notify MIU at extension 6035.";

            // Set the sender's address
            $this->mail->setFrom($from, $fromName);
            // Add a recipient
            $this->mail->addAddress($to);

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = $subject; // Set the subject of the email
            $this->mail->Body = $body; // Set the body of the email

            // Send the email
            $this->mail->send();
            return true; // Return true on success
        } catch (Exception $e) {
            // Return error message on failure
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    /**
     * Send a new request email from the supervisor to the warehouse.
     *
     * @param string $to Recipient's email address
     * @param string $resetLink Password reset link
     * @return bool|string Returns true on success, error message on failure
     */
    public function sendNewRequest() {
        try {
            $from = 'rrjweb2@rrjva.org'; // Specific sender's email address
            $fromName = 'WSR'; // Sender's name
            $subject = 'New Warehouse Supply Request (Do Not Reply)';
            $body = "Hello,<br><br>
                     You have a new supply request.<br><br>
                     New requests can be viewed on your dashboard";

            // Set the sender's address
            $this->mail->setFrom($from, $fromName);
            // Add a recipient
            $this->mail->addAddress('watson.charles@rrjva.org');

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = $subject; // Set the subject of the email
            $this->mail->Body = $body; // Set the body of the email

            // Send the email
            $this->mail->send();
            return true; // Return true on success
        } catch (Exception $e) {
            // Return error message on failure
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
