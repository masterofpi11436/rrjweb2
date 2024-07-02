<?php

namespace Framework;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer 
{
    protected $mail;

    /**
     * Mailer constructor.
     * Initializes the PHPMailer object with SMTP settings.
     */
    public function __construct(PHPMailer $mail) {
        // Create a new PHPMailer instance
        $this->mail = $mail;

        // Server settings
        $this->mail->SMTPDebug = 0; // Disable debug output, use 2 for detailed output
        $this->mail->isSMTP(); // Set mailer to use SMTP
        $this->mail->Host = $_ENV['SMTP_HOST']; // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true; // Enable SMTP authentication
        $this->mail->Username = $_ENV['SMTP_USER']; // SMTP username from environment variables
        $this->mail->Password = $_ENV['SMTP_PASSWORD']; // SMTP password from environment variables
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $this->mail->Port = $_ENV['SMTP_PORT']; // TCP port to connect to
        $this->mail->CharSet = 'UTF-8'; // Set the character set to UTF-8
    }

    /**
     * Send a password reset email.
     *
     * @param string $to Recipient's email address
     * @param string $resetLink Password reset link
     * @return bool|string Returns true on success, error message on failure
     */
    public function sendNewPass($to, $resetLink) {
        try {
            $from = 'mark.tuggle01@gmail.com'; // Specific sender's email address
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
}
