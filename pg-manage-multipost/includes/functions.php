<?php

function add_multisite_script(){
    wp_enqueue_style('bootstrap-multisite' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css',array(), '1.0');
    wp_enqueue_style('data-table-multisite' , '//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css',array(), '1.0');
    wp_enqueue_style('font-awesom' , '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',array(), '1.0');
  
    wp_enqueue_script('data-table-multisite-script' , '///cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js' , array() , '1.0.0' , true);
    wp_enqueue_script('bootstrap-multisite-script' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' , array() , '1.0.0' , true);
    wp_enqueue_script('table-multisite-script' , plugins_url().'/pg-manage-multipost/assets/js/table-main.js' , array('jquery') , '1.0.0' , true);

}

add_action('admin_enqueue_scripts' , 'add_multisite_script');

function mtsp_add_site(){
         global $wpdb;
        if(isset($_POST['save_setting'])){

            echo "is true";
            $multisite_name_web = $_POST['multisite_name_web'];
            $multisite_name_site = $_POST['multisite_name_site'];
            $multisite_username = $_POST['multisite_username'];
            $multisite_key_token =$_POST['multisite_key_token'];
                
                $table_name = 'manage_multisite';
                
                $wpdb->insert( 
                    $table_name, 
                    array( 
                        'multisite_name_web' => $multisite_name_web, 
                        'multisite_name_site' => $multisite_name_site, 
                        'multisite_username' => $multisite_username, 
                        'multisite_key_token' => $multisite_key_token, 
                    ) 
                );

            }
 }


 function delete_site_mtsp($id) {
     global $wpdb;
     $table = 'manage_multisite';
     $wpdb->delete( $table, array( 'multisite_id' => $id ) );  
    
    echo("<script>location.href = '".admin_url( '/admin.php?page=mtsp-all' )."'</script>");
     exit;
     
    
 }   

 function update_site_mtsp($id){

    global $wpdb;

    $query_prepare = $wpdb->prepare("SELECT * FROM manage_multisite WHERE multisite_id='".$id."'");
    $result = $wpdb->get_results($query_prepare);
    $data = json_decode(json_encode($result), true);

    return $data; 
 }



