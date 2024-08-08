<?php

namespace App\Models\Warehouse;

use Framework\Mailer;

class Mail extends Mailer 
{
    /**
     * Send a temporary password for a newly created user.
     *
     * @param string $to Recipient's email address
     * @param string $registerLink create a password
     * @return bool|string Returns true on success, error message on failure
     */
    public function registerEmail($to, $registerLink) 
    {
        try {
            $from = 'rrjweb2@rrjva.org'; // Specific sender's email address
            $fromName = 'WSR Account Activation'; // Sender's name
            $subject = 'Account Activation';
            $body = "Hello,<br><br>Please click the following link to finish registering for your <strong>Warehouse Supply Request</strong> account:<br>
                     <a href=\"$registerLink\">Register</a>";

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
     * Send a password reset email.
     *
     * @param string $to Recipient's email address
     * @param string $resetLink Password reset link
     * @return bool|string Returns true on success, error message on failure
     */
    public function sendNewPass($to, $resetLink) 
    {
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
    public function sendNewRequestToWarehouse() 
    {
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
            $this->mail->addAddress('parham.sharon@rrjva.org');

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
     * Send a new request email from the user to the selected supervisor.
     *
     * @param string $to Recipient's email address
     * @param string $resetLink Password reset link
     * @return bool|string Returns true on success, error message on failure
     */
    public function sendNewRequestToSupervisor($to) 
    {
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
     * Email that request was denied for a certain reason.
     *
     * @param string $to Recipient's email address
     * @param string $resetLink Password reset link
     * @return bool|string Returns true on success, error message on failure
     */
    public function sendApproved($requestorEmail) 
    {
        try {
            $from = 'rrjweb2@rrjva.org'; // Specific sender's email address
            $fromName = 'WSR'; // Sender's name
            $subject = 'Warehouse Request Approved (Do Not Reply)';
            $body = "Hello,<br><br>
                     Your recent request to the warehouse for supplies was approved.<br><br>
                     The warehouse staff will deliver your items soon";

            // Set the sender's address
            $this->mail->setFrom($from, $fromName);
            // Add a recipient
            $this->mail->addAddress($requestorEmail);

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
     * Email that request was denied for a certain reason.
     *
     * @param string $to Recipient's email address
     * @param string $resetLink Password reset link
     * @return bool|string Returns true on success, error message on failure
     */
    public function sendDenied($requestorEmail, $reason) 
    {
        try {
            $from = 'rrjweb2@rrjva.org'; // Specific sender's email address
            $fromName = 'WSR'; // Sender's name
            $subject = 'Warehouse Request Denied (Do Not Reply)';
            $body = "Hello,<br><br>
                     Your recent request to the warehouse for supplies was denied.<br><br>
                     Reason the request was denied:<br><br>
                     $reason";

            // Set the sender's address
            $this->mail->setFrom($from, $fromName);
            // Add a recipient
            $this->mail->addAddress($requestorEmail);

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
     * Email that request was edited for a certain reason.
     *
     * @param string $to Recipient's email address
     * @param string $resetLink Password reset link
     * @return bool|string Returns true on success, error message on failure
     */
    public function sendEdited($requestorEmail, $reason) 
    {
        try {
            $from = 'rrjweb2@rrjva.org'; // Specific sender's email address
            $fromName = 'WSR'; // Sender's name
            $subject = 'Warehouse Request Edited (Do Not Reply)';
            $body = "Hello,<br><br>
                     Your recent request to the warehouse for supplies was edited by the warehouse manager.<br><br>
                     Reason the request was edited:<br><br>
                     $reason";

            // Set the sender's address
            $this->mail->setFrom($from, $fromName);
            // Add a recipient
            $this->mail->addAddress($requestorEmail);

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
