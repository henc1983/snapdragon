<?php
/**
 * Template used to display post content.
 *
 * @package snapdragon
 */

defined('ABSPATH') or die('No script kiddies please!');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
	/**
	 * Functions hooked in to snapdragon_loop_post action.
	 *
	 * @hooked snapdragon_post_header          - 10
	 * @hooked snapdragon_post_content         - 30
	 * @hooked snapdragon_post_taxonomy        - 40
	 */
	do_action( 'snapdragon_loop_posts' );
	?>

</article>