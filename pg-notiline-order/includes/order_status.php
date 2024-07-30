<?php
class OrderStatus{
    private $order;
    private $orderData = [];
    private $billing = [];
    private $firstName = "";
    private $lastName = "";
    private $address1 = "";
    private $address2 = "";
    private $city = "";
    private $state = "";
    private $postcode = "";
    private $country = "";
    private $email = "";
    private $phone = "";
    private $message = "";

    public function __construct($order_id) {

        $this->order = wc_get_order($order_id);
        $this->decodeJsonOrder();
   }
   

    private function decodeJsonOrder(){
        
        if($this->order){
            $this->order_data = json_decode($this->order , true);
            if(json_last_error() === JSON_ERROR_NONE && isset($this->order_data['billing'])){
                $this->billing = $this->order_data['billing'];
                $this->firstName =  sanitize_text_field($this->billing['first_name']) ?? "";
                $this->lastName =  sanitize_text_field($this->billing['last_name']) ?? "";
                $this->address1 =  sanitize_text_field($this->billing['address_1']) ?? "";
                $this->address2 =  sanitize_text_field($this->billing['address_2']) ?? "";
                $this->city =  sanitize_text_field($this->billing['city']) ?? "";
                $this->state =  sanitize_text_field($this->billing['state']) ?? "";
                $this->postcode = sanitize_text_field($this->billing['postcode']) ?? "";
                $this->country =  sanitize_text_field($this->billing['country']) ?? "";
                $this->email = sanitize_email($this->billing['email']) ?? "";
                $this->phone =  sanitize_text_field($this->billing['phone']) ?? "";
        
            }else {
               
               $errorMessage = json_last_error_msg();
               error_log("JSON Decode Error: $errorMessage");
            }
        }else {
            error_log("Order object is null or invalid.");
        }
        
    }

    public function messageLineNotify($msg){

        $this->message = $msg;
        $this->message .= "\n------- รายละเอียด ------\n";
        $this->message .= 'ชื่อ '.esc_html($this->firstName).' '.esc_html($this->lastName)."\n";
        $this->message .= "ที่อยู่ ".esc_html($this->address1).' '.esc_html($this->address2).' '.esc_html($this->city).' '.esc_html($this->country)." ".esc_html($this->postcode)."\n";
        $this->message .= "เบอร์โทร ".esc_html($this->phone)."\n";
        $this->message .= "อีเมล์ ".esc_html($this->email)."\n";

        return $this->message;
    }




}