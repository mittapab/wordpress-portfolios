<?php

class Referral_widget extends WP_Widget{
    
    function __construct(){
        parent::__construct(
            'btwint-referral-id',
            __('Btwin referral button','btwint_168_r'),
            array('Btwin referral button' => __('btwint_168_r'))
        );
    }

    public function widget($args , $instance){ 

        $btwin_ref_login = "";
        $btwin_ref_regis ="";
      

        if(isset($instance['btwin_ref_login'])){

            $btwin_ref_login = $instance['btwin_ref_login'];
        }
        
        if(isset($instance['btwin_ref_regis'])){

            $btwin_ref_regis = $instance['btwin_ref_regis'];
         }
        
    ?>  <div class="loginregishead">
          <a href="<?php  echo esc_url($btwin_ref_login); ?>" class="btn button-content-01"> 
           <div class="button-dark"><?php echo esc_html('เข้าสู่ระบบ');?></div>
          </a>
          <a href="<?php  echo esc_url($btwin_ref_regis); ?>" class="btn button-content-01">
            <div class="button-purple"><?php echo esc_html('สมัครสมาชิก');?></div>
          </a>
        </div>
    <?php }

    public function form($instance){
           
        $btwin_ref_login = "";
        $btwin_ref_regis ="";

        if(isset($instance['btwin_ref_login'])){

            $btwin_ref_login = $instance['btwin_ref_login'];
        }
        
        if(isset($instance['btwin_ref_regis'])){

            $btwin_ref_regis = $instance['btwin_ref_regis'];
         }
        
      ?>
      
        <p>
        <label for="<?php echo $this->get_field_id('btwin_ref_login');    ?>">Link Login</label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_ref_login'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_ref_login"); ?>" value="<?php echo esc_html($btwin_ref_login); ?>"/>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('btwin_ref_regis');    ?>">Link Register</label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_ref_regis'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_ref_regis"); ?>" value="<?php echo esc_html($btwin_ref_regis); ?>"/>
        </p>
      
   <?php }

    public function update($new_instance , $old_instance){

        $instance = array();
        $instance['btwin_ref_login'] = (! empty($new_instance['btwin_ref_login'])) ? $new_instance['btwin_ref_login'] : '';
        $instance['btwin_ref_regis'] = (! empty($new_instance['btwin_ref_regis'])) ? $new_instance['btwin_ref_regis'] : '';

        return  $instance;
    }
}