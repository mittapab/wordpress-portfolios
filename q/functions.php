<?php
/**
 * qiupid functions and definitions
 *
 * @package qiupid
 */


// Include the main Qiupid class.
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/builder/class-theme.php';

function Qiupid() {
    return Qiupid::get_instance();
}
Qiupid();

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'qiupid_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function qiupid_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on qiupid, use a find and replace
         * to change 'qiupid' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'qiupid', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'woocommerce', array(
            'gallery_thumbnail_image_width' => 200,
            'woocommerce_thumbnail' => 768,
        ));
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        remove_theme_support( 'widgets-block-editor' );
        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        /**
         * Support Gutenberg.
         *
         * @since 0.2.6
         */
        add_theme_support( 'align-wide' );
        /**
         * Add editor style support.
         */
        add_theme_support( 'editor-styles' );
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'hb-primary-navigation' => esc_html__( 'Primary Navigation', 'qiupid' ),
            'hb-menu-mobile'        => esc_html__( 'Mobile Navigation', 'qiupid' ),
            'hb-menu-navigation1'   => esc_html__( 'Navigation 1', 'qiupid' ),
            'hb-menu-navigation2'   => esc_html__( 'Navigation 2', 'qiupid' ),
            'hb-category-button'    => esc_html__( 'Category Button', 'qiupid' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

    }
endif; // qiupid_setup
add_action( 'after_setup_theme', 'qiupid_setup' );

/**
 * Enqueue scripts and styles.
 */
if (!function_exists("qiupid_scripts")) {
    function qiupid_scripts() {

        //STYLESHEETS
        wp_enqueue_style( "font-awesome5", get_template_directory_uri()."/assets/vendor/font-awesome/all.min.css", array(), "5.15.4" );
        wp_enqueue_style( "bootstrap", get_template_directory_uri()."/assets/vendor/bootstrap/bootstrap.min.css", array(), "5.0.2" );
        wp_enqueue_style( "qiupid-styles", get_template_directory_uri()."/assets/css/styles.css" );
        wp_enqueue_style( "qiupid-style", get_stylesheet_uri() );
        wp_enqueue_style( "qiupid-gutenberg-frontend", get_template_directory_uri()."/inc/gutenberg/assets/gutenberg-frontend.css" );
        // WooCommerce
        if ( class_exists( "WooCommerce" ) ) {
            wp_enqueue_style( "qiupid-woocommerce", get_template_directory_uri()."/assets/css/compatibility/woocommerce.css" );
        }
        wp_enqueue_style( "select2", get_template_directory_uri()."/assets/vendor/select2/select2.min.css" );
        // BuddyPress/Youzify
        if ( class_exists( "BuddyPress" ) || class_exists('Youzify') ) {
            wp_enqueue_style( "buddypress-youzify", get_template_directory_uri()."/assets/css/compatibility/buddypress-youzify.css" );
        }
        // The Events Calendar
        if ( class_exists( "Tribe__Template" )) {
            wp_enqueue_style( "tribe-events", get_template_directory_uri()."/assets/css/compatibility/tribe-events.css" );
        }
        
        //SCRIPTS
        wp_enqueue_script( "classie", get_template_directory_uri() . "/assets/vendor/classie/classie.js", array("jquery"), "1.0", true );
        wp_enqueue_script( "jquery-sticky", get_template_directory_uri() . "/assets/vendor/jquery-sticky/jquery.sticky.js", array("jquery"), "1.0.0", true );
        wp_enqueue_script( "bootstrap", get_template_directory_uri() . "/assets/vendor/bootstrap/bootstrap.min.js", array("jquery"), "3.3.1", true );
        wp_enqueue_script( "select2", get_template_directory_uri() . "/assets/vendor/select2/select2.min.js", array("jquery"), "4.1.0-rc.0", true );
        // WooCommerce
        if ( class_exists( "WooCommerce" ) ) {
            wp_enqueue_script( "custom-woocommerce", get_template_directory_uri() . "/assets/js/compatibility/custom-woocommerce.js", array("jquery"), "1.0.0", true );
            wp_enqueue_script( "jquery-cookie", get_template_directory_uri() . "/assets/vendor/jquery-cookie/jquery.cookie.min.js", array("jquery"), "1.2", true );
            wp_enqueue_script( "jquery-matchheight", get_template_directory_uri() . "/assets/vendor/jquery-match-height/jquery.matchHeight-min.js", array("jquery"), "0.7.2", true );
        }
        // Custom JS
        wp_enqueue_script( "qiupid-custom", get_template_directory_uri() . "/assets/js/custom.js", array("jquery"), "1.0.0", true );
        if ( is_singular() && comments_open() && get_option( "thread_comments" ) ) {
            wp_enqueue_script( "comment-reply" );
        }


        // slide
        wp_enqueue_style( 'en-css', get_template_directory_uri() . '/enclub.css', array(), '1.0' );
        wp_enqueue_style( 'en-css-animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css', array(), '1.0' );
        wp_enqueue_style( 'en-css-slider', get_template_directory_uri() . '/assets/slider-popup/css/popup-lightbox.css', array(), '1.0' );
        wp_enqueue_script( "en-js-slider", get_template_directory_uri() . "/assets/slider-popup/js/jquery.popup.lightbox.js", array("jquery"), "0.7.2", true );


        // slide gallery
        wp_enqueue_style( 'en-css-gallery-if', get_template_directory_uri() . '/assets/iframe-gallery/NSB_Box.css', array(), '1.0' );
        wp_enqueue_script( "en-js-gallery-if", get_template_directory_uri() . "/assets/iframe-gallery/NSB_Box.js", array("jquery"), "0.7.2", true );


        // en-pic-slide
        //wp_enqueue_style( 'en-css-pic', get_template_directory_uri() . '/assets/en-pic-slide/dist/css/jquery.desoslide.css', array(), '1.0' );
        wp_enqueue_script( "en-js-pic", get_template_directory_uri() . "/assets/en-pic-slide/dist/jquery.terseBanner.min.js", array("jquery"), "0.1.2", true );

        wp_enqueue_style('en-font-awesom-1' , '//cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css',array(), '1.0');
        wp_enqueue_style('en-font-kanit' , '//fonts.googleapis.com/css2?family=Kanit&display=swap',array(), '1.0');
        // wp_enqueue_script('en-script' , '//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',array(), '1.0');
        // wp_enqueue_style('en-boot' , '//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',array(), '1.0');



    }
    add_action( "wp_enqueue_scripts", "qiupid_scripts" );
}

/**
 * Enqueue Editor styles.
 */
function qiupid_add_editor_styles() {
    add_editor_style( 'assets/css/custom-editor-style.css' );
}
add_action( 'admin_init', 'qiupid_add_editor_styles' );


/**
 * Enqueue scripts and styles for admin dashboard.
 */
if (!function_exists('qiupid_enqueue_admin_scripts')) {
    function qiupid_enqueue_admin_scripts( $hook ) {
        wp_enqueue_style( 'qiupid-admin-style', get_template_directory_uri().'/assets/css/admin-style.css' );
    }
    add_action('admin_enqueue_scripts', 'qiupid_enqueue_admin_scripts');
}


function qiupid_get_all_header_parts() {
    $header_parts = array(
        'navigation'   => esc_html__( 'Navigation', 'qiupid' ),
        'cart'         => esc_html__( 'Cart', 'qiupid' ),
        'logo'         => esc_html__( 'Logo', 'qiupid' ),
        'search-form'  => esc_html__( 'Search Form', 'qiupid' ),
        'lang-curr-dropdown' => esc_html__( 'Language & Currency Dropdown', 'qiupid' ),
        'category-menu' => esc_html__( 'Category Menu', 'qiupid' )
    );
    return $header_parts;
}

/* ========= LOAD  ===================================== */
// Include the TGM_Plugin_Activation class.
require get_template_directory().'/inc/tgm/include_plugins.php';
// Theme functions
require get_template_directory() . '/inc/functions-theme.php';
// WooCommerce functions
if (class_exists( 'WooCommerce' )) {
    require get_template_directory() . '/inc/functions-woocommerce.php';
}
// Gutenberg functions
require_once get_template_directory() . '/inc/gutenberg/functions.php';

/* ========= RESIZE IMAGES ===================================== */
add_image_size( 'qiupid_blog_single', 1400, 650, true );


/* ========= SEARCH FOR POSTS ONLY ===================================== */
function qiupid_search_filter($query) {
    if ($query->is_search && !isset($_GET['post_type'])) {
        $query->set('post_type', 'post');
    }
    return $query;
}
if( !is_admin() ){
    add_filter('pre_get_posts','qiupid_search_filter');
}

// KSES ALLOWED HTML
if (!function_exists('qiupid_kses_allowed_html')) {
    function qiupid_kses_allowed_html($tags, $context) {
      switch($context) {
        case 'link': 
            $tags = array( 
                'a' => array(
                    'href' => array(),
                    'class' => array(),
                    'title' => array(),
                    'target' => array(),
                    'rel' => array(),
                    'data-commentid' => array(),
                    'data-postid' => array(),
                    'data-belowelement' => array(),
                    'data-respondelement' => array(),
                    'data-replyto' => array(),
                    'aria-label' => array(),
                ),
                'img' => array(
                    'src' => array(),
                    'alt' => array(),
                    'style' => array(),
                    'height' => array(),
                    'width' => array(),

                ),
            );
            return $tags;
        break;

        case 'icon':
            $tags = array(
                'i' => array(
                    'class' => array(),
                ),
            );
            return $tags;
        break;
        
        default: 
            return $tags;
      }
    }
    add_filter( 'wp_kses_allowed_html', 'qiupid_kses_allowed_html', 10, 2);
}


/* search */
if (!function_exists('qiupid_search_form_ajax_fetch')) {
    add_action( 'wp_footer', 'qiupid_search_form_ajax_fetch' );
    function qiupid_search_form_ajax_fetch() { ?>
        <script type="text/javascript">
            function qiupid_fetch_products(){
                jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    data: { 
                        action: 'qiupid_search_form_data_fetch', 
                        keyword: jQuery('.search-keyword').val(),
                        category_slug: jQuery('.search-form-product select option:selected').val()
                    },
                    success: function(data) {
                        jQuery('.data_fetch').html( data );
                    }
                });
            }
        </script>
    <?php
    }
}


// the ajax function
if (!function_exists('qiupid_search_form_data_fetch')) {
    add_action('wp_ajax_qiupid_search_form_data_fetch', 'qiupid_search_form_data_fetch');
    add_action('wp_ajax_nopriv_qiupid_search_form_data_fetch', 'qiupid_search_form_data_fetch');
    function qiupid_search_form_data_fetch(){
        if (  esc_attr( $_POST['keyword'] ) == null ) { 
            die(); 
        }
        if ($_POST['category_slug'] != '') {
            $the_query = new WP_Query( 
                array( 
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'post_per_page' => get_option('posts_per_page'),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => esc_attr($_POST['category_slug']), 
                        ),
                    ),
                    's' => esc_attr( $_POST['keyword']) 
                ) 
            );
        }else{
            $the_query = new WP_Query( 
                array( 
                    'post_type'=> 'product',
                    'post_per_page' => get_option('posts_per_page'),
                    's' => esc_attr( $_POST['keyword']) 
                ) 
            );
        }

        if( $the_query->have_posts() ) : ?>
            <ul class="search-result">           
                <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>   
                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'qiupid_post_widget_pic70x70' ); ?>             
                    <li>
                        <a href="<?php echo esc_url( get_permalink() ); ?>">
                            <?php if($thumbnail_src) { ?>
                                <?php the_post_thumbnail( 'qiupid_post_widget_pic70x70' ); ?>
                            <?php } ?>
                            <?php the_title(); ?>
                        </a>
                    </li>             
                <?php endwhile; ?>
            </ul>       
            <?php wp_reset_postdata();  
        else :
            ?>
            <ul class="search-result">           
                <li><?php echo esc_html__('No products were found.', 'qiupid'); ?></li>
            </ul>
        <?php 
        endif;

        die();
    }
}


// function custom_post_type_enclubs() {
//     $labels = array(
//         'name'                  => 'Enclubs',
//         'singular_name'         => 'Enclub',
//         'menu_name'             => 'Enclubs',
//         'all_items'             => 'All Enclubs',
//         'add_new'               => 'Add New',
//         'add_new_item'          => 'Add New Enclub',
//         'edit_item'             => 'Edit Enclub',
//         'new_item'              => 'New Enclub',
//         'view_item'             => 'View Enclub',
//         'search_items'          => 'Search Enclubs',
//         'not_found'             => 'No Enclubs found',
//         'not_found_in_trash'    => 'No Enclubs found in Trash',
//         'parent_item_colon'     => 'Parent Enclub:',
//         'menu_icon'             => 'dashicons-groups', // ไอคอนของเมนู, ดูไอคอนที่นี่: https://developer.wordpress.org/resource/dashicons/
//         'public'                => true,
//         'has_archive'           => true,
//         'rewrite'               => array('slug' => 'enclubs'), // รูปแบบ URL สำหรับหน้า archive
//         'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'), // คุณสมบัติที่รองรับ
//         'taxonomies'            => array('category', 'post_tag'), // หมวดหมู่และแท็กที่ให้ support
//     );

//     $args = array(
//         'labels'                => $labels,
//         'public'                => true,
//         'hierarchical'          => false,
//         'show_ui'               => true,
//         'show_in_menu'          => true,
//         'menu_position'         => 5,
//         'menu_icon'             => 'dashicons-groups', // ไอคอนในเมนูหลัก
//         'show_in_admin_bar'     => true,
//         'show_in_nav_menus'     => true,
//         'can_export'            => true,
//         'has_archive'           => true,
//         'exclude_from_search'   => false,
//         'publicly_queryable'    => true,
//         'rewrite'               => array('slug' => 'enclubs'), // รูปแบบ URL
//         'capability_type'       => 'post',
//         'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'), // คุณสมบัติที่รองรับ
//         'taxonomies'            => array('category', 'post_tag'), // หมวดหมู่และแท็กที่ให้ support
//     );

//     register_post_type('enclubs', $args);
// }

// // เพิ่ม Action เพื่อให้ลงทะเบียน Custom Post Type เมื่อ WordPress เริ่มทำงาน
// add_action('init', 'custom_post_type_enclubs');