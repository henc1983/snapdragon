<?php
/**
 * Theme Functions.
 *
 * @package snapdragon
 */

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Adds backwards compatibility for wp_body_open() introduced with WordPress 5.2
	 *
	 * @since 2.5.4
	 * @see https://developer.wordpress.org/reference/functions/wp_body_open/
	 * @return void
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}



if ( ! function_exists( 'snapdragon_object_return' ) ) {
    function snapdragon_object_return() {
        global $snapdragon;

        if( ! is_object( $snapdragon ) || ! property_exists( $snapdragon , 'defaults' ) || ! property_exists( $snapdragon , 'cookies' ) ) {
            return false;
        }

        return $snapdragon;
    }
}



if ( ! function_exists( 'snapdragon_reload_page' ) ) {
    function snapdragon_reload_page() {
        print('<script type="text/javascript">window.top.location="'.$_SERVER['REQUEST_URI'].'";</script>');
		exit;
    }
}



if ( ! function_exists( 'snapdragon_post_thumbnail' ) ) {
    function snapdragon_post_thumbnail( $size ) {
       /**
             * Display post thumbnail
             *
             * @var $size thumbnail size. thumbnail|medium|large|full|$custom
             * @uses has_post_thumbnail()
             * @uses the_post_thumbnail
             * @param string $size the post thumbnail size.
             * @since 1.5.0
             */
            if ( has_post_thumbnail() ) {
			    the_post_thumbnail( $size );
		    }
    }
}