<?php

namespace App\Classes;

class SendTextMessage
{


    public function message($name, $email, $password, $sms_username, $sms_pass, $phone)
    {
        $phone = '233' . substr($phone, -9);
        $message = 'Hello ' . $name . ',Your kokrokooad admin account has been successfully created. kindly visit the link below and login with the credentials provided' .
            '\n' . 'username : ' . $email . '\n' . ' password : ' . $password . '\n' . ' link : http://admin.kokrokooad.com
       ';

        $sms_url = "https://api.nalosolutions.com/bulksms/?" . "username=" . $sms_username . "&password=" . urlencode($sms_pass) . "&" .
            "type=0&dlr=1&destination=$phone" . "&source=" . urlencode('kokrokoad') . "&message=" . urlencode($message);

        $response = file_get_contents($sms_url);
    }
}
