<?php

function ems_scripts(){
  wp_enqueue_style('ems_style' , plugins_url().'/pg-ems-tracking/assets/style.css' , array() , '1.0');
  wp_enqueue_style('gg_style' , "//fonts.googleapis.com/css2?family=Kanit&display=swap" , array() , '1.0');
 
  wp_enqueue_style('bootstrap-gold' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css',array(), '1.0');
  wp_enqueue_script('bootstrap-script' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' , array() , '1.0.0' , true);
  wp_enqueue_script('ems_script' , plugins_url().'/pg-ems-tracking/assets/main.js' , array('jquery') , '1.0' , true);
}

add_action('wp_enqueue_scripts' , 'ems_scripts');



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

  return $response;
     
}

function showTrackingWidget($tracking){

  $img_track = array();
        
  if(!is_null($tracking) && array_key_exists('response',$tracking)){
      $tr = $tracking['response'];
      if(!is_null($tr) && array_key_exists('items',$tr)){
          foreach($tr['items'] as $barcode=>$datas){
              echo "<hr>";
              echo "<br><p style='text-align:center;'> Tracking Number: ".$barcode."</p><br>"; // รหัสพัสดุ
             ?>

             <table class="table" id="ems-tracking">
               <thead>
                 <tr>
                   <th class="th-ems-table">วันที่รับฝาก</th>
                   <th class="th-ems-table">จังหวัด</th>
                   <th class="th-ems-table" colspan="2" style="text-align:center!important;">สถานะ</th>
                   <th class="th-ems-table"></th>
                 </tr>
               </thead>
               <tbody>

             <?php 
              if(is_array($datas)){ ?>

               <?php   foreach($tr['items'][$barcode] as $data){ 
                      if($data['status'] == '103'){ 
                        
                        $img_track['step_1'] = '/pg-ems-tracking/assets/img/emsimg-1.png';
                        echo "<tr>";
                        echo "<td>".$data['status_date']."</td>";
                        echo "<td>".$data['location']."</td>";
                        echo "<td>".$data['status_description']."</td>";
                        echo "<td><img src='".plugins_url().$img_track['step_1']."' width='40' height='40'></td>";
                        echo "</tr>";
                     
                    }
                       if($data['status'] == '201'){ 

                      $img_track['step_2'] = '/pg-ems-tracking/assets/img/emsimg-2.png';
                      echo "<tr>";
                      echo "<td>".$data['status_date']."</td>";
                      echo "<td>".$data['location']."</td>";
                      echo "<td>".$data['status_description']."</td>";
                      echo "<td><img src='".plugins_url().$img_track['step_2']."' width='40' height='40'></td>";
                      echo "</tr>";
                    
                    }

                    if($data['status'] == '206'){ 
                      $img_track['step_3'] = '/pg-ems-tracking/assets/img/emsimg-2.png';
                      echo "<tr>";
                      echo "<td>".$data['status_date']."</td>";
                      echo "<td>".$data['location']."</td>";
                      echo "<td>".$data['status_description']."</td>";
                      echo "<td><img src='".plugins_url().$img_track['step_3']."' width='40' height='40'></td>";
                      echo "</tr>";
                
                }

                if($data['status'] == '301'){ 
                  $img_track['step_4'] = '/pg-ems-tracking/assets/img/emsimg-3.png';
                  echo "<tr>";
                  echo "<td>".$data['status_date']."</td>";
                  echo "<td>".$data['location']."</td>";
                  echo "<td>".$data['status_description']."</td>";
                  echo "<td><img src='".plugins_url().$img_track['step_4']."' width='40' height='40'></td>";
                  echo "</tr>";
        
          }

                if($data['status'] == '501'){ 
                      $img_track['step_4'] = '/pg-ems-tracking/assets/img/emsimg-4.png';
                      echo "<tr>";
                      echo "<td>".$data['status_date']."</td>";
                      echo "<td>".$data['location']."</td>";
                      echo "<td>".$data['status_description']."</td>";
                      echo "<td><img src='".plugins_url().$img_track['step_4']."' width='40' height='40'></td>";
                      echo "</tr>";
            
              }
           } 

        }
             
      } ?>

      </tbody>
    </table>



     <?php } 
    }

}












