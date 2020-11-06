<?php

namespace App\Services;

class SendTextMessage
{

    private $sms_username;
    private $sms_pass;
    private $ampm;

    public function __construct($sms_username, $sms_pass)
    {
        $this->sms_username = $sms_username;
        $this->sms_pass = $sms_pass;
    }

    public function paymentMessage($name, $amount, $ref, $sms_username, $sms_pass, $phone)
    {
        $phone = '233' . substr($phone, -9);
        $message = 'Hello ' . $name . ',\n' . 'Your kokrokooad subscription payment was  successfully processed. kindly  see transaction details below.' .
            '\n' . 'amount: GHS' . $amount . '\n' . ' Ref # : ' . $ref . '\n' . 'Thanks for choosing kokrokooad.com
       ';

        $sms_url = "https://api.nalosolutions.com/bulksms/?" . "username=" . $sms_username . "&password=" . urlencode($sms_pass) . "&" .
            "type=0&dlr=1&destination=$phone" . "&source=" . urlencode('kokrokoad') . "&message=" . urlencode($message);

        $response = file_get_contents($sms_url);
    }

    public function sendSubConfirmationText($name, $phone, $sms_username, $sms_pass, $message)
    {
        $phone = '233' . substr($phone, -9);



        $sms_url = "https://api.nalosolutions.com/bulksms/?" . "username=" . $sms_username . "&password=" . urlencode($sms_pass) . "&" .
            "type=0&dlr=1&destination=$phone" . "&source=" . urlencode('kokrokoad') . "&message=" . urlencode($message);

        $response = file_get_contents($sms_url);

        return $response;
    }

//    public function registrationSuccessText($name, $phone)
//    {
//        $message = "Hello $name,thank you for choosing Kokrokoo! Your registration details are under review. Thank you".config('app.name');
//        $phone = '233' . substr($phone, -9);
//
//        $sms_url = "https://api.nalosolutions.com/bulksms/?" . "username=" . $this->sms_username . "&password=" . urlencode($this->sms_pass) . "&" .
//            "type=0&dlr=1&destination=$phone" . "&source=" . urlencode('kokrokoad') . "&message=" . urlencode($message);
//
//        $response = file_get_contents($sms_url);
//
//        return $response;
//    }

    public function sendSms($name, $phone, $message)
    {
        $phone = '233' . substr($phone, -9);

        $sms_url = "https://api.nalosolutions.com/bulksms/?" . "username=" . $this->sms_username . "&password=" . urlencode($this->sms_pass) . "&" .
            "type=0&dlr=1&destination=$phone" . "&source=" . urlencode('kokrokooad') . "&message=" . urlencode($message);

        $response = file_get_contents($sms_url);
    }

//    public function registrationOrganizationText($name, $phone)
//    {
//        $message = "Hello $name,Congratulations and welcome to Kokrokooad.Your registration details have been received and will be reviewed for  approval.Thank you for signing up with ".config('app.name');
//        $phone = '233' . substr($phone, -9);
//
//        $sms_url = "https://api.nalosolutions.com/bulksms/?" . "username=" . $this->sms_username . "&password=" . urlencode($this->sms_pass) . "&" .
//            "type=0&dlr=1&destination=$phone" . "&source=" . urlencode('kokrokoad') . "&message=" . urlencode($message);
//
//        $response = file_get_contents($sms_url);
//
//        return $response;
//    }

    public function checkTime($time){
        if(substr($time,10,11) >= 12){
            $this->ampm = 'PM';
        }
        else{
            $this->ampm = "AM";
        }
    }

    public function subCreationSuccessText($name, $phone,$sub_title,$sub_start_date)
    {
       $this->checkTime($sub_start_date);

        $message = "Hello $name,Congratulations and welcome to Kokrokooad.Your subscription ($sub_title) going live on $sub_start_date"."$this->ampm is successfully created.Subscription will be reviewed for  approval.Thank you for signing up with ".config('app.name');
        $phone = '233' . substr($phone, -9);

        $sms_url = "https://api.nalosolutions.com/bulksms/?" . "username=" . $this->sms_username . "&password=" . urlencode($this->sms_pass) . "&" .
            "type=0&dlr=1&destination=$phone" . "&source=" . urlencode('kokrokoad') . "&message=" . urlencode($message);

        $response = file_get_contents($sms_url);
        return $response;
    }

}