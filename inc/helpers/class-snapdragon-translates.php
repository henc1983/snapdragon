<?php
/**
 * Snapdragon Translate Capability Class
 *
 * @since    1.0
 * @package  snapdragon
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



if ( ! class_exists( 'SnapdragonTranslates' ) ) :



    class SnapdragonTranslates {



        private static $instance = null;
        public $capable;
        public $enabled;



        public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



        public function __construct() {
            $this->init_capabilities();
            $this->init_enabled();
        }



        public function get_title( $lang ) {
            global $snapdragon;

            if( ! is_object( $snapdragon ) || ! property_exists( $snapdragon , 'defaults' ) ) {
                return false;
            }

            return in_array( $lang, array_keys( $snapdragon->defaults::TRANSLATE_CODE_PAIRS ) ) ? $snapdragon->defaults::TRANSLATE_CODE_PAIRS[$lang] : '';
        }



        private function init_capabilities() {
            global $snapdragon;
            
            if( ! is_object( $snapdragon ) || ! property_exists( $snapdragon , 'defaults' ) ) {
                return false;
            }

            $path = get_template_directory() .''. $snapdragon->defaults::TRANSLATE_FLAGS_DIR;
            if(is_dir($path)) {
                
                foreach(glob($path . '/*.svg') as $file) {
                    
                    $lang = basename($file, '.svg');

                    $this->capable[$lang] = (object)[
                        'code' => $lang,
                        'title' => $this->get_title($lang),
                        'attached_image' => get_template_directory_uri() .'/'. $snapdragon->defaults::TRANSLATE_FLAGS_DIR . basename($file)
                    ];
                }

            }
        }



        private function init_enabled() {
            global $snapdragon;

            if( ! is_object( $snapdragon ) || ! property_exists( $snapdragon , 'defaults' ) ) {
                return false;
            }
            
            $this->enabled = get_option($snapdragon->defaults::TRANSLATE_OPTIONS_NAME, $snapdragon->defaults::TRANSLATE_DEFAULT_ENABLED_LANGUAGES);
        }



        public function get_selected_data() {
            global $snapdragon;

            if( ! is_object( $snapdragon ) || ! property_exists( $snapdragon , 'defaults' ) ) {
                return false;
            }
            
            return $this->capable[$snapdragon->cookies->get_cookie( $snapdragon->defaults::TRANSLATE_COOKIE_NAME )];
        }
        // End of class
    }



endif;



return SnapdragonTranslates::instance();