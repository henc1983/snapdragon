<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package snapdragon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
    /**
	 * Functions hooked in to storefront_page add_action
	 */
    get_template_part( 'template-parts/page/page' , 'header' );
    get_template_part( 'template-parts/page/page' , 'content' );
    ?>

</article>