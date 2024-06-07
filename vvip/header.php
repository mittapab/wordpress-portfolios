<!doctype html>
<html <?php language_attributes(); ?>>

<head>
     <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="description" content="Demo"> -->
    <?php
  if (is_single() && have_posts()) {
    while (have_posts()) {
      the_post();
      $description = get_the_excerpt();
?>
      <meta name="description" content="<?php echo $description; ?>" />
      <?php
    }
  }
  
 wp_head(); ?>
  
</head>

<body class="custom-background">
    <!-- Navbar -->
    <div class="container-fluid navbarmain">
        <button class="btn shadow-none fs-1 text-white py-0 px-1 d-block d-md-none" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"> <i
                class="bi bi-list"></i>
        </button>

        <div class="lightning">
            <img src="<?php echo get_theme_file_uri('/public/img/ln01.png'); ?>" class="img-fluid" alt="logo">
        </div>

        <a href="https://bwin168.vip" class="p-2">
            <img src="<?php  echo get_theme_mod('vvip_logo_setting');?>" class="img-logo-desktop" alt="logo">
        </a>

        <div class="menu-mobile offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop"
            aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-body">
                <div class="button-close-menu-mobile">
                    <button class="btn shadow-none fs-1 text-white py-0 px-1" type="button" data-bs-dismiss="offcanvas">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                <div class="card-menu-mobile container-fluid">
                    <div class="row row-cols-3 g-3">
                    <?php if ( is_active_sidebar( 'btwin-top-menu-tmobile' ) ) : ?>
                     <?php dynamic_sidebar( 'btwin-top-menu-tmobile' ); ?>
                    <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>

        <div class="menu-desktop">
            <div class="d-none d-md-block">
                <ul class="menu-content">
                    <?php if ( is_active_sidebar( 'btwin-top-menu' ) ) : ?>
                     <?php dynamic_sidebar( 'btwin-top-menu' ); ?>
                    <?php endif; ?> 
                </ul>
            </div>

               <?php if ( is_active_sidebar( 'btwin-referal-button' ) ) : ?>
                    <?php dynamic_sidebar( 'btwin-referal-button' ); ?>
               <?php endif; ?> 
        </div>
    </div>
    <!-- End Navbar -->

    <div class="d-flex flex-row">
        <!-- Side Bar -->
        <div class="sidebar-menu">
            <div class="tab-game-menu">
                <ul class="tab-menu-left">
                    <?php if ( is_active_sidebar( 'sidebar-menu' ) ) : ?>
                      <?php dynamic_sidebar( 'sidebar-menu' ); ?>
                    <?php endif; ?> 
                </ul>
            </div>

            <div class="position-absolute bottom-0 start-50 translate-middle">
                <img src="<?php echo get_theme_file_uri('/public/img/linetext.png');?>" width="150" alt="img">
            </div>
        </div>
        <!-- End Side Bar -->
