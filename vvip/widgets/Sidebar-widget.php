<?php

class Sidebar_widget extends WP_Widget{
    
    function __construct(){
        parent::__construct(
            'btwin-id',
            __('Btwin side menu','btwin_168'),
            array('Btwin sidebar menu' => __('btwin_168'))
        );
    }

    public function widget($args , $instance){ 

        $btwin_name_menu = "";
        $btwin_link_menu ="";
        $btwin_img_menu ="";

        if(isset($instance['btwin_name_menu'])){

            $btwin_name_menu = $instance['btwin_name_menu'];
        }
        
        if(isset($instance['btwin_link_menu'])){

            $btwin_link_menu = $instance['btwin_link_menu'];
         }
        
        if(isset($instance['btwin_img_menu'])){

            $btwin_img_menu = $instance['btwin_img_menu'];

        }
        
    ?>  
    
    <li class="tab-menu-left-item">
        <a href="<?php  echo esc_url($btwin_link_menu);   ?>" class="nav-link menu-item-list py-2">
            <img src="<?php echo esc_html($btwin_img_menu)?>"
                class="img-fluid me-2" width="50" alt="icon-menu">
                <?php echo esc_html($btwin_name_menu);?>
        </a>
      </li>

    <?php }

    public function form($instance){
           
        $btwin_name_menu = "";
        $btwin_link_menu ="";
        $btwin_img_menu ="";

        if(isset($instance['btwin_name_menu'])){

            $btwin_name_menu = $instance['btwin_name_menu'];
        }
        
        if(isset($instance['btwin_link_menu'])){

            $btwin_link_menu = $instance['btwin_link_menu'];
         }
        
        if(isset($instance['btwin_img_menu'])){

            $btwin_img_menu = $instance['btwin_img_menu'];

        } ?>
      
        <p>
        <label for="<?php echo $this->get_field_id('btwin_name_menu');    ?>">Name menu </label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_name_menu'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_name_menu"); ?>" value="<?php echo esc_html($btwin_name_menu); ?>"/>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('btwin_link_menu');    ?>">Link menu</label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_link_menu'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_link_menu"); ?>" value="<?php echo esc_html($btwin_link_menu); ?>"/>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('btwin_img_menu');    ?>">Link Image</label>
            <input type="text" id="<?php  echo $this->get_field_id('btwin_img_menu'); ?>" class="widefat" name="<?php echo $this->get_field_name("btwin_img_menu"); ?>" value="<?php echo esc_html($btwin_img_menu); ?>"/>
        </p>



   <?php }

    public function update($new_instance , $old_instance){

        $instance = array();
        $instance['btwin_name_menu'] = (! empty($new_instance['btwin_name_menu'])) ? $new_instance['btwin_name_menu'] : '';
        $instance['btwin_link_menu'] = (! empty($new_instance['btwin_link_menu'])) ? $new_instance['btwin_link_menu'] : '';
        $instance['btwin_img_menu'] = (! empty($new_instance['btwin_img_menu'])) ? $new_instance['btwin_img_menu'] : '';

        return  $instance;
    }
}