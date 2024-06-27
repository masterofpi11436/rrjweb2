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
     * Send an email.
     *
     * @param string $to Recipient's email address
     * @param string $subject Subject of the email
     * @param string $body Body of the email (can be HTML)
     * @param string|null $from Optional: Sender's email address, defaults to SMTP_USER
     * @param string|null $fromName Optional: Sender's name, defaults to 'Mailer'
     * @return bool|string Returns true on success, error message on failure
     */
    public function send($to, $subject, $body, $from = null, $fromName = null) {
        try {
            // Set the sender's email address and name
            $from = $from ?? $_ENV['SMTP_USER']; // Default to SMTP_USER if $from is not provided
            $fromName = $fromName ?? 'Mailer'; // Default to 'Mailer' if $fromName is not provided

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
