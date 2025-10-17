<?php
/**
 * Snapdragon Class
 *
 * @since    1.0
 * @package  snapdragon
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



if ( ! class_exists( 'SnapdragonSetup' ) ) :



	/**
	 * The main Snapdragon class
	 */
	class SnapdragonSetup {



		private static $instance = null;

		

		public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



		public function __construct() {
			
			

		}



		private function enqueue() {}



		// End of class
	}



endif;



return SnapdragonSetup::instance();