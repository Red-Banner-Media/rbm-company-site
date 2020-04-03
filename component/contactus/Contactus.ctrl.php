<?php

namespace Neoan3\Components;

use Neoan3\Frame\Rbm;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


/**
 * Class some
 * @package Neoan3\Components
 */
class Contactus extends Rbm
{
    private array $credentials = [];

    /**
     * @var array of dependencies as strings
     * NOTE: only global params can be passed in
     */
    private static array $requiredComponents = [];

    /**
     * This function is called by the RBM frame
     *
     * @return array
     */
    static function dependencies()
    {
        return self::$requiredComponents;
    }

    function postContactus ($email)
    {
        $this->credentials = getCredentials();
        $mail = new PHPMailer(true);
        $emailContents = $email['params']['email'];
        try {
            //Server Settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();

            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->SMTPAuth = true;

            // TODO: Update the below

            $mail->Username = $this->credentials['rbm_mail']['Username'];
            $mail->Password = $this->credentials['rbm_mail']['Password'];
            $mail->setFrom($emailContents['clientEmail']);
            $mail->addReplyTo($this->credentials['rbm_mail']['Username'], 'Roberto Rivera');
            $mail->addAddress('whoto@example.com', 'John Doe');
            $mail->Subject = $emailContents['subject'];
            //TODO: create email html
            $mail->Body = $emailContents['body'];

            $mail->send();
        } catch (\Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

