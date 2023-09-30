<?php

  function show_all_data_mtsp(){

    global $wpdb;
  // select data
  $multisite_id= array();
  $multisite_name_web = array();
  $multisite_name_site = array();
  $multisite_username =array();
  $multisite_key_token =array();

  $prepared_query = $wpdb->prepare( 'SELECT * FROM manage_multisite');
  $results = $wpdb->get_results( $prepared_query );
  
  if($results){
      $array = json_decode(json_encode($results), true);
      $i = 0;
     
  ob_start(); ?>
 

   <div class="container">
      <br>
     <h2><?php _e('Settings Site Endpoint', 'mtsp_domain'); ?></h2>
      <p><?php _e('ตั้งค่าเว็บที่โพสต์', 'mtsp_domain'); ?></p>

      <table id="myTable" class="display">
          <thead>
              <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อ</th>
                  <th>Api</th>
                  <th>ชื่อผู้ใช้งาน</th>
                  <th>จัดการ</th>
              </tr>
          </thead>
       <tbody>

      <?php   
      
      while( $i < count($results)){
          $multisite_id[$i] = $array[$i]['multisite_id'];
          $multisite_name_web[$i] = $array[$i]['multisite_name_web'];
          $multisite_name_site[$i] = $array[$i]['multisite_name_site'];
          $multisite_username[$i] = $array[$i]['multisite_username'];
          $multisite_key_token[$i] = $array[$i]['multisite_key_token'];
        ?>
        <tr>
          <td><?php echo $i +1 ; ?></td>
          <td><?php echo $multisite_name_web[$i]; ?></td>
          <td><?php echo $multisite_name_site[$i]; ?></td>
          <td><?php echo $multisite_username[$i]; ?></td>
          <td>
              <button class="btn btn-secondary" ><i class="fa fa-eye" aria-hidden="true"></i></button>
              <a class="btn btn-warning" href="?page=mtsp-all&id=<?php echo $multisite_id[$i]; ?>&type=edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a class="btn btn-danger" href="?page=mtsp-all&id=<?php echo $multisite_id[$i]; ?>&type=delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
              <!-- <button class="btn btn-danger del-row" id="<?php echo "del-row-mtsp_".$multisite_id[$i]."_".wp_create_nonce("del-row-mtsp-".$multisite_id[$i]); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button> -->
          </td>
          <!-- <td><?php echo $multisite_key_token[$i]; ?></td> -->
      </tr>
      <?php   $i++;
          }
       }
    ?>
 
  </tbody>
</table>
          </div>
       </div>

   </div>

<?php

echo ob_get_clean();

}