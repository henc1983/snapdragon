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



        public function post_thumbnail( $size ) {
            /**
             * Display post thumbnail
             *
             * @var $size thumbnail size. thumbnail|medium|large|full|$custom
             * @uses has_post_thumbnail()
             * @uses the_post_thumbnail
             * @param string $size the post thumbnail size.
             * @since 1.5.0
             */
            if ( has_post_thumbnail() ) {
			    the_post_thumbnail( $size );
		    }
        }
        // End of class
    }



endif;



return SnapdragonHelperFunctions::instance();