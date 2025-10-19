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

        if( ! is_object( $snapdragon ) || ! property_exists( $snapdragon , 'defaults' ) || ! property_exists( $snapdragon , 'cookies' ) || ! property_exists( $snapdragon , 'helpers' ) ) {
            return false;
        }

        return $snapdragon;
    }
}