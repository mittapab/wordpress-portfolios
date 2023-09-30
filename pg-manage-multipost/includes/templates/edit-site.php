<?php function template_edit($data){ 

global $wpdb;

if(isset($_POST['save_setting'])){
    $id = $_GET['id'];
    $multisite_name_web = $_POST['multisite_name_web'];
    $multisite_name_site = $_POST['multisite_name_site']; 
    $multisite_username  = $_POST['multisite_username']; 
    $multisite_key_token = $_POST['multisite_key_token']; 

    $wpdb->query( $wpdb->prepare("UPDATE manage_multisite 
    SET 
    multisite_name_web = '".$multisite_name_web."',
    multisite_name_site = '".$multisite_name_site."',
    multisite_username = '".$multisite_username."',
    multisite_key_token = '".$multisite_key_token."'
    WHERE multisite_id = '".$id."'"));

    echo("<script>location.href = '".admin_url( '/admin.php?page=mtsp-all' )."'</script>");
    exit;
}

    
    ?>
<div class="container">
        <br>
         <h2><?php _e('Settings Site Endpoint', 'mtsp_domain'); ?></h2>
        <p><?php _e('ตั้งค่าเว็บที่โพสต์', 'mtsp_domain'); ?></p>

        <form method="post" action="#">
        <div class="row">
            <div class="col-6">
                    <div class='form-group'>

                        <label for=""><?php  _e('Website' , 'mtsp_domain');  ?></label><br>
                        <input type="text" name='multisite_name_web' id='' class='form-control'  value="<?php echo $data[0]['multisite_name_web'];; ?>" >

                         <br>
                        <label for=""><?php  _e('END POINT' , 'mtsp_domain');  ?></label><br>
                        <input type="text" name='multisite_name_site' id='' class='form-control'  value="<?php echo $data[0]['multisite_name_site']; ?>" >
                       
                        <br>
                        <label for=""><?php  _e('Username' , 'mtsp_domain');  ?></label><br>
                        <input type="text" name='multisite_username' id='' class='form-control'   value="<?php echo $data[0]['multisite_username']; ?>" >
                     
                        <br>
                        <label for=""><?php  _e('Key token' , 'mtsp_domain');  ?></label><br>
                        <input type="text" name='multisite_key_token' id='' class='form-control'   value="<?php echo $data[0]['multisite_key_token']; ?>" >
                        <br>
                        <button type='submit' class='button button-primary' name="save_setting">Save data</button>
                     </div>
                    </div>
         </div>
      </form>
     </div>

<?php }