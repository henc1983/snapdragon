<?php
/**
 * Theme Template functions.
 *
 * @package snapdragon
 */


defined('ABSPATH') or die('No script kiddies please!');



if ( ! function_exists( 'snapdragon_preloader_animation' ) ) {

    function snapdragon_preloader_animation() { 
        ?>
        <div id="snapdragon-site-preloader" class="show">
            <svg height="100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                <radialGradient id="a12" cx=".66" fx=".66" cy=".3125" fy=".3125" gradientTransform="scale(1.5)">
                    <stop offset="0" stop-color="currentColor"></stop>
                    <stop offset=".3" stop-color="currentColor" stop-opacity=".9"></stop>
                    <stop offset=".6" stop-color="currentColor" stop-opacity=".6"></stop>
                    <stop offset=".8" stop-color="currentColor" stop-opacity=".3"></stop>
                    <stop offset="1" stop-color="currentColor" stop-opacity="0"></stop>
                </radialGradient>
                <circle transform-origin="center" fill="none" stroke="url(#a12)" stroke-width="40" stroke-linecap="round" stroke-dasharray="200 1000" stroke-dashoffset="0" cx="100" cy="100" r="70">
                    <animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="1" values="360;0" keyTimes="0;1" keySplines="0 0 1 1" repeatCount="indefinite"></animateTransform>
                </circle>
                <circle transform-origin="center" fill="none" opacity=".2" stroke="currentColor" stroke-width="40" stroke-linecap="round" cx="100" cy="100" r="70"></circle>
            </svg>
        </div> 
        <?php
    }

}



if ( ! function_exists( 'snapdragon_media_query_form' ) ) {

    function snapdragon_media_query_form() {
        $snapdragon = snapdragon_object_return();
        
        if ( ! $snapdragon ) {
            return;
        }

        ?>
            <form method="POST" id="snapdragon-device-screen-form" style="display:none;">
                <input type="hidden" name="<?php esc_html_e($snapdragon->defaults::MEDIAQUERY_POST_NAME) ?>" value="<?php esc_html_e($snapdragon->cookies->get_cookie($snapdragon->defaults::MEDIAQUERY_COOKIE_NAME)) ?>" />
            </form>
        <?php
    }

}



if ( ! function_exists( 'snapdragon_language_selector_form' ) ) {

    function snapdragon_language_selector_form() {
        $snapdragon = snapdragon_object_return();
        
        if ( ! $snapdragon ) {
            return;
        }

        

        ?>
            
        <?php
    }

}