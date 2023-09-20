<?php

function getAuthAPI($token){


    $url_token = "https://trackapi.thailandpost.co.th/post/api/v1/authenticate/token";
    $request = array();
    $headers = array(
        'Authorization: Token '.$token,
        'Content-Type: application/json'
    );

    $ssl = NULL;
    $_SSL_VERIFYHOST = (isset($ssl))?2:0;
    $_SSL_VERIFYPEER = (isset($ssl))?1:0;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL , $url_token);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($request));
    curl_setopt($curl ,CURLOPT_HTTPHEADER ,  $headers);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($curl);
    curl_close($curl);
    
    $response =  json_decode($response , TRUE); 

    if(!is_null($response) && array_key_exists('token',$response)){
      
        return $response;
    }else{
        return NULL;    
    }       

   
    return $response;

}

function getTracking($barcode ,$token , $lang = "TH",$ststus = "all"){
  $url_get_tracking = "https://trackapi.thailandpost.co.th/post/api/v1/track";
  //$request = array();

$data = array(
    "status"=>$ststus,
    "language"=>$lang,
    "barcode"=>$barcode
);
  $headers = array(
    'Authorization: Token '.$token,
    'Content-Type: application/json'
  );

  $ssl = NULL;
  $_SSL_VERIFYHOST = (isset($ssl))?2:0;
  $_SSL_VERIFYPEER = (isset($ssl))?1:0;

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL , $url_get_tracking);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($curl ,CURLOPT_HTTPHEADER ,  $headers);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  $response = curl_exec($curl);
  curl_close($curl);
  
  $response =  json_decode($response , TRUE); 


     print_r($response['response']['track_count']);
     return $response;
     
}




