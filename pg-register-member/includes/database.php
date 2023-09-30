<?php


function createTableRegister(){
    global $wpdb;
    global $charset_collate;
    $charset_collate = $wpdb->get_charset_collate();
    $create_sql = "";

    $table_name = "pg_regsiter_member";

    if($wpdb->get_var("SHOW TABLES LIKE '".$table_name."'") != $table_name){
        $create_sql = "CREATE TABLE ".$table_name."(
            c_regis_id INT(11) NOT NULL auto_increment,
            c_regis_firstname VARCHAR(150),
            c_regis_lastname VARCHAR(150),
            c_regis_age VARCHAR(2),
            c_register_gender INT(1),
            c_regis_tel VARCHAR(10),
            c_regis_email VARCHAR(50),
            c_regis_address TEXT,
            PRIMARY KEY (c_regis_id))$charset_collate";
    }

    require_once(ABSPATH . "wp-admin/includes/upgrade.php");
    dbDelta($create_sql);

        if (!isset($wpdb->pg_regsiter_member))
         {
           $wpdb->pg_regsiter_member = $table_name;
           //add the shortcut so you can use $wpdb->stats
           $wpdb->tables[] = str_replace($wpdb->prefix, '', $table_name);
    }
}

add_action( 'init', 'createTableRegister');