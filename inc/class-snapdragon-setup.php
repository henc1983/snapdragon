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

			add_action( 'init', fn()=>$this->set_important_cookies(), 0 );
			
			add_action( 'wp_enqueue_scripts', fn()=>$this->enqueue_styles(), 10 );
			add_action( 'wp_enqueue_scripts', fn()=>$this->enqueue_scripts(), 10 );

			add_action( 'after_setup_theme', fn()=>$this->theme_supports() );
			add_action( 'after_setup_theme', fn()=>$this->load_theme_textdomains() );

		}


		private function set_important_cookies() {
			
			global $snapdragon;

			if ( ! is_object( $snapdragon ) || ! property_exists( $snapdragon , 'defaults' ) || ! property_exists( $snapdragon , 'cookies' ) ) {
				return;
			}

			if ( ! headers_sent() ) {

				$count = 0;

				foreach ( $snapdragon->defaults::IMPORTANT_COOKIE_PAIRS as $name => $value ) {
					
					if ( $snapdragon->cookies->get_cookie( $name ) === null ) {

						$snapdragon->cookies->set_cookie( $name, $value );

						$count++;

					}

				}


				if ( $count > 0 ) {
					$snapdragon->helpers->reload_page();
				}

			}
		}



		private function theme_supports() {
			
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			// Declare support for title theme feature.
			add_theme_support( 'title-tag' );

			// Declare support for selective refreshing of widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			// Add support for Block Styles.
			add_theme_support( 'wp-block-styles' );

			// Add support for full and wide align images.
			add_theme_support( 'align-wide' );

			// Add support for editor styles.
			add_theme_support( 'editor-styles' );

			// Add support for responsive embedded content.
			add_theme_support( 'responsive-embeds' );

			/**
			 * Add support for appearance tools.
			 *
			 * @link https://wordpress.org/documentation/wordpress-version/version-6-5/#add-appearance-tools-to-classic-themes
			 */
			add_theme_support( 'appearance-tools' );

			// Add support for theme.json
			add_theme_support( 'block-template-parts' );
			add_theme_support( 'block-template' );


		}



		private function load_theme_textdomains() {
			// Loads wp-content/languages/themes/storefront-it_IT.mo.
			load_theme_textdomain( 'snapdragon', trailingslashit( WP_LANG_DIR ) . 'themes' );

			// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
			load_theme_textdomain( 'snapdragon', get_stylesheet_directory() . '/languages' );

			// Loads wp-content/themes/storefront/languages/it_IT.mo.
			load_theme_textdomain( 'snapdragon', get_template_directory() . '/languages' );

		}



		private function enqueue_styles() {
			global $snapdragon;
			
			$suffix = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '' : '.min';
			wp_enqueue_style( 'snapdragon-style', get_stylesheet_uri(), '', filemtime(get_template_directory() . '/style.css') );
			
			if( is_home() && ! is_front_page() ) {
				wp_enqueue_style( 'snapdragon-loop-style', get_template_directory_uri() . "/assets/styles/loop$suffix.css", '', filemtime(get_template_directory() . "/assets/styles/loop$suffix.css") );
			}
			
		}



		private function enqueue_scripts() {
			global $snapdragon;
			
			$suffix = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '' : '.min';
			wp_enqueue_script( 'snapdragon-script', get_template_directory_uri() . "/assets/scripts/main$suffix.js" , [] , filemtime(get_template_directory() . "/assets/scripts/main$suffix.js"), true );
			
		}



		// End of class
	}



endif;



return SnapdragonSetup::instance();