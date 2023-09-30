<?php


function createTableMultiSite(){

    global $wpdb;
    global $charset_collate;
    global $db_version;
    // global $charset_collate;
    $charset_collate = $wpdb->get_charset_collate();
    $create_sql ="";


    $table_name = 'manage_multisite';

    if($wpdb->get_var("SHOW TABLES LIKE '".$table_name."'") != $table_name){

        $create_sql = "CREATE TABLE " . $table_name . " (
            multisite_id INT(11) NOT NULL auto_increment,
            multisite_name_site VARCHAR(150),
            multisite_username VARCHAR(150),
            multisite_key_token VARCHAR(150),
            PRIMARY KEY (multisite_id))$charset_collate;";
    }

    require_once(ABSPATH . "wp-admin/includes/upgrade.php");
    dbDelta($create_sql);

        if (!isset($wpdb->manage_multisite))
         {
           $wpdb->manage_multisite = $table_name;
           //add the shortcut so you can use $wpdb->stats
           $wpdb->tables[] = str_replace($wpdb->prefix, '', $table_name);
    }

}

add_action( 'init', 'createTableMultiSite');