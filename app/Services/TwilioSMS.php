<?php
namespace App\Services;
use Twilio\Rest\Client;


/**
 * Class TwilioSMS
 * @package App\Services
 */
class TwilioSMS
{
    /**
     * @var string
     */
    protected $sid;
    /**
     * @var string
     */
    protected $token;
    /**
     * @var Twilio\Rest\Client
     */
    protected $sms;
    /**
     * @var string
     */
    protected $from;

    /**
     * TwilioSMS constructor.
     */
    public function __construct()
    {
        // live
        // $this->sid = "AC39c3d5de5e09f8e166e4b832da1a2e54";
        // $this->token  = "0d2d8d75e53bfaa991db475c611e0f98";
        // $this->from  = "13182995510";

        // testing
        $this->sid = "AC2950e9688e9c8bab4e83148d89fadc58";
        $this->token  = "d2baad886e7379d7fb1a08f47f52e5fa";
        $this->from  = "+14402205128";

        $this->sms = new Client($this->sid, $this->token);
    }

    /**
     * @param $to
     * @param $message
     * @return mixed
     */
    public function send($to, $message){
        /*SMSFIX*/
        $response = $this->sms->messages->create(
            $to,
            [
                "messagingServiceSid" => "MG72e72ad4682c1b70544ad99f30e21205",    
                'body' => $message
            ]
        );
        return $response;
    }
}