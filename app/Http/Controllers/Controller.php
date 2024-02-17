<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\RoleType;
use App\Models\RoleGroup;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function checkRole($user_id)
    {
        $role = RoleType::where("user_id", $user_id)->first();
        return $role['user_role']['role_name'];
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


    function generateNumericOTP($n) { 
      
        // Take a generator string which consist of 
        // all numeric digits 
        $generator = "1357902468"; 
      
        // Iterate for n-times and pick a single character 
        // from generator and append it to $result 
          
        // Login for generating a random character from generator 
        //     ---generate a random number 
        //     ---take modulus of same with length of generator (say i) 
        //     ---append the character at place (i) from generator to result 
      
        $result = ""; 
      
        for ($i = 1; $i <= $n; $i++) { 
            $result .= substr($generator, (rand()%(strlen($generator))), 1); 
        } 
      
        // Return result 
        return $result; 
    } 
      
}
