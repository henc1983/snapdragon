<?php 
/**
 * Display the page header without the featured image
 *
 * @since 1.0.0
 */

defined('ABSPATH') or die('No script kiddies please!');



if ( is_front_page() && is_page_template( 'templates/content-fullwidth.php' ) ) {
    return;
}

global $snapdragon;

?>

<header class="entry-header">
    <?php

    if ( is_object($snapdragon) && property_exists( $snapdragon , 'helpers' ) && method_exists( $snapdragon->helpers , 'post_thumbnail') ) {

        $snapdragon->helpers->post_thumbnail( 'full' );

    }


    the_title( '<h1 class="entry-title">', '</h1>' );
    ?>
</header