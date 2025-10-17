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
			
			add_action( 'wp_enqueue_scripts', fn()=>$this->enqueue_styles(), 10 );

		}



		private function enqueue_styles() {
			global $snapdragon;
			
			$suffix = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '' : '.min';
			wp_enqueue_style( 'snapdragon-style', get_stylesheet_uri(), '', filemtime(get_template_directory() . '/style.css') );
			
			if( is_home() && ! is_front_page() ) {
				wp_enqueue_style( 'snapdragon-loop-style', get_template_directory_uri() . "/assets/styles/loop$suffix.css", '', filemtime(get_template_directory() . "/assets/styles/loop$suffix.css") );
			}
			
		}



		// End of class
	}



endif;



return SnapdragonSetup::instance();