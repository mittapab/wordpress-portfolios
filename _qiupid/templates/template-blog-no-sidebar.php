<?php
/**
 *
 * Template Name: Blog (No Sidebar)
 *
 * @package Qiupid
 */

get_header();

$class                  = "col-md-8 offset-md-2";
$page_sidebar           = 'sidebar-1';

do_action( 'qiupid_before_main_content' );
?>

<div class="high-padding">
    <div class="container blog-posts">
        <div class="row">
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