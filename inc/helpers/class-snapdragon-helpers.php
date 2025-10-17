<?php
/**
 * Snapdragon Helper Functions Class
 *
 * @since    1.0
 * @package  snapdragon
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



if ( ! class_exists( 'SnapdragonHelperFunctions' ) ) :



    class SnapdragonHelperFunctions {



        private static $instance = null;



        public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



        public function reload_page() {
            print('<script type="text/javascript">window.top.location="'.$_SERVER['REQUEST_URI'].'";</script>');
            exit;
        }
        // End of class
    }



endif;



return SnapdragonHelperFunctions::instance();