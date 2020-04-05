<?php

namespace Neoan3\Components;

use Neoan3\Apps\Hcapture;
use Neoan3\Frame\Rbm;
use SendGrid;
use SendGrid\Mail\Mail;

/**
 * Class some
 * @package Neoan3\Components
 */
class Contactus extends Rbm
{
    protected array $credentials = [];

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

    function postContactus (array $emailForm)
    {
        $human = Hcapture::isHuman();
        if($human){
            $this->credentials = getCredentials();
            $emailSettings = $this->credentials['rbm_mail'];
            $emailContent = $emailForm['params']['email'];


            $email = new Mail();
            $email->setFrom($emailContent['clientEmail'], "Example User");
            $email->setSubject("Sending with SendGrid is Fun");
            $email->addTo($emailSettings['Username'], "Roberto Rivera");
            $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
            $email->addContent(
                "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
            );
            $sendgrid = new SendGrid(getenv('SENDGRID_API_KEY'));
            try {
                $response = $sendgrid->send($email);
                print $response->statusCode() . "\n";
                print_r($response->headers());
                print $response->body() . "\n";
            } catch (Exception $e) {
                echo 'Caught exception: '. $e->getMessage() ."\n";
            }
        } else {
            return ['error'=>'it borked'];
        }
    }
}

