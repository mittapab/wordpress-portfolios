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

           $barcode = array(
            "EW296489328TH",
           
        );
        
           $tracking = getTracking( $barcode , $token_track['token']);

       
        }
       
    }

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