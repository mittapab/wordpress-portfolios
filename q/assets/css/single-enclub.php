

<?php get_header(); 


do_action( 'qiupid_before_main_content' );

get_header(); 

if(have_posts()){
?>
  <div class="container en-box-container">
  <?php do_action('qiupid_before_blog_content'); ?>
        <div class="row mt-5 mb-4">

            <div class="col-md-7 col-xl-8">
                <div class="card border-0 box-shadow-01 rounded-1 bg-white">
                    <div class="card-body text-center">
                        <img class="img-fluid rounded-3 en-img" width=""  style="" src="<?php echo get_field('image_1');?>" alt="profile-image" />
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-xl-4">
                <div class="card border-0 box-shadow-01 rounded-1 bg-white">
                    <div class="card-body">
                        <div class="card-title fs-6 fw-medium mb-0">
                            <i class="bi bi-person-video me-1"></i> Media
                        </div>
                    </div>
                    <div class="container-fluid py-3 " style="background-color: #f4f4f4;">
                        <div class="row row-cols-4 align-items-center g-2">
                            <div class="col img-container-slider-div">
                                <div class="cursor-pointer card border-0 p-2 shadow-sm">
                                    <div class="text-center">
                                        <i class="bi bi-image"></i>
                                        <div class="fs-8 ">Photos</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <a class="nsbbox" title="iFrame Lightbox" href="<?php echo (!empty(get_field('ec_video'))) ? get_field('ec_video'): '';?>">
                                <div class="cursor-pointer card border-0 p-2 shadow-sm">
                                    <div class="text-center">
                                        <i class="bi bi-film"></i>
                                        <div class="fs-8">Videos</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col">
                              <a href="<?php echo (!empty(get_field('en_line'))) ? get_field('en_line'): '';?>" target="_blank">
                                <div class="cursor-pointer card border-0 p-2 shadow-sm">
                                    <div class="text-center">
                                        <i class="bi bi-telephone"></i>
                                        <div class="fs-8">ติดตอ่เรา</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col">
                                <div class="cursor-pointer card border-0 p-2 shadow-sm">
                                    <div class="text-center">
                                        <i class="bi bi-star"></i>
                                        <div class="fs-8">คะแนนรีวิว</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    

                </div>

                   <!--img-container-slider-->
                
                <div class="row row-cols-4 align-items-center g-2" style="margin-top: 10px;">
                            <div class="col">
                              <a class="nsbbox" title="Caption" href="<?php echo (!empty(get_field('image_1'))) ? get_field('image_1'):'https://enclub.net/wp-content/uploads/2023/11/No-Image-Placeholder.svg_.png';?>">
                                <img class="rounded-3" width="350" style="height:150px;"  src="<?php echo (!empty(get_field('image_1'))) ? get_field('image_1'):'https://enclub.net/wp-content/uploads/2023/11/No-Image-Placeholder.svg_.png';?>" alt="profile-image" />
                               </a>
                            </div>
                            <div class="col">
                                <a class="nsbbox" title="Caption" href="<?php echo (!empty(get_field('image_2'))) ? get_field('image_2'): 'https://enclub.net/wp-content/uploads/2023/11/No-Image-Placeholder.svg_.png';?>">
                                <img class="rounded-3" width="350"  style="height:150px;" src="<?php echo (!empty(get_field('image_2'))) ? get_field('image_2'): 'https://enclub.net/wp-content/uploads/2023/11/No-Image-Placeholder.svg_.png';?>" alt="profile-image" />
                                </a>
                            </div>
                            <div class="col">
                              <a class="nsbbox" title="Caption" href="<?php echo (!empty(get_field('image_3'))) ? get_field('image_3'): 'https://enclub.net/wp-content/uploads/2023/11/No-Image-Placeholder.svg_.png';?>">
                                <img class="rounded-3" width="350"  style="height:150px;" src="<?php echo (!empty(get_field('image_3'))) ? get_field('image_3'): 'https://enclub.net/wp-content/uploads/2023/11/No-Image-Placeholder.svg_.png';?>" alt="profile-image" title="สวย" />
                              </a>
                            </div>
                            <div class="col">
                              <a class="nsbbox" title="Caption" href="<?php echo (!empty(get_field('image_4'))) ? get_field('image_4'):'https://enclub.net/wp-content/uploads/2023/11/No-Image-Placeholder.svg_.png';?>">
                                <img class="rounded-3" width="350"  style="height:150px;" src="<?php echo (!empty(get_field('image_4'))) ? get_field('image_4'):'https://enclub.net/wp-content/uploads/2023/11/No-Image-Placeholder.svg_.png'?>" alt="profile-image" title="สวย" />
                              </a>
                            </div>
                        </div>
                     <div class="row row-cols-4 align-items-center g-2" style="margin-top: 10px;">
                            <div class="col-12">
                            <img class="rounded-3" width="450"  style="height:300px;" src="https://enclub.net/wp-content/uploads/2023/11/2ae81ee7-655d-4c0f-9838-37af16f6fdd0.jpg" alt="profile-image" title="สวย" />
                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31014.90399282431!2d100.59592065817714!3d13.666093350697711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a00bb218f43d%3A0x30100b25de25070!2z4LmA4LiC4LiV4Lia4Liy4LiH4LiZ4LiyIOC4geC4o-C4uOC4h-C5gOC4l-C4nuC4oeC4q-C4suC4meC4hOC4ow!5e0!3m2!1sth!2sth!4v1699264786350!5m2!1sth!2sth" 
                                width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                            </div>
                            
                     </div>
              </div>
        </div>

        <div class="profile-info-detail">
            <div class="row mb-4">
                <div class="col-md-8 col-sm-12">
                    <div class="card border-0 box-shadow-01 rounded-1 bg-white">
                        <div class="card-body border-bottom p-4">
                            <div class="card-title fs-5 fw-medium mb-0">
                                <i class="bi bi-info-circle me-1"></i> Profile Info 
                                    <!-- <p style="color:<?php echo (get_field('en_valid_value') == 1) ? "#127b11" : "#cc2222";   ?>;float: right;font-size: 16px;padding-top: 5px;">
                                     <i class="bi <?php echo (get_field('en_valid_value') == 1) ? "bi-bag-check" : "bi-bag-x";   ?>"></i>
                                      <?php echo (get_field('en_valid_value') == 1) ? "ยืนยันตัวตนแล้ว" : "ยังไม่ยืนยันตัวตน";   ?>
                                    <p> -->
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-title">ชื่อ</div>
                                <div class="fs-6 profile-info-detail-text"><?php the_title();    ?></div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-title">อายุ</div>
                                <div class="fs-6 profile-info-detail-text"><?php echo get_field('en_age'); ?> ปี</div>
                            </div>
                        
                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-title">สถานที่</div>
                                <div class="fs-6 profile-info-detail-text">
                          <?php 
         
                               
                                $posttags = get_the_tags();
                                if($posttags){
                                   
                                    if ($posttags) {
                                    foreach($posttags as $tag) {
                                        echo '<span class="badge bg-warning  text-dark">';
                                        echo $tag->name . ' '; 
                                        echo '</span> ';
                                    }
                                }
                        
                                }
                                
                                
                                ?>
 
                                </div>
                            </div>


                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-title">รายละเอียดเพิ่มเติม</div>
                               
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-text"><?php  the_content();    ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">

                    <div class="card border-0 box-shadow-01 rounded-1 bg-white">
                        <div class="card-body border-bottom p-4">
                            <div class="card-title fs-5 fw-medium mb-0">
                                <i class="bi bi-info-circle me-1"></i> Socials media</i>
                                  
                            </div>
                        </div>
                        <div class="card-body p-4" style="height: 267px;">
                        <div class="row">   <?php  echo do_shortcode('[addtoany]');    ?> </div>

                        <p>
                        <h5 style="font-size:18px;padding-top:8px;">เรตติ้งรีวิว <?php echo (!empty(get_field('en_ratting'))) ? esc_html(get_field('en_ratting')." ดาว") : "\"ยังไม่มีเรตติ้งรีวิว\"";  ?></h5>
                        <?php  for($i=1; $i<=5; $i++){

                            if($i <= get_field('en_ratting')){
                                echo'<i class="bi bi-star-fill" style="color:orange"></i>';
                            }else{
                                echo'<i class="bi bi-star" style="color:orange"></i>';
                            }

                        }  ?>
                         
                        </p>
                    
                        </div>
                    </div>

                </div>
            </div>
              <?php   
              echo do_shortcode('[slide_pr_8]'); 
              ?>
            <hr/>

        <div class="row">
            <div class="col-lg-6">  <?php  comments_template(); ?> </div>
        </div>


        </div>

    </div>

<?php }

do_action( 'qiupid_after_main_content' );
get_footer(); ?>




