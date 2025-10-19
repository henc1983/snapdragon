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
            add_action( 'init' , [ $this , 'media_query_post_request' ] , 10);
        }



        public function media_query_post_request() {
            global $snapdragon;

            if ( ! is_object( $snapdragon ) || ! property_exists( $snapdragon , 'defaults') ) {
                return;
            }

            $post_name = $snapdragon->defaults::MEDIAQUERY_POST_NAME;
            $cookie_name = $snapdragon->defaults::MEDIAQUERY_COOKIE_NAME;

            if ( isset($_POST[$post_name] )) {
                $snapdragon->cookies->set_cookie($cookie_name, $_POST[$post_name]);
                unset($_POST[$post_name]);
                
                print('<script type="text/javascript">window.top.location="'.$_SERVER['REQUEST_URI'].'";</script>');
		        exit;
            }
        }  

        // End of class
    }



endif;



return SnapdragonRequestHandler::instance();