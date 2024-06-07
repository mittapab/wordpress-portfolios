<?php  get_header();  ?>
        <!-- Content -->
        <div class="content-games-master">
            <div class="container-fluid px-0 py-0">
                        <?php  if(have_posts()){
                            the_post();
                            the_content();
                        }   ?>
            </div>

        </div>
        <!-- End Content -->

    </div>
<?php  get_footer();  ?>

    