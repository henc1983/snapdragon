<?php
/**
 * The template used for displaying homepage content in page.php
 *
 * @package snapdragon
 */

defined('ABSPATH') or die('No script kiddies please!');

$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-featured-image="<?php echo esc_url( $featured_image ); ?>">
    
    <div class="wrapper">

        <?php 
        /**
         * Functions hooked in to storefront_page add_action
         * 
         * @hooked snapdragon_homepage_header()     - 10
         * @hooked snapdragon_page_content()        - 20
         */
        do_action( 'snapdragon_homepage' );
        ?>
        
    </div>

</div>