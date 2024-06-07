<?php  
/**
 * Template Name: Enclub
 */


get_header(); 

do_action( 'qiupid_before_main_content' );

$enclub_args = array(
    "post_per_page" => 8,
    "post_type" => "enclub",
);

$enclub_all_data = new WP_Query($enclub_args);

?>

<div class="high-padding">
    <!-- Blog content -->
    <div class="container blog-posts">
        <div class="row">
        <?php //do_action('qiupid_before_blog_content'); ?>
        <?php
        
    if($enclub_all_data->have_posts()){

        while($enclub_all_data->have_posts()){ 
            $enclub_all_data->the_post(); 
        ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-3" >

		
			<!-- <div class="<?php echo esc_attr($class); ?> main-content"> -->



  
            <div class="card"  style="position: relative margin-left:18px; width:100%;">
                <div class="badg-en" style="padding: 10px!important;position: absolute;margin-top: 10px;margin-left: 5px;">
                    <span class="badge bg-<?php echo (get_field('en_valid_value') == 1) ? "success" : "danger";    ?>"><?php echo (get_field('en_valid_value') == 1) ? "ยืนยันตัวตนแล้ว" : "ยังไม่ยืนยันตัวตน";   ?></span> 
                </div>

            <img src="<?php echo get_field('image_1');?>" class="" style="height:350px!important;">
            <div class="card-body">
                <a href="<?php the_permalink(); ?>"><h5 class="card-title" style="color:#000000; text-decoration: none !important;font-weight: 500;font-size: 22px;"><?php the_title();?></h5></a>
                <span class="badge " style="background-color: <?php echo (get_field('en_sex') == "male") ? "#007be2!important;" : "#c028e6!important;";   ?>">เพศ<?php echo (get_field('en_sex') == "male") ? "ชาย" : "หญิง";   ?></span>
                <span class="badge bg-warning text-dark" style="">อายุ <?php echo get_field('en_age'); ?></span>
                <div class="card-text" style="margin-top:5px; color:#808080;"><?php the_content();    ?></div>
                <hr/>
                <?php 
                 $posttags = get_the_tags();
              
                if($posttags){
                    echo '<div style="color:#6d7276;">';
                    if ($posttags) {
                    foreach($posttags as $tag) {
                        echo $tag->name . ' ,'; 
                    }
                }

                echo '</div>';
                }
                
                
                ?>
            </div>
            </div>


           </div>	


           <!-- </div>     -->
     <?php  }
         }
    wp_reset_postdata();   
     ?>



		</div>
	</div>
</div>



<?php   get_footer();  ?>