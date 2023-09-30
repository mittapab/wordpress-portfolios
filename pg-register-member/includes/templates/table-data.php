<?php

function show_register_data(){ 
  
  global $wpdb;
  $prepare_query = $wpdb->prepare("SELECT * FROM pg_regsiter_member");
  $results = $wpdb->get_results($prepare_query);

  
  if(isset($results)){
    // $name = array();
    $data = json_decode(json_encode($results) , true);
    $i = 0;
 
  ob_start();?>

<div class="container admin-font">
  <br>
 <h2 class=""><?php _e('จัดการรายชื่อผู้ลงทะเบียน', 'pg-rgt'); ?> <a class="btn btn-success" style="float: right;" href="?page=mrgt-report&exp=1"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Excel</a></h2>
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

         $gander[$i] = ($data[$i]['c_register_gender'] == 1) ? "ชาย":"หญิง";
        
      
    ?>

    <tr>
      <td><?php echo esc_html(_e($i+1 , 'pg-rgt'));  ?></td>
      <td><?php echo esc_html(_e($name[$i] , 'pg-rgt'));  ?></td>
      <td><?php echo esc_html(_e($age[$i] , 'pg-rgt'));  ?></td>
      <td><?php echo esc_html(_e($gander[$i] , 'pg-rgt'));  ?></td>
     <td>
          <a class="btn btn-info" href="?page=mrgt-all&act=excel"><i class="fa fa-cogs" aria-hidden="true"></i></a>
          <a class="btn btn-warning" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <a class="btn btn-danger" href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        
      </td>
    
  </tr>
  <?php  $i++; }   ?>
 </tbody>
 </table>
      </div>
    </div>

 </div>

<?php } echo ob_get_clean();}