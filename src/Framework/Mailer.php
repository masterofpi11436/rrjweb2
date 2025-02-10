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
}