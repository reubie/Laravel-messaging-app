<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(Request $request){
        $message = $request->input('message');
        $mobile = $request->input('mobile');
        $encodeMessage = urlencode($message);
        $authkey = '';
        $senderId = '';
        $route = 4;
        $postData = $request->all();
        
        $mobileNumber = implode('', $postData['mobile']);
        $arr = str_split($mobileNumber, '12');
        $mobiles = implode(",", $arr);
        $data = array(
            'authkey' => $authkey,
            'mobiles' => $mobiles,
            'message' => $encodeMessage,
            'sender' => $senderId,
            'route' => $route,
        );
        $url = "https://api.mojasms.dev/api/v1/sendsms";
        $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query($postData),
            ));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $output = curl_exec($ch);

            if(curl_errno($ch)){
                echo 'error:' . curl_error($ch);
            }
            curl_close($ch);
            return redirect('/')->with('response', 'Message Sent Successfully');
        
    }
}
