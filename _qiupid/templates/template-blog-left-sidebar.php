<?php
/**
 *
 * Template Name: Blog (Left Sidebar)
 *
 * @package Qiupid
 */

get_header(); 

$class                  = 'col-md-8 col-md-offset-2';
$page_sidebar           = 'sidebar-1';

do_action( 'qiupid_before_main_content' );
?>

<div class="high-padding">
    <div class="container blog-posts">
        <div class="row">
            <?php if ( is_active_sidebar( $page_sidebar ) ) { ?>
                <div class="col-md-4 sidebar-content sidebar-content-left-side">
                    <?php  dynamic_sidebar( $page_sidebar ); ?>
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($class); ?> main-content">
                <?php
                // Include blog loop
                echo get_template_part('templates/content/templates/sections/blog-loop'); ?>
            </div>
        </div>
    </div>
</div>

<?php 
do_action( 'qiupid_after_main_content' );

get_footer();