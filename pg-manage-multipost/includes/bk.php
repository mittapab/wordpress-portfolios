<?php
function delete_row() {
    $id = explode('_', sanitize_text($_POST['element_id']));
    if (wp_verify_nonce($id[2], $id[0] . '_' . $id[1])) {
        $table = 'manage_multisite';
        $wpdb->delete( $table, array( 'multisite_id' => 1 ) );
        echo json_encode($_POST['element_id']);
        die;
    } else {
        echo 'Nonce not verified';
        die;
    }

}

add_action('wp_ajax_your_delete_action', 'delete_row');
add_action( 'wp_ajax_nopriv_your_delete_action', 'delete_row');


// global $wpdb;
// $wpdb->query( 
//     $wpdb->prepare("
//          DELETE FROM $wpdb->postmeta
//          WHERE post_id = %d
//          AND meta_key = %s
//         ",
//             13, 'stars'
//         )
// );

// function ratings_fansub_create() {

//     global $wpdb;
//     $table_name = $wpdb->prefix. "ratings_fansub";
//     global $charset_collate;
//     $charset_collate = $wpdb->get_charset_collate();
//     global $db_version;

//     if( $wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") !=  $table_name)
//     {   $create_sql = "CREATE TABLE " . $table_name . " (
//             ratings_fansub_id INT(11) NOT NULL auto_increment,
//             ratings_fansub_postid INT(11) NOT NULL ,
//             ratings_fansub_posttitle TEXT NOT NULL,
//             ratings_fansub_rating INT(2) NOT NULL,
//             ratings_fansub_timestamp VARCHAR(15) NOT NULL,
//             ratings_fansub_ip VARCHAR(40) NOT NULL ,
//             ratings_fansub_host VARCHAR(200) NOT NULL,
//             ratings_fansub_username VARCHAR(50) NOT NULL,
//             ratings_fansub_userid int(10) NOT NULL default '0',
//             PRIMARY KEY (ratings_fansub_id))$charset_collate;";
//     }
//     require_once(ABSPATH . "wp-admin/includes/upgrade.php");
//     dbDelta( $create_sql );




//     //register the new table with the wpdb object
//     if (!isset($wpdb->ratings_fansub))
//     {
//         $wpdb->ratings_fansub = $table_name;
//         //add the shortcut so you can use $wpdb->stats
//         $wpdb->tables[] = str_replace($wpdb->prefix, '', $table_name);
//     }

// }
// add_action( 'init', 'ratings_fansub_create');

add_action( 'admin_menu', 'misha_add_metabox' );
// or add_action( 'add_meta_boxes', 'misha_add_metabox' );
// or add_action( 'add_meta_boxes_{post_type}', 'misha_add_metabox' );

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

	// $seo_title = get_post_meta( $post->ID, 'seo_title', true );
    $seo_robots = get_post_meta( $post->ID, 'seo_robots', true );

	// nonce, actually I think it is not necessary here
	wp_nonce_field( 'somerandomstr', '_mishanonce' );

	// echo '<table class="form-table">
	// 	<tbody>
	// 		<tr>
	// 			<th><label for="seo_title">SEO title</label></th>
	// 			<td><input type="text" id="seo_title" name="seo_title" value="' . esc_attr( $seo_title ) . '" class="regular-text"></td>
	// 		</tr>
	// 		<tr>
	// 			<th><label for="seo_tobots">SEO robots</label></th>
	// 			<td>
	// 				<select id="seo_robots" name="seo_robots">
	// 					<option value="">Select...</option>
	// 					<option value="index,follow"' . selected( 'index,follow', $seo_robots, false ) . '>Show for search engines</option>
	// 					<option value="noindex,nofollow"' . selected( 'noindex,nofollow', $seo_robots, false ) . '>Hide for search engines</option>
	// 				</select>
	// 			</td>
	// 		</tr>
	// 	</tbody>
	// </table>';

    
	echo '<table class="form-table">
		<tbody>
			<tr>
				<th><label for="seo_tobots">Select Website For Duplicate</label></th>
				<td>
					<select id="seo_robots" name="seo_robots">
						<option value="">Select...</option>
						<option value="index,follow"' . selected( 'index,follow', $seo_robots, false ) . '>Show for search engines</option>
						<option value="noindex,nofollow"' . selected( 'noindex,nofollow', $seo_robots, false ) . '>Hide for search engines</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>';
	
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

	if( isset( $_POST[ 'seo_robots' ] ) ) {
		update_post_meta( $post_id, 'seo_robots', sanitize_text_field( $_POST[ 'seo_robots' ] ) );
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
        
        
                    }
                }
	// } else {
	// 	delete_post_meta( $post_id, 'seo_title' );
	// }
	// if( isset( $_POST[ 'seo_robots' ] ) ) {
	// 	update_post_meta( $post_id, 'seo_robots', sanitize_text_field( $_POST[ 'seo_robots' ] ) );
	// } else {
	// 	delete_post_meta( $post_id, 'seo_robots' );
	// }

	return $post_id;

}


// $seo_title = isset( $_POST[ 'seo_title' ] ) ? sanitize_text_field( $_POST[ 'seo_title' ] ) : '';
// update_post_meta( $post_id, 'seo_title', $seo_title );




	// if($results){
	// 	$site_array_id = array();
	// 	$data = json_decode(json_encode($results), true);
	// 	$i = 0;

	// 	while($i < count($data)){
	// 		$multisite_id[$i] = $data[$i]['multisite_id'];
	// 		$multisite_name_web[$i] = $data[$i]['multisite_name_web'];
	// 		$multisite_name_site[$i] = $data[$i]['multisite_name_site'];
	// 		$multisite_username[$i] = $data[$i]['multisite_username'];
	// 		$multisite_key_token[$i] = $data[$i]['multisite_key_token'];

	// 	    //echo '&nbsp;<input type="checkbox" value="'.$multisite_id[$i].'"' . selected( 'index,follow', $seo_robots, false ) . ' name="'.$site_array_id[$i].'"> '.$multisite_name_web[$i].'  
	// 		echo '&nbsp;<input type="checkbox" value="'.$multisite_id[$i].'" name="site_array_id[]"> '.$multisite_name_web[$i].'  
	// 		';

	// 	  $i++;
	// 	}
	// }