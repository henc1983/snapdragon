<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package snapdragon
 */

defined('ABSPATH') or die('No script kiddies please!');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
    /**
	 * Functions hooked in to storefront_page add_action
     * 
     * @hooked snapdragon_page_header()
     * @hooked snapdragon_page_content()
     * @hooked snapdragon_edit_post_link()
	 */
    do_action( 'snapdragon_page' );
    ?>

</article>