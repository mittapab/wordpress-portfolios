<?php

class LineNotify{

private $message = "";
private $token = "";

public function __construct($message){

    $this->message = sanitize_text_field($message);
    $this->token  = sanitize_text_field(get_option('custom_text_file_upload', '')); 
}
private function isValidMessage($message) {
    return !empty($message);
}

private function isValidToken($token) {
    return !empty($token);
}

public function sendLineApi(){

    if($this->isValidMessage($this->message) && $this->isValidToken($this->token) ){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Live version is true
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['message' => $this->message]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $this->token,
        ]);
    
        $result = curl_exec($ch);
    
        if (curl_errno($ch)) {
            error_log('cURL Error: ' . curl_error($ch));
        } else {
            // Optionally log the result from the API response
            error_log('Line Notify API Response: ' . $result);
        }
        
        curl_close($ch);
    
      
    }else{
        error_log("Send message Error !!! ");
    }

   
}
    
}