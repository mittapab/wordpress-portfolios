<?php get_header(); 


// $enclub_args = array(
//     "post_per_page" => 4,
//     "post_type" => "enclubs",
// );

// $enclub_all_data = new WP_Query($enclub_args);

if(have_posts()){
?>
  <div class="container en-box-container">
        <div class="row mt-5 mb-4">

            <div class="col-md-7 col-xl-8">
                <div class="card border-0 box-shadow-01 rounded-1 bg-white">
                    <div class="card-body text-center">
                        <img class="img-fluid rounded-3" width="350" height="250"
                            src="<?php echo get_field('image_1');?>" alt="profile-image" />
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-xl-4">
                <div class="card border-0 box-shadow-01 rounded-1 bg-white h-100">
                    <div class="card-body">
                        <div class="card-title fs-6 fw-medium mb-0">
                            <i class="bi bi-person-video me-1"></i> Media
                        </div>
                    </div>
                    <div class="container-fluid py-3 h-100" style="background-color: #f4f4f4;">
                        <div class="row row-cols-4 align-items-center g-2">
                            <div class="col">
                                <div class="cursor-pointer card border-0 p-2 shadow-sm">
                                    <div class="text-center">
                                        <i class="bi bi-image"></i>
                                        <div class="fs-8">Photos</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="cursor-pointer card border-0 p-2 shadow-sm">
                                    <div class="text-center">
                                        <i class="bi bi-film"></i>
                                        <div class="fs-8">Videos</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="cursor-pointer card border-0 p-2 shadow-sm">
                                    <div class="text-center">
                                        <i class="bi bi-telephone"></i>
                                        <div class="fs-8">ติดตอ่เรา</div>
                                    </div>
                                </div>
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

            </div>
        </div>

        <div class="profile-info-detail">
            <div class="row mb-4">
                <div class="col">
                    <div class="card border-0 box-shadow-01 rounded-1 bg-white">
                        <div class="card-body border-bottom p-4">
                            <div class="card-title fs-5 fw-medium mb-0">
                                <i class="bi bi-info-circle me-1"></i> Profile Info 
                                    <p style="color:<?php echo (get_field('en_valid_value') == 1) ? "#127b11" : "#cc2222";   ?>;float: right;font-size: 16px;padding-top: 5px;">
                                     <i class="bi <?php echo (get_field('en_valid_value') == 1) ? "bi-bag-check" : "bi-bag-x";   ?>"></i>
                                      <?php echo (get_field('en_valid_value') == 1) ? "ยืนยันตัวตนแล้ว" : "ยังไม่ยืนยันตัวตน";   ?>
                                    <p>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-title">ชื่อ</div>
                                <div class="fs-6 profile-info-detail-text"><?php the_title();    ?></div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-title">เพศ</div>
                                <div class="fs-6 profile-info-detail-text"><?php echo (get_field('en_sex') == "male") ? "ชาย" : "หญิง";   ?></div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-title">อายุ</div>
                                <div class="fs-6 profile-info-detail-text"><?php echo get_field('en_age'); ?> ปี</div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-title">ราคาจ้างงาน</div>
                                <div class="fs-6 profile-info-detail-text">2,500 บาท</div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="fs-6 profile-info-detail-title">แท็ก</div>
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
            </div>
        </div>

    </div>

<?php } get_footer(); ?>




