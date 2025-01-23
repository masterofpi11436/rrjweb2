<?php

namespace Framework;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

class Mailer
{
    protected $mail;

    public function __construct()
    {
        // Create a new PHPMailer instance
        $this->mail = new PHPMailer(true);

        // Set SMTP server settings
        $this->mail->isSMTP();
        $this->mail->Host = $_ENV['SMTP_HOST'];
        $this->mail->Port = (int)$_ENV['SMTP_PORT'];
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->SMTPAuth = true;

        // Set up OAuth2 authentication
        $this->mail->AuthType = 'XOAUTH2';
        $provider = new Google([
            'clientId'     => $_ENV['OAUTH_CLIENT_ID'],
            'clientSecret' => $_ENV['OAUTH_CLIENT_SECRET'],
        ]);

        $this->mail->setOAuth(new OAuth([
            'provider'       => $provider,
            'clientId'       => $_ENV['OAUTH_CLIENT_ID'],
            'clientSecret'   => $_ENV['OAUTH_CLIENT_SECRET'],
            'refreshToken'   => $_ENV['OAUTH_REFRESH_TOKEN'],
            'userName'       => $_ENV['SMTP_USER'],
        ]));

        $this->mail->CharSet = 'UTF-8';
    }
}