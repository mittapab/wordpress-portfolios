<?php 
defined( 'ABSPATH' ) || exit;

/*
 * Return fallback plugin version by slug
 * @param string plugin_slug
 * @return string plugin version by slug
 */
function qiupid_fallback_plugin_version($plugin_slug = ''){
	$plugins = array(
	    "modeltheme-framework-qiupid" => "1.2",
	    "js_composer" => "6.9.0",
	    "revslider" => "6.6.10",
	    "modeltheme-addons-for-wpbakery" => "1.5.1",
	);

	return $plugins[$plugin_slug];
}


/*
 * Return plugin version by slug from remote json
 * @param string plugin_slug
 * @return string plugin version by slug
 */
function qiupid_plugin_version($plugin_slug = ''){
    // check if the transient did not expire
    if(($value = get_transient( $plugin_slug."_cache" )) === false) {
        
        $request = wp_remote_get('https://modeltheme.com/json/plugin_versions.json');
        $plugin_versions = json_decode(wp_remote_retrieve_body($request), true);

        // save to cache and return
        set_transient($plugin_slug."_cache",$plugin_versions,3600);

        return qiupid_fallback_plugin_version($plugin_slug);
    }

    // return from cache
    return $value[0][$plugin_slug];
}


/* THEME DEFAULTS*/
if (!function_exists('qiupid_set_theme_defaults')) {
	function qiupid_set_theme_defaults() {
	    // Get Theme Defaults
	    $request = wp_remote_get(get_template_directory_uri().'/inc/default.json');
	    $json = wp_remote_retrieve_body($request);
	    $json_array = maybe_unserialize($json);

	    // Get Theme Option
	    $theme = wp_get_theme();
	    $theme_name = strtolower($theme->stylesheet);

	    $theme_option = 'theme_mods_'.esc_attr($theme_name).'';

	    update_option($theme_option, $json_array);
	}
	if(! get_option('qiupid_theme_activated')) {
		add_action('after_setup_theme', 'qiupid_set_theme_defaults');
		add_option( 'qiupid_theme_activated', '1' );
	} else {
		add_action( 'after_switch_theme', 'qiupid_set_theme_defaults' );
	}
}


/**
CUSTOM HEADER FUNCTIONS
*/
// Add specific CSS class by filter
if (!function_exists('qiupid_body_class')) {
    function qiupid_body_class( $classes ) {
        // CHECK IF FEATURED IMAGE IS FALSE(Disabled)
        $post_featured_image = '';
        if (is_single()) {
            if (Qiupid()->get_setting('qiupid_blog_single_featured_image') == 0) {
                $post_featured_image = 'hide_post_featured_image';
            }else{
                $post_featured_image = '';
            }
        }

        // CHECK IF THE NAV IS STICKY
        $is_nav_sticky = '';
        if (Qiupid()->get_setting( 'qiupid_is_nav_sticky')) {
            $is_nav_sticky = 'qiupid_is_nav_sticky';
        }else{
            $is_nav_sticky = '';
        }

        //DEFAULT DROPDOWN
        $dropdown_variant = 'menu_sidebar_dropdown';


        //TRANSPARENT HEADER
        $is_transparent = '';
        if (is_page()) {
            $mt_header_custom_transparent = get_post_meta( get_the_ID(), 'mt_metabox_header_transparent', true );
            $is_transparent = '';
            if (isset($mt_header_custom_transparent) AND $mt_header_custom_transparent == 'yes') {
                $is_transparent = 'is_transparent';
            } else if (Qiupid()->get_setting( 'qiupid_general_settings_look_htransparent')) {
            	$is_transparent = 'is_transparent';
            }
        }else{
			if (Qiupid()->get_setting( 'qiupid_general_settings_look_htransparent')) {
            	$is_transparent = 'is_transparent';
            }
        }
        
        $mt_footer_row_main_status = '';
        $mt_footer_bottom_bar = '';
        
        $mt_footer_row_main_status = get_post_meta( get_the_ID(), 'mt_footer_row_main_status', true );
        $mt_footer_bottom_bar = get_post_meta( get_the_ID(), 'mt_footer_bottom_bar', true );

        if (isset($mt_footer_row_main_status) && !empty($mt_footer_row_main_status)) {
            $mt_footer_row_main_status = 'hide-footer-row-1';
        }
        if (isset($mt_footer_bottom_bar) && !empty($mt_footer_bottom_bar)) {
            $mt_footer_bottom_bar = 'hide-footer-bottom';
        }


        $classes[] = esc_attr($mt_footer_row_main_status) . ' ' . esc_attr($mt_footer_bottom_bar) . '  ' . esc_attr($is_nav_sticky) . ' ' . esc_attr($is_transparent) . ' ' . esc_attr($dropdown_variant) . ' ' . esc_attr($post_featured_image) . ' ';

        return $classes;
    }
    add_filter( 'body_class', 'qiupid_body_class' );
}


/**
||-> Styling Settings
*/
if (!function_exists('qiupid_get_customizer_buttons_styling')) {
	function qiupid_get_customizer_buttons_styling(){
		$qiupid_buttons = '';
		$qiupid_buttons .= '
		a.wp-block-button__link,
		.woocommerce #respond input#submit,.woocommerce #respond input#submit.alt,
		.woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce #respond input#submit, .woocommerce a.button, body.woocommerce button.button, .woocommerce input.button, input[type="button"]:not(.qty_button), input[type="submit"], input[type="reset"], .woocommerce button[type="submit"]:not(button.search-submit), .qiupid-article-inner .qiupid-more-link, .menu-search .btn.btn-primary, .form-submit input[type="submit"],.woocommerce a.added_to_cart, .woocommerce.single-product .button, button.woocommerce button.button, .woocommerce button.button.alt,.wp-block-search .wp-block-search__button, .woocommerce #respond input#submit, .wp-block-search .wp-block-search__button,.qiupid-article-inner .qiupid-more-link, .woocommerce a.button:hover, .menu-search .btn.btn-primary,.form-submit input[type="submit"],button.woocommerce button.button,.woocommerce button.button.alt, body.woocommerce #respond input#submit, .woocommerce a.button.alt, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt[disabled]:disabled, .post-password-form input[type="submit"], a.vc_button_404, a.vc_button_404:visited, .comment-form .form-submit .submit, .bps-form div button, .tribe-events .tribe-events-c-search__button';
		return $qiupid_buttons;
	}
}
if (!function_exists('qiupid_get_customizer_buttons_hover_styling')) {
	function qiupid_get_customizer_buttons_hover_styling(){
		$qiupid_buttons_hover = '';
		$qiupid_buttons_hover .= '
		a.wp-block-button__link:hover,
		.wp-block-button.is-style-outline .wp-block-button__link:hover,
		.woocommerce #respond input#submit:hover,.woocommerce #respond input#submit.alt:hover,
		.woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, input[type="button"]:not(.qty_button):hover, input[type="submit"]:hover, input[type="reset"]:hover, .woocommerce a.added_to_cart:hover, body .woocommerce button[type="submit"]:hover, .woocommerce.single-product .button:hover, .woocommerce button.button.alt:hover, .qiupid-article-inner .qiupid-more-link:hover,.form-submit input:hover,.wp-block-search .wp-block-search__button:hover,.woocommerce a.button:hover,body.woocommerce button.button:hover, body.woocommerce button.button.alt:hover, body.woocommerce #respond input#submit:hover, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt[disabled]:disabled:hover, .woocommerce a.button.alt:hover, .post-password-form input[type="submit"]:hover, a.vc_button_404:hover, a.vc_button_404:visited:hover, .comment-form .form-submit .submit:hover, .bps-form div button:hover, .tribe-events .tribe-events-c-search__button:hover';
		return $qiupid_buttons_hover;
	}
}
if (!function_exists('qiupid_get_customizer_fields_styling')) {
	function qiupid_get_customizer_fields_styling(){
		$qiupid_fields = '';
		$qiupid_fields .= '.woocommerce .woocommerce-ordering span.select2-selection, .woocommerce form .form-row .select2-container .select2-selection--single, .select2-container--default .select2-selection--single, input[type="color"], input[type="date"], input[type="datetime-local"], input[type="email"], input[type="month"], input[type="number"], input[type="password"], input[type="search"]:not(.search-field), input[type="tel"], input[type="text"], input[type="time"], input[type="url"], input[type="week"], textarea,.woocommerce form .form-row textarea, #signup-modal-content .woocommerce-form-register.register .button[type=\'submit\'],#signup-modal-content .woocommerce-form-register.register .button[type=submit],#signup-modal-content .woocommerce-form-register.register input[type=email],#signup-modal-content .woocommerce-form-register.register input[type=password],#signup-modal-content .woocommerce-form-register.register input[type=tel],#signup-modal-content .woocommerce-form-register.register input[type=text],#signup-modal-content .woocommerce-form-register.register textarea,.category-button a,.comment-form textarea,.content-area .dokan-seller-search-form .dokan-w4 input[type=search],.dokan-btn,.dokan-settings-content .dokan-settings-area .dokan-form-control,.menu-search,.modeltheme-modal button[type=submit],.modeltheme-modal input.email,.modeltheme-modal input[type=email],.modeltheme-modal input[type=password],.modeltheme-modal input[type=submit],.modeltheme-modal input[type=text],.nav-next a,.nav-previous a,.newsletter-footer .email,.newsletter-footer input.submit,.newsletter-footer.light .email,.no-results label input, .pagination .page-numbers,.pagination-wrap ul.pagination>li>a,.post-password-form input[type=password],.product-badge,.products span.winning,.sale_banner_right span.read-more,.social-shareer a,.testimonail01-content, .wc-social-login a.ywsl-social::after,.wc_vendors_active form input[type=submit],.wcv-dashboard-navigation li a,.widget_search .search-field,.woocommerce .woocommerce-ordering select, .woocommerce .woocommerce-widget-layered-nav-dropdown__submit.woocommerce div.product form.cart .variations select,.wp-block-archives select, .wp-block-categories-dropdown select, .woocommerce form .form-row input.input-text,.woocommerce form .form-row select,.woocommerce form .form-row textarea, .woocommerce nav.woocommerce-pagination ul li a,.woocommerce nav.woocommerce-pagination ul li span,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce.single-product .wishlist-container a.button,.woocommerce.single-product .wishlist-container a.button[data-tooltip]:before,.woocommerce.widget_product_search .search-field,.wp-block-search .wp-block-search__input, a#register-modal,a.add-wsawl.sa-watchlist-action,a.dokan-btn,a.remove-wsawl.sa-watchlist-action,body .woocommerce ul.products li.product .onsale,button.single_add_to_cart_button.button.alt[data-tooltip]:before,form#login .register_button,form#login .submit_button,input#order_date_filter,input[type=submit].dokan-btn,table.compare-list .add-to-cart td a,table.my_account_orders tbody tr td.order-actions a.button, .woocommerce .woocommerce-ordering .nice-select, .comment-form input:not(input[type="checkbox"]), .header-search_icon-item .search-field, .widget_categories select, .widget_text select, .widget_archive select,.select2.select2-container .select2-selection--single, .wpcf7 form.invalid .wpcf7-response-output, .bps-form select';
		return $qiupid_fields;
	}
}

if (!function_exists('qiupid_get_customizer_fields_styling_focus')) {
	function qiupid_get_customizer_fields_styling_focus(){
		$qiupid_fields_focus = '';
		$qiupid_fields_focus .= '.comment-form input:not(input[type="checkbox"]):focus,.woocommerce form .form-row textarea:focus, textarea:focus, input[type="color"]:focus, input[type="date"]:focus, input[type="search"]:focus, input[type="datetime-local"]:focus, input[type="email"]:focus, input[type="month"]:focus, input[type="number"]:focus, input[type="password"]:focus, input[type="search"]:not(.search-field):focus, input[type="tel"]:focus, input[type="text"]:focus, textarea:focus, input[type="time"]:focus, input[type="url"]:focus, input[type="week"]:focus, textarea:focus, .woocommerce-cart table.cart td.actions .coupon .input-text:focus, .woocommerce form .form-row input.input-text:focus, .select2-container--default .select2-selection--single:focus, .woocommerce.widget_product_search .search-field:focus, .header-search_box-item .header-search-form .search-field:focus, .wpcf7-form input:focus';
		return $qiupid_fields_focus;
	}
}


/**
 * Minifying the CSS
 */
function qiupid_minify_css($css){
  $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
  return $css;
}

/**
||-> FUNCTION: GET DYNAMIC CSS
*/
if (!function_exists('qiupid_dynamic_css')) {
	add_action('wp_enqueue_scripts', 'qiupid_dynamic_css' );
	function qiupid_dynamic_css(){

		wp_register_style( 'qiupid-custom-style', false );
		wp_enqueue_style( 'qiupid-custom-style' );

	    $html = '';
	    // Custom fields styling: Skin Color
	    if (is_page()) {
			$mt_global_page_color = get_post_meta( get_the_ID(), 'mt_global_page_color', true );
			$mt_global_page_color_hover = get_post_meta( get_the_ID(), 'mt_global_page_color_hover', true );
			if ((isset($mt_global_page_color) && $mt_global_page_color != '') && (isset($mt_global_page_color_hover) && $mt_global_page_color_hover != '')) {
				$qiupid_style_main_backgrounds_color = $mt_global_page_color;
				$qiupid_style_main_backgrounds_color_hover = $mt_global_page_color_hover;
			}else{
				$qiupid_style_main_backgrounds_color = Qiupid()->get_setting('qiupid_styling_settings_main_bg_color');
				$qiupid_style_main_backgrounds_color_hover = Qiupid()->get_setting('qiupid_styling_settings_main_bg_color_hover');
			}
			
	   	}else{
			$qiupid_style_main_backgrounds_color = Qiupid()->get_setting('qiupid_styling_settings_main_bg_color');
			$qiupid_style_main_backgrounds_color_hover = Qiupid()->get_setting('qiupid_styling_settings_main_bg_color_hover');
	   	}

	    // Custom fields styling: header main
    	$mt_header_nav_links_color = get_post_meta( get_the_ID(), 'mt_header_nav_links_color', true );
    	if (isset($mt_header_nav_links_color) && !empty($mt_header_nav_links_color)) {
		    $html .= 'body .nav-menu-desktop .menu>li>a, body .header-search_icon-item svg, .builder-item--my_account i, .builder-item--my_cart i, .builder-item--wishlist i, body .header--row:not(.header--transparent) .menu-mobile-toggle, body .header--row .builder-item--burger-menu .hamburger, body .is-size-mobile-medium .hamburger .hamburger-inner, body .is-size-mobile-medium .hamburger .hamburger-inner::after, body .is-size-mobile-medium .hamburger .hamburger-inner::before{
		    	color: '.esc_attr($mt_header_nav_links_color).';
		    }';
    	}
    	$mt_header_nav_links_color_hover = get_post_meta( get_the_ID(), 'mt_header_nav_links_color_hover', true );
    	if (isset($mt_header_nav_links_color_hover) && !empty($mt_header_nav_links_color_hover)) {
		    $html .= 'body .nav-menu-desktop .menu>li>a:hover, body .header-search_icon-item svg:hover, .builder-item--my_account i:hover, body .header--row:not(.header--transparent) .menu-mobile-toggle:hover, .header--row .builder-item--burger-menu .hamburger:hover{
		    	color: '.esc_attr($mt_header_nav_links_color_hover).';
		    }';
    	}

    	// Custom Header Background (TOP)
    	$mt_header_top_custom_background = get_post_meta( get_the_ID(), 'mt_header_top_custom_background', true );
    	if (isset($mt_header_top_custom_background) && !empty($mt_header_top_custom_background)) {
		    $html .= 'body header.header-v2 .top-header, body header .top-header{
		    	background-color: '.esc_attr($mt_header_top_custom_background).';
		    }';
    	}

    	// Custom Header Background (MAIN)
    	$mt_header_main_custom_background = get_post_meta( get_the_ID(), 'mt_header_main_custom_background', true );
    	if (isset($mt_header_main_custom_background) && !empty($mt_header_main_custom_background)) {
		    $html .= 'body .header-main{
		    	background-color: '.esc_attr($mt_header_main_custom_background).';
		    }';
    	}

    	// Custom Header Background (MAIN/STICKY)
    	$mt_header_main_custom_background_sticky = get_post_meta( get_the_ID(), 'mt_header_main_custom_background_sticky', true );
    	if (isset($mt_header_main_custom_background_sticky) && !empty($mt_header_main_custom_background)) {
		    $html .= 'body .is-sticky .header-main{
		    	background-color: '.esc_attr($mt_header_main_custom_background_sticky).';
	    	    box-shadow: 0px 0px 15px -1px rgb(0 0 0 / 15%);
		    }';
    	}

    	// Custom Footer Background color/bg
    	$mt_footer_bg_image = get_post_meta( get_the_ID(), 'mt_footer_bg_image', true );
    	if (isset($mt_footer_bg_image) && !empty($mt_footer_bg_image)) {
		    $html .= '#page footer.site-footer{
		    	background-image: url('.esc_attr($mt_footer_bg_image).');
		    	background-repeat: no-repeat;
		    	background-size: cover;
		    	background-position: center;
		    }';
    	}
    	$mt_footer_bg_color = get_post_meta( get_the_ID(), 'mt_footer_bg_color', true );
    	if (isset($mt_footer_bg_color) && !empty($mt_footer_bg_color)) {
		    $html .= '#page footer.site-footer{
		    	background-color: '.esc_attr($mt_footer_bg_color).';
		    }';
    	}
    	$mt_footer_headings_color = get_post_meta( get_the_ID(), 'mt_footer_headings_color', true );
    	if (isset($mt_footer_headings_color) && !empty($mt_footer_headings_color)) {
		    $html .= 'body .footer--row-inner .widget-title{
		    	color: '.esc_attr($mt_footer_headings_color).';
		    }';
    	}
    	$mt_footer_texts_color = get_post_meta( get_the_ID(), 'mt_footer_texts_color', true );
    	if (isset($mt_footer_texts_color) && !empty($mt_footer_texts_color)) {
		    $html .= 'footer .menu .menu-item a, body footer .textwidget > p, body footer .textwidget a, body footer .textwidget span{
			    	color: '.esc_attr($mt_footer_texts_color).' !important;
			    }';
    	}
    	$mt_footer_texts_color_hover = get_post_meta( get_the_ID(), 'mt_footer_texts_color_hover', true );
    	if (isset($mt_footer_texts_color_hover) && !empty($mt_footer_texts_color_hover)) {
		    $html .= 'footer .menu .menu-item a:hover{
		    	color: '.esc_attr($mt_footer_texts_color_hover).' !important;
		    }';
    	}
    	$mt_footer_bottom_border = get_post_meta( get_the_ID(), 'mt_footer_bottom_border', true );
    	if (isset($mt_footer_bottom_border) && !empty($mt_footer_bottom_border)) {
		    $html .= '.footer-bottom .footer--row-inner .container {
				    border-color: '.esc_attr($mt_footer_bottom_border).';
				}';
    	}
    	if(Qiupid()->get_setting('qiupid_enable_parallax')) {
    		$html .= '.qiupid-breadcrumbs.qiupid-alignment-center {
				        background-attachment: fixed;
				       	background-position: bottom;
				}';
    	}
		// Responsive
		$html .= '
		@media only screen and (max-width: 767px) {
			body h1,
			body h1 span{
			    font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h1_size_mobile').' !important;
			    line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h1_lh_mobile').' !important;
			}
			body h2{
			    font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h2_size_mobile').' !important;
			    line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h2_lh_mobile').' !important;
			}
			body h3{
			    font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h3_size_mobile').' !important;
			    line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h3_lh_mobile').' !important;
			}
			body h4{
			    font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h4_size_mobile').' !important;
			    line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h4_lh_mobile').' !important;
			}
			body h5{
			    font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h5_size_mobile').' !important;
			    line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h5_lh_mobile').' !important;
			}
			body h6{
			    font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h6_size_mobile').' !important;
			    line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h6_lh_mobile').' !important;
			}
		}';
		// THEME OPTIONS STYLESHEET - Responsive Tablets
		$html .= '
	    @media only screen and (min-width: 768px) and (max-width: 1024px) {
	    	body h1,
	    	body h1 span{
	    		font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h1_size_tablet').' !important;
	    		line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h1_lh_tablet').' !important;
	    	}
	    	body h2{
	    		font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h2_size_tablet').' !important;
	    		line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h2_lh_tablet').' !important;
	    	}
	    	body h3{
	    		font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h3_size_tablet').' !important;
	    		line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h3_lh_tablet').' !important;
	    	}
	    	body h4{
	    		font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h4_size_tablet').' !important;
	    		line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h4_lh_tablet').' !important;
	    	}
	    	body h5{
	    		font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h5_size_tablet').' !important;
	    		line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h5_lh_tablet').' !important;
	    	}
	    	body h6{
	    		font-size: '.Qiupid()->get_setting('qiupid_styling_settings_h6_size_tablet').' !important;
	    		line-height: '.Qiupid()->get_setting('qiupid_styling_settings_h6_lh_tablet').' !important;
	    	}
	    }';

	    // THEME OPTIONS STYLESHEET 
	    $html .= '
                a, a:visited, .product_meta > span a {
                    color: '.Qiupid()->get_setting('qiupid_styling_settings_color_links_normal').';
                }
                .qiupid-article-details .post-author a:hover,.qiupid-comment-footer-meta a:hover,.qiupid-article-inner .qiupid-post-metas a:hover,.qiupid-article-inner .post-name a:hover,.page-links .post-page-numbers.current,body .page-links a:hover,.single-post-tags a:hover,.widget_archive li a:hover,.widget_categories li a:hover,.widget_product_categories .cat-item a:hover,.widget_recent_entries li a:hover,.wp-block-archives-list.wp-block-archives li a:hover,.wp-block-button.is-style-outline .wp-block-button__link,.wp-block-categories-list.wp-block-categories li a:hover,.wp-block-latest-comments li a:hover,.wp-block-latest-posts.wp-block-latest-posts__list a:hover,.wp-block-tag-cloud a:hover,a:focus,a:hover,body .qiupid-article-details .post-author a:hover,body .qiupid-comment-footer-meta a:hover,body .qiupid-article-inner .qiupid-post-metas a:hover,body .qiupid-article-inner .post-name a:hover,body .header-group-wrapper:hover a.menu-grid-item i,body .sidebar-content .tagcloud>a:hover,body .single-post-tags a:hover,body .tagcloud>a:hover, .widget_mt_recent_entries_with_thumbnail li a:hover{
                    color: '.Qiupid()->get_setting('qiupid_styling_settings_color_links_hover').';
                }
                a, a:visited {
                	font-weight: '.Qiupid()->get_setting('qiupid_styling_settings_color_links_weight').';
                }
		        .breadcrumb a::after {
		            content: "'.Qiupid()->get_setting('qiupid_breadcrumbs_delimitator').'";
		        }
                .woocommerce p.stars a::before, .cd-gallery .woocommerce-title-metas .qiupid-supported-cause a,table.compare-list .remove td a .remove,.woocommerce form .form-row .required,.woocommerce .woocommerce-info::before,.woocommerce .woocommerce-message::before,.woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce div.product .woocommerce-tabs ul.tabs li,.widget_popular_recent_tabs .nav-tabs li.active a,.widget_product_categories .cat-item:hover,.widget_archive li:hover,.widget_categories .cat-item:hover, .woocommerce .star-rating span::before,h1 span,h2 span,label.error,.author-name,.comment_body .author_name,.prev-next-post a:hover, .prev-text,.next-text,.social ul li a:hover i,.wpcf7-form span.wpcf7-not-valid-tip,.text-dark .statistics .stats-head *,.widget_meta a:hover,.logo span,a.shop_cart::after,.woocommerce ul.products li.product .archive-product-title a:hover,.shop_cart:hover,.widget_pages a:hover,.widget_recent_entries_with_thumbnail li:hover a,li.seller-name::before,li.store-address::before,li.store-name::before,.woocommerce div.product form.buy-now.cart .button:hover span.amount,body .woocommerce ul.cart_list li:hover a, body .woocommerce ul.product_list_widget li:hover a,a.add-wsawl.sa-watchlist-action:hover, a.remove-wsawl.sa-watchlist-action:hover,.top-footer .menu-search .btn.btn-primary:hover i.fa,.post-name i,.modal-content p i,.modeltheme-modal input[type="submit"]:hover,.modeltheme-modal button[type="submit"]:hover,form#login .submit_button:hover,blockquote::before,div#cat-drop-stack a:hover,.woocommerce #respond input#submit:hover,body .woocommerce-MyAccount-navigation-link > a:hover,body .woocommerce-MyAccount-navigation-link.is-active > a,.sidebar-content .widget_nav_menu li a:hover,.woocommerce-account .woocommerce-MyAccount-content p a:hover,.woocommerce.single-product div.product.product-type-auction form.cart .button.single_add_to_cart_button span,.woocommerce.single-product div.product.product-type-auction form.cart .button.single_add_to_cart_button,#signup-modal-content .woocommerce-form-register.register .button[type="submit"]:hover, .dokan-btn-theme a:hover, .dokan-btn-theme:hover, input[type="submit"].dokan-btn-danger:hover, input[type="submit"].dokan-btn-theme:hover, .woocommerce-MyAccount-navigation-link.is-active > abody .qiupid_shortcode_blog .post-name a:hover,.category-button a:hover,#dropdown-user-profile ul li a:hover,.widget_qiupid_social_icons a,.simple-sitemap-container ul a:hover,.wishlist_table tr td.product-name a.button:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li:hover a, .mega_menu .cf-mega-menu li a:hover, .mega_menu .cf-mega-menu.sub-menu p a:hover,.woocommerce a.remove, a#register-modal:hover,.flip-clock-wrapper ul li a div div.inn,.cd-tab-filter a:hover,.no-touch .cd-filter-block h4:hover,.cd-gallery .woocommerce-title-metas a:hover,.cd-tab-filter a.selected,.no-touch .cd-filter-trigger:hover,.woocommerce .woocommerce-widget-layered-nav-dropdown__submit:hover,.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item a:hover, .qiupid-phone i, .qiupid-mail i {
                    color: '.Qiupid()->get_setting('qiupid_styling_settings_color_text_color').';
                }
                .woocommerce div.product .woocommerce-tabs ul.tabs li a,
				.woocommerce div.product .woocommerce-tabs ul.tabs li:hover a{
                    color: '.Qiupid()->get_setting('qiupid_styling_settings_color_text_color').';
                }
                .select2-container--default .select2-results__option--highlighted[aria-selected], 
                .select2-container--default .select2-results__option--highlighted[data-selected],
                .wpb_button::after,.rotate45,.latest-posts .post-date-day,.latest-posts h3,.latest-tweets h3, .latest-videos h3,.page-template-template-blog .qiupid-article-inner .qiupid-more-link,button.vc_btn,.owl-theme .owl-controls .owl-page span,body .vc_btn.vc_btn-blue, body a.vc_btn.vc_btn-blue, body button.vc_btn.vc_btn-blue, .woocommerce input.button,table.compare-list .add-to-cart td a,.woocommerce #respond input#submit.alt, .woocommerce input.button.alt, .woocommerce nav.woocommerce-pagination ul li a:focus, body.woocommerce nav.woocommerce-pagination ul li a:hover, body.woocommerce nav.woocommerce-pagination ul li span.current, .widget_social_icons li a:hover, #subscribe > button[type="submit"],.prev-next-post a:hover .rotate45,.member-footer .social::before, .member-footer .social::after,.subscribe > button[type="submit"],.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt[disabled]:disabled, .woocommerce #respond input#submit.alt[disabled]:disabled:hover, body.woocommerce button.button.alt.disabled, body.woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt[disabled]:disabled, .woocommerce button.button.alt[disabled]:disabled:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt[disabled]:disabled, .woocommerce input.button.alt[disabled]:disabled:hover,.no-results input[type="submit"],table.compare-list .add-to-cart td a,.shop_cart,h3#reply-title::after,.newspaper-info,.widget-title:after,.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active,#primary .main-content ul li:not(.rotate45)::before,.menu-search .btn.btn-primary:hover,.btn-register, .modeltheme-modal input[type="submit"], .modeltheme-modal button[type="submit"], form#login .register_button, form#login .submit_button, .widget_address_social_icons .social-links a,.hover-components .component:hover,.nav-previous a, .nav-next a,article.dokan-orders-area .dokan-panel-default > .dokan-panel-heading,#signup-modal-content .woocommerce-form-register.register .button[type="submit"],body .woocommerce-MyAccount-navigation-link > a,.newsletter-footer input.submit:hover, .newsletter-footer input.submit:focus, a.remove-wsawl.sa-watchlist-action,.wcv-dashboard-navigation li a,.wc_vendors_active form input[type="submit"], #wp-calendar td#today,.wishlist-title-with-form .show-title-form,.categories_shortcode .category, body .pagination .page-numbers.current,body .pagination .page-numbers:hover,.category-button.boxed a, .woocommerce div.product .woocommerce-tabs ul.tabs li.active,body .tp-bullets.preview1 .bullet,.sale_banner_right span.read-more {
                        background: '.esc_html($qiupid_style_main_backgrounds_color).'; 
                }
                .wp-block-button.is-style-outline .wp-block-button__link,
                .sidebar-content .widget-title::before, .sidebar-content .widget h2::before, .sidebar-content .widget .wp-block-search__label::before,
                .author-bio,body blockquote,.widget_popular_recent_tabs .nav-tabs > li.active,body .left-border, body .right-border,body .member-header,body .member-footer .social,.woocommerce div.product .woocommerce-tabs ul.tabs li.active, body .button[type="submit"],.wpb_content_element .wpb_tabs_nav li.ui-tabs-active,.header_mini_cart,.header_mini_cart.visible_cart,#contact-us .form-control:focus,.header_mini_cart .woocommerce .widget_shopping_cart .total, .header_mini_cart .woocommerce.widget_shopping_cart .total,.sale_banner_holder:hover, .woocommerce.single-product div.product.product-type-auction form.cart .button.single_add_to_cart_button,body .sidebar-content .widget-title::before, .sidebar-content .widget h2::before, .sidebar-content .widget .wp-block-search__label::before {
                        border-color: '.Qiupid()->get_setting('qiupid_styling_settings_main_border_color').' !important;
                }
                .woocommerce #respond input#submit:hover, .wc_vendors_active form input[type="submit"]:hover,.wcv-dashboard-navigation li a:hover,.woocommerce input.button:hover,table.compare-list .add-to-cart td a:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce input.button.alt:hover, .latest-posts .post-date-month,.button.solid-button:hover,body .vc_btn.vc_btn-blue:hover, body a.vc_btn.vc_btn-blue:hover, body button.vc_btn.vc_btn-blue:hover,.subscribe > button[type="submit"]:hover,table.compare-list .add-to-cart td a:hover,.shop_cart:hover,.widget_address_social_icons .social-links a:hover,.page-template-template-blog .qiupid-article-inner .qiupid-more-link:hover,form#login .submit_button:hover,.modeltheme-modal input[type="submit"]:hover, .modeltheme-modal button[type="submit"]:hover, .modeltheme-modal p.btn-register-p a:hover,#signup-modal-content .woocommerce-form-register.register .button[type="submit"]:hover, .no-touch #cd-zoom-in:hover, .no-touch #cd-zoom-out:hover,.woocommerce .woocommerce-widget-layered-nav-dropdown__submit:hover, .pagination > li > a.current, .pagination > li > a:hover {
                        background: '.esc_html($qiupid_style_main_backgrounds_color_hover).';
                }
				::selection{
                    color: '.Qiupid()->get_setting('qiupid_styling_settings_selection_color').';
                    background: '.Qiupid()->get_setting('qiupid_styling_settings_selection_bg').';
				}
				::-moz-selection { /* Code for Firefox */
                    color: '.Qiupid()->get_setting('qiupid_styling_settings_selection_color').';
                    background: '.Qiupid()->get_setting('qiupid_styling_settings_selection_bg').';
				}
                #navbar .sub-menu, .navbar ul li ul.sub-menu {
                        background-color: '.Qiupid()->get_setting('qiupid_styling_settings_submenu_background').';
                }
                #navbar ul.sub-menu li a,.button_dropdown li a:hover {
                        color: '.Qiupid()->get_setting('qiupid_styling_settings_submenu_text_color').';
                }
                #navbar ul.sub-menu li a:hover {
                        color: '.Qiupid()->get_setting('qiupid_styling_settings_submenu_background_hover').';
                }
                ';
	    wp_add_inline_style( 'qiupid-custom-style', qiupid_minify_css($html) );
	}
}