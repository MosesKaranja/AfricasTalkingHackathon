<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

class MessageController extends Controller
{
    public function send($phone, $message)
    {

        $username = 'HealthSmsApp';
        // use 'sandbox' for development in the test environment
        $apiKey = '71741ed76a893f6f061c0c41638ba251d71f80aa8079b1d0734b4772d94d6766';
        // use your sandbox app API key for development in the test environment
        $AT = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      => $phone,
            'message' => $message
        ]);
    }
}
