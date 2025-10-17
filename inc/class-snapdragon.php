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



if ( ! class_exists( 'Snapdragon' ) ) :



	/**
	 * The main Snapdragon class
	 */
	class Snapdragon {



		private static $instance = null;

		public $defaults;
		public $cookies;
		public $translates;
		public $setup;
		public $customizer;
		public $woocommerce;
		
		public $version;
		public $author;



		public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



		public function __construct() {
			$theme = wp_get_theme();
			$this->version 		= $theme->get( 'Version' );
			$this->author		= $theme->get( 'Author' );

			$this->translates 	= ( object ) [];
			$this->setup 		= ( object ) [];
			$this->customizer 	= ( object ) [];
			$this->woocommerce 	= ( object ) [];
			

			// Add helper classes
			$this->init_defaults();
			$this->init_cookies();


			// Create main $snapdragon object
			$GLOBALS['snapdragon'] = ( object ) $this;
		}
		
		

		private function init_defaults() {
			$this->defaults = $this->check_file(__DIR__ . '/helpers/class-snapdragon-defaults.php');
			return $this;
		}
		
		

		private function init_cookies() {
			$this->cookies = $this->check_file(__DIR__ . '/helpers/class-snapdragon-cookies.php');
			return $this;
		}



		private function check_file($file) {
			if ( ! file_exists( $file ) ) {
				die( "Missing file: $file" );
			}

			return require_once $file;
		}



		// End of class
	}



endif;



return Snapdragon::instance();