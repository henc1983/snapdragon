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
		public $requests;
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
			// Create main $snapdragon object
			$GLOBALS['snapdragon'] = ( object ) $this;

			
			$theme = wp_get_theme();
			$this->version 		= $theme->get( 'Version' );
			$this->author		= $theme->get( 'Author' );

			$this->customizer 	= ( object ) [];
			$this->woocommerce 	= ( object ) [];
			

			// Add helper classes
			$this->init_defaults();
			$this->init_cookies();
			$this->init_requests();
			$this->init_translates();
			$this->init_setup();

		}
		
		

		private function init_defaults() {
			$this->defaults = $this->check_file(__DIR__ . '/helpers/class-snapdragon-defaults.php');
			return $this;
		}
		
		

		private function init_cookies() {
			$this->cookies = $this->check_file(__DIR__ . '/helpers/class-snapdragon-cookies.php');
			return $this;
		}
		
		

		private function init_requests() {
			$this->requests = $this->check_file(__DIR__ . '/helpers/class-snapdragon-requests.php');
			return $this;
		}
		
		

		private function init_setup() {
			$this->setup = $this->check_file(__DIR__ . '/class-snapdragon-setup.php');
			return $this;
		}
		
		

		private function init_translates() {
			$this->translates = $this->check_file(__DIR__ . '/helpers/class-snapdragon-translates.php');
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