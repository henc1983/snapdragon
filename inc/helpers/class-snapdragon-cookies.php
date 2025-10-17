<?php
/**
 * Snapdragon Cookies Class
 *
 * @since    1.0
 * @package  snapdragon
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



if ( ! class_exists( 'SnapdragonCookies' ) ) :



    class SnapdragonCookies {



        private static $instance = null;



        public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



        // End of class
    }



endif;



return SnapdragonCookies::instance();