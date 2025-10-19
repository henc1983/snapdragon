<?php
/**
 * Footer Template functions.
 *
 * @package snapdragon
 */


defined('ABSPATH') or die('No script kiddies please!');



if ( ! function_exists('snapdragon_mobile_button_group_on_footer') ) {
    function snapdragon_mobile_button_group_on_footer() {
        
        $snapdragon = snapdragon_object_return();

        if ( ! $snapdragon ) {
            return;
        }

        if ( $snapdragon->cookies->get_cookie($snapdragon->defaults::MEDIAQUERY_COOKIE_NAME) === 'desktop' ) {
            return;
        }

        ?>

        <footer id="snapdragon-mobile-button-group" role="application">
            <h1>MOBILE BUTTON GROUP</h1>
            <?php do_action( 'snapdragon_mobile_button_group' ); ?>
        </footer>
        
        <?php
    }
}