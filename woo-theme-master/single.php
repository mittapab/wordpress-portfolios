

<?php if (!defined('ABSPATH')) { exit; }?>
<?php get_header(); ?>
 
<!-- Start page -->
<div>

    <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <?php the_content(); ?>
       <?php endwhile;
          endif;
    ?>
</div>
<?php get_footer(); ?>