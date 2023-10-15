<?php

function member_update($data){
    
    global $wpdb;

    if(isset($_POST['save_register'])){

        $id = checkTextField($_GET['id']);
        $table_name = "pg_regsiter_member";
        $c_regis_firstname =  checkTextField($_POST['c_regis_firstname']);
        $c_regis_lastname =  checkTextField($_POST['c_regis_lastname']); 
        $c_regis_age  =  checkTextField($_POST['c_regis_age']); 
        $c_register_gender =  checkTextField($_POST['c_register_gender']); 
        $c_regis_tel =  checkNumberPhone($_POST['c_regis_tel']); 
        $c_regis_email =  checkEmail($_POST['c_regis_email']); 
        $c_regis_address =  checkAddress($_POST['c_regis_address']); 
    
        $wpdb->query( $wpdb->prepare("UPDATE $table_name 
        SET 
        c_regis_firstname = '".$c_regis_firstname."',
        c_regis_lastname = '".$c_regis_lastname."',
        c_regis_age = '".$c_regis_age."',
        c_regis_tel = '".$c_regis_tel."',
        c_regis_email = '".$c_regis_email."',
        c_regis_address = '".$c_regis_address."',
        c_register_gender = '".$c_register_gender."'
        WHERE c_regis_id = '".$id."'"));
    
        echo("<script>location.href = '".esc_url(admin_url( '/admin.php?page=mrgt-all' ))."'</script>");
        exit;
    }
        
    
    
?>

<div class="container">
        <br>
       
                <form class="form-regis" style="width: 50%;" method="post" action="">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-regis"><?php _e('แก้ไขข้อมูลผู้ลงทะเบียน','pg-rgt'); ?></h3>
                </div>
            </div>
        <div class="row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label"><?php _e('ชื่อ','pg-rgt'); ?><span class="text-rq"> * </span></label>
                <input type="text" class="form-control form-el" id="exampleInputEmail1" name="c_regis_firstname" aria-describedby="emailHelp" value="<?php echo _e(esc_html($data[0]['c_regis_firstname']) , "pg-rgt");  ?>" required>
                
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label"><?php _e('นามสกุล' , 'pg-rgt');?><span class="text-rq"> * </span></label>
                <input type="text" class="form-control form-el" id="exampleInputEmail1" name="c_regis_lastname" value=<?php echo _e(esc_html($data[0]['c_regis_lastname']) , "pg-rgt");  ?>" aria-describedby="emailHelp" required>
            
            </div>
            <div class="col-12">
                <label for="exampleInputEmail1" class="form-label"><?php _e('เบอร์โทรศัพท์' , 'pg-rgt');?><span class="text-rq"> * </span></label>
                <input type="text" class="form-control form-el" id="exampleInputEmail1"  name="c_regis_tel" aria-describedby="emailHelp" value="<?php echo _e(esc_html($data[0]['c_regis_tel']) , "pg-rgt");  ?>" required>
            
            </div>
            <div class="col-12">
                <label for="exampleInputEmail1" class="form-label"><?php _e('อีเมล์' , 'pg-rgt');?><span class="text-rq"> * </span></label>
                <input type="email" class="form-control form-el" id="exampleInputEmail1"  name="c_regis_email" aria-describedby="emailHelp" value="<?php echo _e(esc_html($data[0]['c_regis_email']) , "pg-rgt");  ?>" required>
                
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label "><?php _e('เพศ' , 'pg-rgt');?></label>
                <select class="form-select form-el" aria-label="Default select example" name="c_register_gender">
                    <option ><?php _e('เลือก' , 'pg-rgt');?></option>
                    <option value="1" <?php echo (esc_html($data[0]['c_register_gender'] == 1)) ? "selected":""; ?>><?php _e('ชาย' , 'pg-rgt');?></option>
                    <option value="2" <?php echo (esc_html($data[0]['c_register_gender'] == 2)) ? "selected":""; ?>><?php _e('หญิง' , 'pg-rgt');?></option>
                
                </select>
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label"><?php _e('อายุ' , 'pg-rgt');?></label>
                <input type="number" class="form-control form-el" id="exampleInputEmail1"  name="c_regis_age" aria-describedby="emailHelp" value="<?php echo _e(esc_html($data[0]['c_regis_age']) , "pg-rgt");  ?>">
            </div>
            <div class="col-12">
            <label for="exampleInputEmail1" class="form-label "><?php _e('ที่อยู่' , 'pg-rgt');?></label>
            <textarea class="form-control form-el" name="c_regis_address" rows="5"><?php echo _e(esc_html($data[0]['c_regis_address']) , "pg-rgt");  ?></textarea>
            </div>
            <button type="submit" class="btn btn-secondary bt-submit" name="save_register"><?php _e('บันทึก' , 'pg-rgt');?> </button>
            </div>
        </form>
     </div>

<?php }