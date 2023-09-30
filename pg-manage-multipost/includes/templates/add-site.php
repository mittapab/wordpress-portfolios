<?php function template_add(){ ?>
<div class="container">
        <br>
         <h2><?php _e('Settings Site Endpoint', 'mtsp_domain'); ?></h2>
        <p><?php _e('ตั้งค่าเว็บที่โพสต์', 'mtsp_domain'); ?></p>

        <form method="post" action="">
        <div class="row">
            <div class="col-6">
                    <div class='form-group'>

                        <label for=""><?php  _e('Website' , 'mtsp_domain');  ?></label><br>
                        <input type="text" name='multisite_name_web' id='' class='form-control'  value="" >

                         <br>
                        <label for=""><?php  _e('END POINT' , 'mtsp_domain');  ?></label><br>
                        <input type="text" name='multisite_name_site' id='' class='form-control' value="" >
                       
                        <br>
                        <label for=""><?php  _e('Username' , 'mtsp_domain');  ?></label><br>
                        <input type="text" name='multisite_username' id='' class='form-control' value="" >
                     
                        <br>
                        <label for=""><?php  _e('Key token' , 'mtsp_domain');  ?></label><br>
                        <input type="text" name='multisite_key_token' id='' class='form-control' value="" >
                        <br>
                        <button type='submit' class='button button-primary' name="save_setting">Save data</button>
                     </div>
                    </div>
         </div>
      </form>
     </div>

<?php }