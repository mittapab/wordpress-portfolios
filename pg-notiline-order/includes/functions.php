<?php
require_once(plugin_dir_path(__FILE__).'order_status.php');
require_once(plugin_dir_path(__FILE__).'line_notify.php');


// #####################   On Hold ##########################
add_action('woocommerce_order_status_on-hold', 'send_line_notification_on_hold', 10, 1);

function send_line_notification_on_hold($order_id) {

    $msg = 'มีคำสั่งซื้อใหม่ออเดอร์ #' .$order_id;
    $OrderClass = new OrderStatus($order_id);
    $LineNotify = new LineNotify($OrderClass->messageLineNotify($msg));
    $LineNotify->sendLineApi();
}


// #####################   Processing ##########################
add_action('woocommerce_order_status_processing', 'send_line_notification_on_processing', 10, 1);

function send_line_notification_on_processing($order_id) {

    $msg = 'รายการคำสั่งซื้อ #' . $order_id . ' อยู่ในสถานะ processing';
    $OrderClass = new OrderStatus($order_id);
    $LineNotify = new LineNotify($OrderClass->messageLineNotify($msg));
    $LineNotify->sendLineApi();
    
}

// #####################   completed  ##########################
add_action('woocommerce_order_status_completed', 'send_line_notification_on_completed', 10, 1);

function send_line_notification_on_completed($order_id) {
  
    $msg = 'รายการคำสั่งซื้อ #' . $order_id . ' อยู่ในสถานะ completed';
    $OrderClass = new OrderStatus($order_id);
    $LineNotify = new LineNotify($OrderClass->messageLineNotify($msg));
    $LineNotify->sendLineApi();
    
}


// #####################   cancelled ##########################
add_action('woocommerce_order_status_cancelled', 'send_line_notification_on_cancelled', 10, 1);

function send_line_notification_on_cancelled($order_id) {
 
    $msg = 'รายการคำสั่งซื้อ #' . $order_id . ' อยู่ในสถานะ cancelled';
    $OrderClass = new OrderStatus($order_id);
    $LineNotify = new LineNotify($OrderClass->messageLineNotify($msg));
    $LineNotify->sendLineApi();
    
}

add_filter('woocommerce_get_settings_pages', 'add_custom_settings_tab');

function add_custom_settings_tab($settings) {
    $settings[] = include('class-wc-settings-custom-tab.php');
    return $settings;
}

