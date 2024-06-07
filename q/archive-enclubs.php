<?php  
/**
 * Template Name: Enclub
 */


get_header(); 

do_action( 'qiupid_before_main_content' );



?>

        <div class="container"> <!---container-->
        <br><br>
          <?php do_action('qiupid_before_blog_content'); ?>
             <?php get_template_part('en-clubs/searchform-enclub'); ?><br>
             <form action="<?php echo esc_url(site_url('/enclubs')); ?>" method="get">
                <div class="row" style="position: relative;margin-bottom: 50px;margin-top: 10px;">
                 <div id="cate" class="">
                    <label for="category_filter" style="position: absolute;">เลือกเพศ: </label>
                    <?php
                    $categories = get_categories(array(
                        'taxonomy'   => 'category',
                        'hide_empty' => false,
                    ));
                    ?>
                    <select name="category_filter" id="category_filter" style="border-radius: 30px;padding: 5px;position: absolute; left: 120px;   margin-top: -10px;">
                        <option value="">ทังหมด</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="tags" class="">
                    <label for="tag_filter"  style="position: absolute;left:270px">เลือกสถานที่: </label>
                    <?php
                    $tags = get_tags(array(
                        'taxonomy'   => 'post_tag',
                        'hide_empty' => false,
                    ));
                    ?>
                    <select name="tag_filter" id="tag_filter" style="border-radius: 30px;padding: 5px;position:absolute; left: 370px; margin-top: -10px; ">
                        <option value="">สถานที่ทั้งหมด</option>
                        <?php foreach ($tags as $tag) : ?>
                            <option value="<?php echo esc_attr($tag->slug); ?>"><?php echo esc_html($tag->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="" style="">
                    <button type="submit" class="btn btn-primary"style="position:absolute; left: 525px; margin-top: -10px;border-radius: 10px; ">กรองรายชื่อ</button>
                </div>
                   
        </div>
        </form>
                <!-- จบฟอร์มกรอง -->
            

            <?php
            $args = array(
                'post_type'      => 'enclubs', // ชื่อของ custom post type
                'posts_per_page' => -1, // แสดงทั้งหมด
                'orderby'        => 'date', // เรียงลำดับตามวันที่
                'order'          => 'DESC', // เรียงลำดับจากมากไปหาน้อย
            );

            // เพิ่มตัวกรองตามหมวดหมู่ (category)
            if (!empty($_GET['category_filter'])) {
                $args['category_name'] = esc_html($_GET['category_filter']);//sanitize_text_field($_GET['category_filter']);
               
            }

            // เพิ่มตัวกรองตามแท็ก (tags)
            if (!empty($_GET['tag_filter'])) {
                $args['tag'] = esc_html($_GET['tag_filter']);//sanitize_text_field($_GET['tag_filter']);
               
           
            }

            $query = new WP_Query($args); ?>
            <div class="row"><!---Row-->
                <?php  
                   if($query->have_posts()){

                    while($query->have_posts()){ 
                        $query->the_post(); 
                       ?>

                     <div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-3" ><!---col-->

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
             echo '</div>';   } ?>
               </div>
            </div>
                </div><!--- End col-->
               <?php  }
                   } 
                 echo paginate_links(); ?>
            </div><!---End Row-->
            <br><br>
       </div><!---End container-->


<?php   get_footer();  ?>




