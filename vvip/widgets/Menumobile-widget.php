<?php

class Menumobile_widget extends WP_Widget{
    
    function __construct(){
        parent::__construct(
            'btwint-id-m',
            __('Btwin Top menu','btwint_168-m'),
            array('Btwin Top menu' => __('btwint_168-m'))
        );
    }

    public function widget($args , $instance){ 

        $btwin_mobile_name_menu = "";
        $btwin_mobile_link_menu ="";
        $btwin_mobile_img_menu ="";

        if(isset($instance['btwin_mobile_name_menu'])){

            $btwin_mobile_name_menu = $instance['btwin_mobile_name_menu'];
        }
        
        if(isset($instance['btwin_mobile_link_menu'])){

            $btwin_mobile_link_menu = $instance['btwin_mobile_link_menu'];
         }
        
        if(isset($instance['btwin_mobile_img_menu'])){

            $btwin_mobile_img_menu = $instance['btwin_mobile_img_menu'];

        }
        
    ?>  
    
    <div class="menu-footer-list">
        <a href="<?php  echo esc_url($btwin_mobile_link_menu);   ?>" class="nav-link text-center">
            <img src="<?php echo $btwin_mobile_img_menu; ?>" class="img-fluid" width="34" height="54"
                alt="icon-menu">
            <div class="text-center fs-7"><?php echo esc_html($btwin_mobile_name_menu);?></div>
        </a>
    </div>

    <?php }

    public function form($instance){
           
        $btwin_mobile_name_menu = "";
        $btwin_mobile_link_menu ="";
        $btwin_mobile_img_menu ="";

        if(isset($instance['btwin_mobile_name_menu'])){

            $btwin_mobile_name_menu = $instance['btwin_mobile_name_menu'];
        }
        
        if(isset($instance['btwin_mobile_link_menu'])){

            $btwin_mobile_link_menu = $instance['btwin_mobile_link_menu'];
         }
        
        if(isset($instance['btwin_mobile_img_menu'])){

            $btwin_mobile_img_menu = $instance['btwin_mobile_img_menu'];

        } ?>
      
        <p>
        <label for="<?php echo $this->get_field_id('btwin_mobile_name_menu');    ?>">Name menu </label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_mobile_name_menu'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_mobile_name_menu"); ?>" value="<?php echo esc_html($btwin_mobile_name_menu); ?>"/>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('btwin_mobile_link_menu');    ?>">Link menu</label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_mobile_link_menu'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_mobile_link_menu"); ?>" value="<?php echo esc_html($btwin_mobile_link_menu); ?>"/>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('btwin_mobile_img_menu');    ?>">Link Image</label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_mobile_img_menu'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_mobile_img_menu"); ?>" value="<?php echo esc_html($btwin_mobile_img_menu); ?>"/>
        </p>



   <?php }

    public function update($new_instance , $old_instance){

        $instance = array();
        $instance['btwin_mobile_name_menu'] = (! empty($new_instance['btwin_mobile_name_menu'])) ? $new_instance['btwin_mobile_name_menu'] : '';
        $instance['btwin_mobile_link_menu'] = (! empty($new_instance['btwin_mobile_link_menu'])) ? $new_instance['btwin_mobile_link_menu'] : '';
        $instance['btwin_mobile_img_menu'] = (! empty($new_instance['btwin_mobile_img_menu'])) ? $new_instance['btwin_mobile_img_menu'] : '';

        return  $instance;
    }
}