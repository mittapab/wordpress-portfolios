<?php


  add_action('admin_post_custom_email_action', 'csv_export_page');
  add_action('admin_post_nopriv_custom_email_action', 'csv_export_page'); 
  

function csv_export_page() {
  if (isset($_POST['export_csv'])) {
    $herader_csv =   array('ลำดับ', 'ชื่อ', 'อายุ', 'เพศ', 'อีเมล์', 'เบอร์โทร', 'ที่อยู่');

    global $wpdb;
    $prepare_query = $wpdb->prepare("SELECT * FROM pg_regsiter_member");
    $results = $wpdb->get_results($prepare_query);
    $data = json_decode(json_encode($results) , true);
    $i = 0;
    $set_data = array();
    $set_data[0] =  $herader_csv;
    for($loop = 0; $loop < count($results); $loop++){

      
            
             $set_data[$loop+1] = array (
              ($loop+1), 
              $data[$loop]['c_regis_firstname']." ".$data[$loop]['c_regis_lastname'], 
              $data[$loop]['c_regis_age'],
              $data[$loop]['c_register_gender'],
              $data[$loop]['c_regis_email'],
              '"'.$data[$loop]['c_regis_tel'].'"',
              trim($data[$loop]['c_regis_address']),
            ); 
      
    }
    

    $file = fopen('php://output', 'w');

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="export.csv"');

    foreach ($set_data as $line) {
      foreach ($line as $key => $value) {
        $line[$key] = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
      }
      fputcsv($file, $line);
    }
    fclose($file);
    exit;
  }
}


function show_register_data(){ 
  
  global $wpdb;
  $prepare_query = $wpdb->prepare("SELECT * FROM pg_regsiter_member");
  $results = $wpdb->get_results($prepare_query);
  if(isset($results)){
    $data = json_decode(json_encode($results) , true);
    $i = 0;
 
  ob_start();?>

<div class="container admin-font">
  <br>
 <h2 class=""><?php _e('จัดการรายชื่อผู้ลงทะเบียน', 'pg-rgt'); ?> 


 <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <input type="hidden" name="action" value="custom_email_action">
      <p><button type="submit" class="btn btn-success" style="float: right;margin-top: -40px;" name="export_csv" value="Export to CSV" class="button button-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Excel</button>
</form>


</h2>
   <p><?php _e('รายชื่อที่ลงทะเบียน', 'pg-rgt'); ?></p>

  <table id="myTable" class="display">
       <thead>
          <tr>
              <th>ลำดับ</th>
               <th>ชื่อ</th>
               <th>อายุ</th>
               <th>เพศ</th>
              <th>จัดการ</th>
           </tr>
       </thead>
    <tbody>
  
    <?php  while($i < count($results)){  
      
         $name[$i] = $data[$i]['c_regis_firstname']." ".$data[$i]['c_regis_lastname'];
         $age[$i] = $data[$i]['c_regis_age'];
         $id[$i] = $data[$i]['c_regis_id'];
         $gander[$i] = ($data[$i]['c_register_gender'] == 1) ? "ชาย":"หญิง";
        
      
    ?>

    <tr>
      <td><?php echo _e(esc_html($i+1 , 'pg-rgt'));  ?></td>
      <td><?php echo _e(esc_html($name[$i] , 'pg-rgt'));  ?></td>
      <td><?php echo _e(esc_html($age[$i] , 'pg-rgt'));  ?></td>
      <td><?php echo _e(esc_html($gander[$i] , 'pg-rgt'));  ?></td>
     <td>
          <a class="btn btn-info" href="?page=mrgt-all&act=excel"><i class="fa fa-cogs" aria-hidden="true"></i></a>
          <a class="btn btn-warning" href="?page=mrgt-all&id=<?php echo esc_html($id[$i]); ?>&type=edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <a class="btn btn-danger" href="?page=mrgt-all&id=<?php echo esc_html($id[$i]); ?>&type=delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        
      </td>
    
  </tr>
  <?php  $i++; }   ?>
 </tbody>
 </table>
      </div>
    </div>

 </div>

<?php } echo ob_get_clean();}