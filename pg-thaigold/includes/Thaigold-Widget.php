<?php

class Thaigold_Widget extends WP_Widget{

  function  __construct(){

    parent::__construct(
        't_g_w', 
        __('Thai Gold Widget' ,'mmr_domain') ,
        array('description' => __('A Thaigold price widget' , 'mmr_domain'))
    );
  }

  // display
  public function widget($args , $instance){

    $title = apply_filters( 'widget_title',  $instance['title']);
    $username = esc_attr($instance['username']);
     
    echo $args['before_widget'];

    if(!empty($title)){
        $args['before_title'].$title.$args['after_title'];
    }

    echo $this->showPriceGold($title , $username);

    echo $args['after_widget'];
  }
  
  public function form($instance){
		// Get Title
		if(isset($instance['title'])){
			$title = $instance['title'];
		} else {
			$title = __('Latest Github Repos', 'mgr_domain');
		}

		// Get Username
		if(isset($instance['username'])){
			$username = $instance['username'];
		} else {
			$username = __('bradtraversy', 'mgr_domain');
		}

		
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'mgr_domain'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_html($title); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username', 'mgr_domain'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php echo esc_html($username); ?>">
			</p>

			
		<?php
	}
  // update data
  public function update($new_ins , $old_ins){

    $instance = array();
    $instance['title'] = (!empty($new_ins['title'])) ? strip_tags($new_ins['title']) : '';
    $instance['username'] = (!empty($new_ins['username'])) ? strip_tags($new_ins['username']) : ''; 

    return $instance;
  }

  public function showPriceGold($title , $username){



//ประกาศตัวแปรรับข้อมูลจาก url
$data_url = 'http://www.thaigold.info/RealTimeDataV2/gtdata_.txt'; 

//ดึงข้อมูลจาก url  เป็น json
$data_json = file_get_contents($data_url); 

//เปลี่ยนรูปแบบข้อมูล json เป็น array
$data_array = json_decode($data_json); 

?>


  	<div class="container">
  		<div class="row">
  			<div class="col-sm-12">
  				<h3><?php echo esc_html($title);?></h3>
          <div>ผู้อัปเดท: <?php  echo esc_html($username);   ?></div>
  				<table class="table table-bordered table-striped">
  					<thead>
  						<tr class="table-danger">
  							<th>name</th>
  							<th>bid</th>
  							<th>ask</th>
  							<th>diff</th>
  						</tr>
  					</thead>
  					
  				 <?php foreach ($data_array as $row) { ?>
  				 	<tbody>
  						<tr>
  							<td><?=$row->name;?></td>
  							<td><?=$row->bid;?></td>
  							<td><?=$row->ask;?></td>
  							<td><?=$row->diff;?></td>
  						</tr>
  					</tbody>
  				<?php  } ?>
  				</table>
  			</div>
  		</div>
  	</div>


 <?php }


}