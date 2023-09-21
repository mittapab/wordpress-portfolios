<?php

class Emstracking_Widget extends WP_Widget{

    function __construct(){
        
        parent::__construct(
            'ems-id',
            __('Ems Tracking','ems_domain'),
            array('ระบบติดตามเลขพัสดุไปรษณีย์' => __('ems_domain'))
        );
    }

    public function widget($args , $instance){

        if(isset($instance['key_token'])){
           $token_track = getAuthAPI($instance['key_token']);
       }else{
        $token_track = null;
       } 
       
       if(isset( $_GET['track_code'])){

        $track_code = $_GET['track_code'];
        $barcode = ($track_code) ? array($track_code): array();
        $tracking = getTracking( $barcode , $token_track['token']);

        showTrackingWidget($tracking);

       }else{   $track_code = "";  } 
       
       ?>

<div class="custom-widget">
    <form id="custom-form">
        <label for="name">Tracking Number :</label>
        <input type="text" id="name" name="track_code" value="<?php echo esc_html($track_code);  ?>" required>
        <button type="submit">Submit</button>
    </form>
</div>
       
   <?php }

    public function form($instance){

        if(isset($instance['key_token'])){

            $key_token = $instance['key_token'];
        }else{
            $key_token = "apply key token user";
        } ?>
    
        <p>
            <label for="<?php echo $this->get_field_id('key_token'); ?>">Key Token</label>
            <input type="text" id="<?php  echo $this->get_field_id('key_token'); ?>" class="widefat" name="<?php echo $this->get_field_name("key_token"); ?>" value="<?php echo esc_html($key_token); ?>"/>
        </p>


   <?php }

    public function update($new_instance , $old_instance){

        $instance = array();

        $instance['key_token'] = (! empty($new_instance['key_token'])) ? $new_instance['key_token'] : '';

        return  $instance;
    }

   
}