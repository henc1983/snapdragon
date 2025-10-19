<?php
/**
 * Snapdragon Request Handler Class
 *
 * @since    1.0
 * @package  snapdragon
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



if ( ! class_exists( 'SnapdragonRequestHandler' ) ) :



    class SnapdragonRequestHandler {



        private static $instance = null;



        public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



        public function __construct() {
            
        }



        
        // End of class
    }



endif;



return SnapdragonRequestHandler::instance();