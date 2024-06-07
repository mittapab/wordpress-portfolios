<?php
if (!function_exists('qiupid_burger_dropdown_button')) {
    function qiupid_burger_dropdown_button(){
        echo '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>';
    }
    add_action('qiupid_burger_dropdown_button', 'qiupid_burger_dropdown_button');
}

/**
 * Register widget area.
 *
 */
if (!function_exists('qiupid_widgets_init')) {
    function qiupid_widgets_init() {
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'qiupid' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Sidebar 1', 'qiupid' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        if ( class_exists( 'WooCommerce' ) ) {
            register_sidebar( array(
                'name'          => esc_html__( 'WooCommerce sidebar', 'qiupid' ),
                'id'            => 'woocommerce',
                'description'   => esc_html__( 'Used on WooCommerce pages', 'qiupid' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );
        }

        for ( $i = 1; $i <= 6; $i ++ ) {
            register_sidebar(
                array(
                    /* translators: 1: Widget number. */
                    'name'          => sprintf( __( 'Footer Sidebar %d', 'qiupid' ), $i ),
                    'id'            => 'footer-' . $i,
                    'description'   => esc_html__( 'Add widgets here.', 'qiupid' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h3 class="widget-title">',
                    'after_title'   => '</h3>',
                )
            );
        }
    }
    add_action( 'widgets_init', 'qiupid_widgets_init' );
}

/**
 * Register custom sidebars from customizer.
 *
 */
if (!function_exists('qiupid_customizer_sidebars')) {
    function qiupid_customizer_sidebars() {
        if(Qiupid()->get_setting( 'qiupid_general_sidebars') && !empty(Qiupid()->get_setting( 'qiupid_general_sidebars'))) {
            $sidebars_available = Qiupid()->get_setting( 'qiupid_general_sidebars');
            foreach ($sidebars_available as &$value) {
                $id           = str_replace(' ', '', $value['title']);
                $id_lowercase = strtolower($id);
                if ($id_lowercase) {
                    register_sidebar( array(
                        'name'          => esc_html($value['title']),
                        'id'            => esc_html($id_lowercase),
                        'description'   => esc_html($value['title']),
                        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                        'after_widget'  => '</aside>',
                        'before_title'  => '<h3 class="widget-title">',
                        'after_title'   => '</h3>',
                    ) );
                }
            }
        }
    }
    add_action( 'widgets_init', 'qiupid_customizer_sidebars' );
}

/* ========= BLOG CLASSES ===================================== */
if ( ! function_exists( 'qiupid_blog_classes_columns' ) ) {
    add_filter( 'qiupid_blog_classes' , 'qiupid_blog_classes_columns');
    function qiupid_blog_classes_columns($columns) {
        if ( Qiupid()->get_setting('qiupid_blog_archive_layout') == 'no-sidebar' ) {
            $columns = str_replace ( 'col-md-8' , 'col-md-12' , $columns );
        } 
        
        return $columns;
    }
}

if ( ! function_exists( 'qiupid_single_post_classes_columns' ) ) {
    add_filter( 'qiupid_single_post_classes' , 'qiupid_single_post_classes_columns');
    function qiupid_single_post_classes_columns($columns) {
        if ( Qiupid()->get_setting('qiupid_blog_single_layout') == 'no-sidebar' ) {
            $columns = str_replace ( 'col-md-8' , 'col-md-12' , $columns );
        } 
        return $columns;
    }
}

/* ========= PAGINATION ===================================== */
if ( ! function_exists( 'qiupid_pagination' ) ) {
    function qiupid_pagination($query = null) {

        if (!$query) {
            global $wp_query;
            $query = $wp_query;
        }
        
        $big = 999999999; // need an unlikely integer
        $current = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : '1');
        echo paginate_links( 
            array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => '?paged=%#%',
                'current'       => max( 1, $current ),
                'total'         => $query->max_num_pages,
                'prev_text'     => esc_html__('&#171;','qiupid'),
                'next_text'     => esc_html__('&#187;','qiupid'),
            ) 
        );
    }
}

/* ========= BREADCRUMBS ===================================== */
if (!function_exists('qiupid_breadcrumb')) {
    function qiupid_breadcrumb() {
        $delimiter = '';
        //text for the 'Home' link
        $name = esc_html__("Home", "qiupid");
            if (!is_home() && !is_front_page() || is_paged()) {
                global $post;
                global $product;
                $home = home_url();
                echo '<li><a href="' . esc_url($home) . '">' . esc_html($name) . '</a></li> ' . esc_html($delimiter) . '';
            if (is_category()) {
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                    if ($thisCat->parent != 0)
                echo(get_category_parents($parentCat, true, '' . esc_html($delimiter) . ''));
                echo   '<li class="active">' . esc_html(single_cat_title('', false)) .  '</li>';
            } elseif (is_day()) {
                echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a></li> ' . esc_html($delimiter) . '';
                echo '<li><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . get_the_time('F') . '</a></li> ' . esc_html($delimiter) . ' ';
                echo  '<li class="active">' . get_the_time('d') . '</li>';
            } elseif (is_month()) {
                echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a></li> ' . esc_html($delimiter) . '';
                echo  '<li class="active">' . get_the_time('F') . '</li>';
            } elseif (is_year()) {
                echo  '<li class="active">' . get_the_time('Y') . '</li>';
            } elseif (is_attachment()) {
                echo  '<li class="active">';
                the_title();
                echo '</li>';
            } elseif (class_exists( 'WooCommerce' ) && is_shop()) {
                echo  '<li class="active">';
                echo esc_html__('Shop','qiupid');
                echo '</li>';
            }elseif (class_exists('WooCommerce') && is_product()) {
                if (get_the_category()) {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo '<li>' . get_category_parents($cat, true, ' ' . esc_html($delimiter) . '') . '</li>';
                }
                echo  '<li class="active">';
                the_title();
                echo  '</li>';
            }elseif (class_exists('WooCommerce') && is_product_category()) {
                echo  '<li class="active">';
                single_cat_title( '', true );
                echo  '</li>';
            }elseif (class_exists('WooCommerce') && is_product_tag()) {
                echo  '<li class="active">';
                single_tag_title( '', true );
                echo  '</li>';
            } elseif (is_single()) {
                if (get_the_category()) {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo '<li>' . get_category_parents($cat, true, ' ' . esc_html($delimiter) . '') . '</li>';
                }
                echo  '<li class="active">';
                the_title();
                echo  '</li>';
            } elseif (is_page() && !$post->post_parent) {
                echo  '<li class="active">';
                the_title();
                echo  '</li>';
            } elseif (is_page() && $post->post_parent) {
                $parent_id = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a></li>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb)
                    echo  wp_kses($crumb, 'link') . ' ' . esc_html($delimiter) . ' ';
                echo  '<li class="active">';
                the_title();
                echo  '</li>';
            } elseif (is_search()) {
                echo  '<li class="active">' . get_search_query() . '</li>';
            } elseif (is_tag()) {
                echo  '<li class="active">' . single_tag_title( '', false ) . '</li>';
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo  '<li class="active">' . esc_html($userdata->display_name) . '</li>';
            } elseif (is_404()) {
                echo  '<li class="active">' . esc_html__('404 Not Found','qiupid') . '</li>';
            }
            if (get_query_var('paged')) {
                if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                    echo  '<li class="active">';
                echo esc_html__('Page','qiupid') . ' ' . get_query_var('paged');
                if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                    echo  '</li>';
            }
        }
    }
}

/**
 * Returns the selected header on page (custom field)
 */
function qiupid_get_page_header_template(){
    
    if (is_page()) {
        $customizer_header = get_post_meta( get_the_ID(), 'mt_header_custom_variant', true );
        if (isset($customizer_header) && !empty($customizer_header)) {
            return $customizer_header;
        }else{
            return false;
        }
    }else{
        return false;
    }

}

function qiupid_breadcrumbs_alignment() {
    $alignment = Qiupid()->get_setting( 'qiupid_breadcrumbs_alignment' );
    if ($alignment) {
        return 'qiupid-alignment-'.esc_attr($alignment);
    }
}
add_filter( 'qiupid_breadcrumbs_classes', 'qiupid_breadcrumbs_alignment' );



//GET HEADER TITLE/BREADCRUMBS AREA
if (!function_exists('qiupid_header_title_breadcrumbs')) {
    function qiupid_header_title_breadcrumbs(){
        echo '<div class="qiupid-breadcrumbs '.apply_filters('qiupid_breadcrumbs_classes', '').'">';
            echo '<div class="container">';
                echo '<div class="row">';

                    if(!function_exists('bcn_display')){
                        echo '<div class="col-md-12">';
                            echo '<ol class="breadcrumb">';
                                echo qiupid_breadcrumb();
                            echo '</ol>';
                        echo '</div>';
                    } else {
                        echo '<div class="col-md-12">';
                            echo '<div class="breadcrumbs breadcrumbs-navxt" typeof="BreadcrumbList" vocab="https://schema.org/">';
                                echo bcn_display();
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '<div class="col-md-12">';
                        if (is_singular('post')) {
                            echo '<h1>'.get_the_title().'</h1>';
                        }elseif (is_page()) {
                            echo '<h1>'.get_the_title().'</h1>';
                        }elseif (is_singular('product')) {
                            echo '<h2>'.esc_html__( 'Shop', 'qiupid' ) . get_search_query().'</h2>';
                        }elseif (is_search()) {
                            echo '<h1>'.esc_html__( 'Search Results for: ', 'qiupid' ) . get_search_query().'</h1>';
                        }elseif (is_category()) {
                            echo '<h1>'.esc_html__( 'Category: ', 'qiupid' ).' <span>'.single_cat_title( '', false ).'</span></h1>';
                        }elseif (is_tag()) {
                            echo '<h1>'.esc_html__( 'Tag: ', 'qiupid' ) . single_tag_title( '', false ).'</h1>';
                        }elseif (is_author() || is_archive()) {
                            if (function_exists("is_shop") && is_shop()) {
                                echo '<h1>'.esc_html__( 'Shop ', 'qiupid' ).'</h1>';
                            }else{
                                echo '<h1>'.get_the_archive_title().'</h1>';
                            }
                        }elseif (is_home()) {
                            echo '<h1>'.esc_html__( 'From the Blog', 'qiupid' ).'</h1>';
                        }
                        
                    echo'</div>';
                echo'</div>';
            echo'</div>';
        echo'</div>';
    }
    if (Qiupid()->get_setting('qiupid_enable_breadcrumbs') == 1) {
        // Hooks on pages, posts, cart, checkout
        add_action('qiupid_before_main_content','qiupid_header_title_breadcrumbs');
        // Hooks on single product
        add_action('woocommerce_before_main_content','qiupid_header_title_breadcrumbs');
    }
}

function qiupid_breadcrumbs_excludes(){
    $breadcrumbs_on_off = get_post_meta( get_the_ID(), 'mt_breadcrumbs_on_off',true );
    $classes = get_body_class();
    if ( class_exists( "BuddyPress" ) || class_exists('Youzify') ) {
        if (in_array('buddypress',$classes) && !in_array('group-home',$classes) && !in_array('bp-user', $classes) || in_array('profile-edit', $classes)) {
            add_action('qiupid/main/before','qiupid_header_title_breadcrumbs');
        }
    }
    if ( class_exists( "Tribe__Template" )) {
        if (in_array('post-type-archive-tribe_events',$classes) || in_array('single-tribe_events',$classes)) {
            add_action('qiupid/main/before','qiupid_header_title_breadcrumbs');
        }
    }
    if (isset($breadcrumbs_on_off) && $breadcrumbs_on_off == 'no') {
        remove_action('qiupid_before_main_content','qiupid_header_title_breadcrumbs');
    }
}
add_action('wp', 'qiupid_breadcrumbs_excludes');


//* BLOG - Left Sidebar Part*//
if (!function_exists('qiupid_blog_left_sidebar_part')) {
    function qiupid_blog_left_sidebar_part(){
        $sidebar = "sidebar-1";

        if ( Qiupid()->get_setting('qiupid_blog_archive_layout') == 'left-sidebar' && is_active_sidebar( $sidebar )) {
            echo '<div class="col-md-4 sidebar-content">';
                dynamic_sidebar( $sidebar );
            echo '</div>';
        }
    }
}
add_action('qiupid_before_blog_content', 'qiupid_blog_left_sidebar_part');

//* BLOG - Right Sidebar Part*//
if (!function_exists('qiupid_blog_right_sidebar_part')) {
    function qiupid_blog_right_sidebar_part(){
        $sidebar = "sidebar-1";

        if ( Qiupid()->get_setting('qiupid_blog_archive_layout') == 'right-sidebar' && is_active_sidebar( $sidebar )) {
            echo '<div class="col-md-4 sidebar-content sidebar-content-right-side">';
                dynamic_sidebar( $sidebar );
            echo '</div>';
        }
    }
}
add_action('qiupid_after_blog_pagination', 'qiupid_blog_right_sidebar_part');

//* SINGLE POST - Left Sidebar Part*//
if (!function_exists('qiupid_post_left_sidebar_part')) {
    function qiupid_post_left_sidebar_part(){
        $sidebar = "sidebar-1";
        if ( Qiupid()->get_setting('qiupid_blog_single_layout') == 'left-sidebar' ) {
            echo '<div class="col-md-4 sidebar-content sidebar-content-left-side">';
                dynamic_sidebar( $sidebar );
            echo '</div>';
        }
    }
}
add_action('qiupid_before_single_post_content', 'qiupid_post_left_sidebar_part');


//* SINGLE POST - Right Sidebar Part*//
if (!function_exists('qiupid_post_right_sidebar_part')) {
    function qiupid_post_right_sidebar_part(){
        $class = "col-md-8 col-md-offset-2";
        $sidebar = "sidebar-1";
        if ( Qiupid()->get_setting('qiupid_blog_single_layout') == 'right-sidebar' ) {
            echo '<div class="col-md-4 sidebar-content sidebar-content-right-side">';
                dynamic_sidebar( $sidebar );
            echo '</div>';
        }
    }
}
add_action('qiupid_after_post_content', 'qiupid_post_right_sidebar_part');

// Function to handle the thumbnail request
function qiupid_get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}


# Custom Comments
/**
 * Custom comment walker for this theme.
 *
 */

if ( ! class_exists( 'Qiupid_Walker_Comment' ) ) {
    class Qiupid_Walker_Comment extends Walker_Comment {
        /**
         * Outputs a comment in the HTML5 format.
         *
         * @see wp_list_comments()
         * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
         * @see https://developer.wordpress.org/reference/functions/get_comment_author/
         * @see https://developer.wordpress.org/reference/functions/get_avatar/
         * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
         * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
         *
         * @param WP_Comment $comment Comment to display.
         * @param int        $depth   Depth of the current comment.
         * @param array      $args    An array of arguments.
         */
        protected function html5_comment( $comment, $depth, $args ) {

            $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

            ?>
            <<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
                <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                    <div class="comment-meta">
                        <div class="comment-author vcard">
                            <?php
                            $comment_author_url = get_comment_author_url( $comment );
                            $comment_author     = get_comment_author( $comment );
                            $avatar             = get_avatar( $comment, $args['avatar_size'] );
                            if ( 0 !== $args['avatar_size'] ) {
                                if ( empty( $comment_author_url ) ) {
                                    echo get_avatar( $comment, $args['avatar_size'] );
                                } else {
                                    printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url ); 
                                    echo get_avatar( $comment, $args['avatar_size'] );
                                }
                            }

                            printf(
                                '<span class="fn">%1$s</span><span class="screen-reader-text says">%2$s</span>',
                                esc_html( $comment_author ),
                                esc_html__( '', 'qiupid' )
                            );

                            if ( ! empty( $comment_author_url ) ) {
                                echo '</a>';
                            }

                            ?>
                            <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>" class="comment-post-date">
                                <?php
                                /* Translators: 1 = comment date, 2 = comment time */
                                $comment_timestamp = sprintf( esc_html__( '%1$s at %2$s', 'qiupid' ), get_comment_date( '', $comment ), get_comment_time() );
                                ?>
                                <time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo esc_attr( $comment_timestamp ); ?>">
                                     (<?php echo esc_html( $comment_timestamp ); ?>)
                                </time>
                            </a>

                        </div><!-- .comment-author -->
                    </div><!-- .comment-meta -->

                    <div class="comment-content entry-content">
                        <?php
                        comment_text();

                        if ( '0' === $comment->comment_approved ) {
                            ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'qiupid' ); ?></p>
                            <?php
                        }

                        ?>

                    </div><!-- .comment-content -->

                    <?php

                    $comment_reply_link = get_comment_reply_link(
                        array_merge(
                            $args,
                            array(
                                'add_below' => 'div-comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'before'    => '<span class="comment-reply">',
                                'after'     => '</span>',
                            )
                        )
                    );

                    $by_post_author = qiupid_is_comment_by_post_author( $comment );

                    if ( $comment_reply_link || $by_post_author ) {
                        ?>

                        <div class="qiupid-comment-footer-meta">

                            <?php
                            if ( get_edit_comment_link() ) {
                                echo ' <a class="comment-edit-link" href="' . get_edit_comment_link() . '">' . esc_html__( 'Edit', 'qiupid' ) . '</a> ';
                            }
                            
                            if ( $comment_reply_link ) {
                                echo wp_kses($comment_reply_link, 'link'); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Link is escaped in https://developer.wordpress.org/reference/functions/get_comment_reply_link/
                            }
                            ?>

                        </div>

                        <?php
                    }
                    ?>

                </article><!-- .comment-body -->

            <?php
        }
    }
}


/**
 * Check if the specified comment is written by the author of the post commented on.
 *
 * @param object $comment Comment data.
 *
 * @return bool
 */
function qiupid_is_comment_by_post_author( $comment = null ) {
    if ( is_object( $comment ) && $comment->user_id > 0 ) {
        $user = get_userdata( $comment->user_id );
        $post = get_post( $comment->comment_post_ID );
        if ( ! empty( $user ) && ! empty( $post ) ) {
            return $comment->user_id === $post->post_author;
        }
    }
    return false;
}


/**
* Function: Popup 
*/
if ( !function_exists( 'qiupid_popup_modal' ) ) {
    function qiupid_popup_modal() { 
        $user_url   = get_permalink( get_option('woocommerce_myaccount_page_id') );
        $img_id     = get_theme_mod( 'qiupid_popup_image' );
        $image      = Qiupid()->get_media( $img_id, 'full' );

        echo'<div class="popup modeltheme-modal" id="modal-log-in" data-expire="'.esc_attr(Qiupid()->get_setting('qiupid_popup_expiring_cookie')).'" show="'.esc_attr(Qiupid()->get_setting('qiupid_popup_show_time')).'">     

                <div class="mt-popup-wrapper col-md-12" id="popup-modal-wrapper">
                    <div class="dismiss">
                        <a id="exit-popup">x</a>
                    </div>
                    <div class="mt-popup-content-wrapper">';
                        if ( $image ) {
                        echo '<div class="mt-popup-image">
                                <a href="'.esc_url(Qiupid()->get_setting('qiupid_popup_url')).'">
                                    <img src="'.esc_url($image).'" alt="'.esc_attr(get_bloginfo()).'" />
                                </a>
                             </div>';
                        }
                        echo'
                        <div class="mt-popup-content">'.Qiupid()->get_setting('qiupid_popup_content').'</div>
                    </div>          
                </div>
            </div>
            <div class="modeltheme-overlay"></div>';
    }
    if (Qiupid()->get_setting('qiupid_enable_popup') == 1) {
        add_action('qiupid/before-site-content', 'qiupid_popup_modal');
    }

}

/**
* Function: Preloader 
*/
if ( !function_exists( 'qiupid_preloader' ) ) {
    function qiupid_preloader() { 
        $img_id     = get_theme_mod( 'qiupid_preloader_image' );
        $image      = Qiupid()->get_media( $img_id, 'full' );

        echo '<div class="qiupid_preloader_holder">';
            if($image) {
                echo '<img class="preloader_image" src="'.esc_url($image).'" alt="'.esc_attr(get_bloginfo()).'" />';
            }
        echo '</div>';
    }

    if (Qiupid()->get_setting('qiupid_enable_preloader') == 1) {
        add_action('qiupid/before-site-content', 'qiupid_preloader');
    }

}