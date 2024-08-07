<?php

namespace App\Models;

use Framework\Mailer;

class Mail extends Mailer 
{

    /**
     * Email to request an update to the phone directory
     *
     * @param string $to Recipient's email address
     * @param string $resetLink Password reset link
     * @return bool|string Returns true on success, error message on failure
     */
    public function sendPhoneUpdate($sender, $oldNum, $newNum, $oldName, $newName, $oldSection, $newSection, $oldRankTitle, $newRankTitle, $note) 
    {
        try {
            $from = $sender; // Specific sender's email address
            $fromName = 'Phone'; // Sender's name
            $subject = 'Update Phone Directory';
            $body = "Information to update:<br><br>

                    Requestor: $sender<br><br>
                     Old Information: <br>
                     Name: $oldName <br>
                     Rank/Title: $oldRankTitle <br>
                     Section: $oldSection <br>
                     Extension: $oldNum <br><br>
                    
                     New Information: <br>
                     Name: $newName <br>
                     Rank/Title: $newRankTitle <br>
                     Section: $newSection <br>
                     Extension: $newNum <br><br>

                     Special Note:<br>
                     $note";

            // Set the sender's address
            $this->mail->setFrom($from, $fromName);
            // Add a recipient
            $this->mail->addAddress('jones.deetta@rrjva.org');

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
