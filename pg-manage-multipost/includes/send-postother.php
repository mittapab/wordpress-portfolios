<?php
add_action( 'admin_menu', 'misha_add_metabox' );

function misha_add_metabox() {

	add_meta_box(
		'misha_metabox', // metabox ID
		'Duplicate Content for Other Website', // title
		'misha_metabox_callback', // callback function
		'post', // add meta box to custom post type (or post types in array)
		'normal', // position (normal, side, advanced)
		'default' // priority (default, low, high, core)
	);

}

// it is a callback function which actually displays the content of the meta box
function misha_metabox_callback( $post ) {

	global $wpdb;

	$preapre_query = $wpdb->prepare("SELECT * FROM manage_multisite");
	$results = $wpdb->get_results($preapre_query);

	// $seo_title = get_post_meta( $post->ID, 'seo_title', true );
    $seo_robots = get_post_meta( $post->ID, 'seo_robots', true );

	// nonce, actually I think it is not necessary here
	wp_nonce_field( 'somerandomstr', '_mishanonce' );

    if($results){
		$site_array_id = array();
		$data = json_decode(json_encode($results), true);
		$i = 0;

		while($i < count($data)){
			$multisite_id[$i] = $data[$i]['multisite_id'];
			$multisite_name_web[$i] = $data[$i]['multisite_name_web'];
			$multisite_name_site[$i] = $data[$i]['multisite_name_site'];
			$multisite_username[$i] = $data[$i]['multisite_username'];
			$multisite_key_token[$i] = $data[$i]['multisite_key_token'];

		    //echo '&nbsp;<input type="checkbox" value="'.$multisite_id[$i].'"' . selected( 'index,follow', $seo_robots, false ) . ' name="'.$site_array_id[$i].'"> '.$multisite_name_web[$i].'  
			echo '&nbsp;<input id="name_id" name="name_id[]" type="checkbox" value="'.$multisite_id[$i].'" > '.$multisite_name_web[$i].'';

		  $i++;
		}
	}

	
}


add_action( 'save_post', 'misha_save_meta', 10, 2 );
// or add_action( 'save_post_{post_type}', 'misha_save_meta', 10, 2 );

function misha_save_meta( $post_id, $post ) {


	// nonce check
	if ( ! isset( $_POST[ '_mishanonce' ] ) || ! wp_verify_nonce( $_POST[ '_mishanonce' ], 'somerandomstr' ) ) {
        echo "sdsdssdd";

		return $post_id;
	}

	// check current user permissions
	$post_type = get_post_type_object( $post->post_type );

	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return $post_id;
	}

	// Do not save the data if autosave
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

	// define your own post type here
	if( 'post' !== $post->post_type ) {
		return $post_id;
	}

	if( isset( $_POST['name_id'] ) ) {//seo_robots
		// echo"<script> console.log(".$_POST['name_id'].".toString())</script>";
		//update_post_meta( $post_id, 'seo_robots', sanitize_text_field( $_POST[ 'seo_robots' ] ) );

                    $login = 'root';
                    $password = 'o2pt a9um 5f4z 5ARU cUg1 CgU0';
                    
                    $request_args = array(
                    'method'      => 'POST', 
                    'headers'     => array(
                        'Content-Type' => 'application/json', 
                        'Authorization' => 'Basic '.base64_encode( "$login:$password" ) 
                    ),
                    'body'        => json_encode(array(
                        'title'   => $post->post_title,
                        'status'  => 'draft',
                        'content' => $post->post_content
                    )),
                    'timeout'     => 45, 
                    'redirection' => 5, 
                    'blocking'    => true, 
                    'sslverify'   => false, 
                    );
        
                    // ทำการรีเควสต์
                    $response = wp_remote_post('http://localhost/sitewp-2/wordpress/wp-json/wp/v2/posts', $request_args);
        
                    // ตรวจสอบว่ารีเควสต์สำเร็จหรือไม่
                    if (is_wp_error($response)) {
                    echo 'เกิดข้อผิดพลาด: ' . $response->get_error_message();
                    } else {
                    // ดึงข้อมูลจากการตอบกลับ
                    $response_body = wp_remote_retrieve_body($response);
                    echo 'การตอบกลับ: Success';
                    // echo "<pre>";
					// print_r($_POST['name_id']);
					// echo "</pre>";
        
                    }
                }

	return $post_id;

}


