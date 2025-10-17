<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package snapdragon
 */

get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php 
        while ( have_posts() ) :
            the_post();

            // Can use action hooks
            do_action( 'snapdragon_page_before' );
            
            // load templates/content-page.php template
            get_template_part( 'templates/content' , 'page' );
            
            do_action( 'snapdragon_page_after' );

        endwhile;
    ?>

    </main>
</div>

<?php

get_footer();