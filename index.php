<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package snapdragon
 */

get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php 
        if ( have_posts() ) :
            while ( have_posts() ) :

                the_post();

            endwhile;
        
        else :
    ?>

    <div class="no-results not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'snapdragon' ); ?></h1>
        </header>
    </div>

    <?php endif; ?>

    </main>
</div>

<?php

get_footer();