<?php

class Topmenumobile_widget extends WP_Widget{
    
    function __construct(){
        parent::__construct(
            'btwint-id-tm',
            __('Btwin Top menu','btwint_168-tm'),
            array('Btwin Top menu' => __('btwint_168-tm'))
        );
    }

    public function widget($args , $instance){ 

        $btwin_tmobile_name_menu = "";
        $btwin_tmobile_link_menu ="";
        $btwin_tmobile_img_menu ="";

        if(isset($instance['btwin_tmobile_name_menu'])){

            $btwin_tmobile_name_menu = $instance['btwin_tmobile_name_menu'];
        }
        
        if(isset($instance['btwin_tmobile_link_menu'])){

            $btwin_tmobile_link_menu = $instance['btwin_tmobile_link_menu'];
         }
        
        if(isset($instance['btwin_tmobile_img_menu'])){

            $btwin_tmobile_img_menu = $instance['btwin_tmobile_img_menu'];

        }
        
    ?>  
    
    <div class="col">
        <a href="<?php  echo esc_url($btwin_tmobile_link_menu);   ?>" class="nav-link card-menu-mobile-item">
            <img src="<?php echo $btwin_tmobile_img_menu; ?>" class="icon-menu" alt="icon-menu">
            <div class="p-1"><?php echo esc_html($btwin_tmobile_name_menu);?></div>
        </a>
    </div>

    <?php }

    public function form($instance){
           
        $btwin_tmobile_name_menu = "";
        $btwin_tmobile_link_menu ="";
        $btwin_tmobile_img_menu ="";

        if(isset($instance['btwin_tmobile_name_menu'])){

            $btwin_tmobile_name_menu = $instance['btwin_tmobile_name_menu'];
        }
        
        if(isset($instance['btwin_tmobile_link_menu'])){

            $btwin_tmobile_link_menu = $instance['btwin_tmobile_link_menu'];
         }
        
        if(isset($instance['btwin_tmobile_img_menu'])){

            $btwin_tmobile_img_menu = $instance['btwin_tmobile_img_menu'];

        } ?>
      
        <p>
        <label for="<?php echo $this->get_field_id('btwin_tmobile_name_menu');    ?>">Name menu </label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_tmobile_name_menu'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_tmobile_name_menu"); ?>" value="<?php echo esc_html($btwin_tmobile_name_menu); ?>"/>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('btwin_tmobile_link_menu');    ?>">Link menu</label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_tmobile_link_menu'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_tmobile_link_menu"); ?>" value="<?php echo esc_html($btwin_tmobile_link_menu); ?>"/>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('btwin_tmobile_img_menu');    ?>">Link Image</label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_tmobile_img_menu'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_tmobile_img_menu"); ?>" value="<?php echo esc_html($btwin_tmobile_img_menu); ?>"/>
        </p>



   <?php }

    public function update($new_instance , $old_instance){

        $instance = array();
        $instance['btwin_tmobile_name_menu'] = (! empty($new_instance['btwin_tmobile_name_menu'])) ? $new_instance['btwin_tmobile_name_menu'] : '';
        $instance['btwin_tmobile_link_menu'] = (! empty($new_instance['btwin_tmobile_link_menu'])) ? $new_instance['btwin_tmobile_link_menu'] : '';
        $instance['btwin_tmobile_img_menu'] = (! empty($new_instance['btwin_tmobile_img_menu'])) ? $new_instance['btwin_tmobile_img_menu'] : '';

        return  $instance;
    }
}