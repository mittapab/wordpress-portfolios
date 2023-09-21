<?php


function create_shortcode_ems_track(){ 
 
    $token = get_option( 'widget_ems-id' ); 
    $tokenAuth = "";
    foreach($token['2'] as $key){  $tokenAuth = $key;}
    $token_track_number = getAuthAPI($tokenAuth);
  
    if(isset( $_GET['track_code'])){
  
      $track_code = $_GET['track_code'];
      $barcode = ($track_code) ? array($track_code): array();
      $tracking = getTracking( $barcode ,$token_track_number['token']);
   
      showTrackingWidget($tracking);
  
      }else{   $track_code = "";  } 
      ob_start();
      ?>
  
      <div class="custom-widget">
      <form id="custom-form">
      <label for="name">Tracking Number :</label>
      <input type="text" id="name" name="track_code" value="<?php echo esc_html($track_code);  ?>" required>
      <button type="submit">Submit</button>
      </form>
      </div>
  
  <?php echo ob_get_clean(); }
  
  
  
  add_shortcode('ems_track', 'create_shortcode_ems_track');