<?php 


function checkNumberPhone($phone){
    
    if(preg_match('/[0-9]{10}/', $phone)){
        return $phone;
    }else{
        wp_die("format phone invalid!!");
    }
}



 function formShortCode(){
    
    if(isset($_POST['rg'])){ 
      global $wpdb;

    $table_name = "pg_regsiter_member";

    $wpdb->insert(
        $table_name,
        array(
            'c_regis_firstname' => esc_html($_POST['fname']),
            'c_regis_lastname' =>  esc_html($_POST['lname']),
            'c_regis_age' =>  esc_html($_POST['age']),
            'c_register_gender' =>  esc_html($_POST['gander']),
            'c_regis_tel' =>  esc_html(checkNumberPhone($_POST['tel'])),
            'c_regis_email' =>  esc_html($_POST['email']),
            'c_regis_address' =>  esc_html($_POST['addr']),
        )
    );
      echo("<script>location.href = '".site_url( '/thank-you' )."'</script>"); 
}else{
    
ob_start(); ?>

<form class="form-regis" method="post" action="">
    <div class="row">
        <div class="col-12">
            <h3 class="text-regis"><?php _e('ลงทะเบียน','pg-rgt'); ?></h3>
        </div>
    </div>
<div class="row">
    <div class="col-6">
        <label for="exampleInputEmail1" class="form-label"><?php _e('ชื่อ','pg-rgt'); ?><span class="text-rq"> * </span></label>
        <input type="text" class="form-control form-el" id="exampleInputEmail1" name="fname" aria-describedby="emailHelp" value="" required>
        
    </div>
    <div class="col-6">
        <label for="exampleInputEmail1" class="form-label"><?php _e('นามสกุล' , 'pg-rgt');?><span class="text-rq"> * </span></label>
        <input type="text" class="form-control form-el" id="exampleInputEmail1"  name="lname" aria-describedby="emailHelp" required>
       
    </div>
    <div class="col-12">
        <label for="exampleInputEmail1" class="form-label"><?php _e('เบอร์โทรศัพท์' , 'pg-rgt');?><span class="text-rq"> * </span></label>
        <input type="text" class="form-control form-el" id="exampleInputEmail1"  name="tel" aria-describedby="emailHelp" required>
       
    </div>
    <div class="col-12">
        <label for="exampleInputEmail1" class="form-label"><?php _e('อีเมล์' , 'pg-rgt');?><span class="text-rq"> * </span></label>
        <input type="email" class="form-control form-el" id="exampleInputEmail1"  name="email" aria-describedby="emailHelp" required>
        
    </div>
    <div class="col-6">
        <label for="exampleInputEmail1" class="form-label "><?php _e('เพศ' , 'pg-rgt');?></label>
        <select class="form-select form-el" aria-label="Default select example" name="gander">
            <option selected><?php _e('เลือก' , 'pg-rgt');?></option>
            <option value="1"><?php _e('ชาย' , 'pg-rgt');?></option>
            <option value="2"><?php _e('หญิง' , 'pg-rgt');?></option>
        
        </select>
    </div>
    <div class="col-6">
        <label for="exampleInputEmail1" class="form-label"><?php _e('อายุ' , 'pg-rgt');?></label>
        <input type="number" class="form-control form-el" id="exampleInputEmail1"  name="age" aria-describedby="emailHelp">
    </div>
    <div class="col-12">
    <label for="exampleInputEmail1" class="form-label "><?php _e('ที่อยู่' , 'pg-rgt');?></label>
    <textarea class="form-control form-el" name="addr" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-secondary bt-submit" name="rg"><?php _e('ลงทะเบียน' , 'pg-rgt');?></button>
    </div>
</form>


<?php   echo ob_get_clean(); } 
}

add_shortcode( 'pg-form', 'formShortCode');


?>




