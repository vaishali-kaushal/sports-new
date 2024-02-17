<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class TestController extends Controller
{
    public function index()
    {

        $temp_id = "1407170557670346761";
        $mobile = "7973160429";
        // $message = "Dear User,  is OTP1111111 for Login, Nursery Management System, Sports Department Government of Haryana";
        $message = "Dear User, 11111 is OTP for User Registration, Nursery Management System, Sports Department Government of Haryana";
        var_dump($this->sendSMS( $mobile, $message,$temp_id,));
      
        // $testMailData = [
        //     'title' => 'Test Email From sports',
        //     'body' => 'This is the body of test email.'
        // ];

        // Mail::to('mohitk2730@gmail.com')->send(new SendMail($testMailData));

        // dd('Success! Email has been sent successfully.');
    }

    function sendSMS($mobile,$message,$temp_id)
    {   
        $username = 'haryanait-sport';
        $password = 'sports@1234';
        $senderid = 'GOVHRY';       
        $dept_key = 'dca7fc77-9e28-4765-bbaa-07bd43197b2e';
        $temp_id  = $temp_id;       
        $dcmobile = $mobile;        
        
        $encryp_password=sha1(trim($password)); 
        
        return $asd = $this->sendSingleSMS($username,$encryp_password,$senderid,$message,$dcmobile,$dept_key,$temp_id);            
    }

    function sendSingleSMS($username,$encryp_password,$senderid,$message,$mobileno,$deptSecureKey,$temp_id)
    {   
        $key=hash('sha512',trim($username).trim($senderid).trim($message).trim($deptSecureKey));
        // $key=hash('sha512',trim($username).trim($senderid).trim($message));

        $data = array(
             "username"     => trim($username),
             "password"     => trim($encryp_password),
             "senderid"     => trim($senderid),
             "content"      => trim($message),
             "smsservicetype"=>"otpmsg",
             "mobileno"     =>trim($mobileno),
             "key"          => trim($key),
             "templateid"   => trim($temp_id)    
        );
        $a = $this->postToUrl("https://msdgweb.mgov.gov.in/esms/sendsmsrequestDLT", $data); 
        return $a;
    }   
         
    function postToUrl($url, $data) 
    {
        $fields = '';
        
        foreach($data as $key => $value) {
            $fields .= $key . '=' . $value . '&';
        }

        rtrim($fields, '&');
        $post = curl_init();
        curl_setopt($post, CURLOPT_SSLVERSION, 6);
        curl_setopt($post, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($post, CURLOPT_URL, $url);
        curl_setopt($post, CURLOPT_POST, count($data));
        curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($post);
        curl_close($post);
       
        return $result; 
    }
}