<?php 
/**
 *  Display the page content
 *
 * @since 1.0.0
 */

?>

<div class="entry-content">
    <?php the_content(); ?>
    <?php
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
                'after'  => '</div>',
            )
        );
    ?>
</div>