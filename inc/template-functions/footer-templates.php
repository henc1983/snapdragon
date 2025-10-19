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
        <div id="footer-above"></div>
        <footer id="snapdragon-mobile-button-group" role="application">
            <div class="menu-wrapper">
            
                <ul>
                    <li>
                        <button class="snapdragon-nav-button menu">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
                        </button>
                    </li>
                    <li>
                        <button class="snapdragon-nav-button search">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                        </button>
                    </li>
                    <li>
                        <button class="snapdragon-nav-button home">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M303.5 5.7c-9-7.6-22.1-7.6-31.1 0l-264 224c-10.1 8.6-11.3 23.7-2.8 33.8s23.7 11.3 33.8 2.8L64 245.5V393c14.6-8.5 31.9-10.7 48-6.6V204.8L288 55.5 464 204.8V386.5c16.1-4.2 33.4-1.9 48 6.5V245.5l24.5 20.8c10.1 8.6 25.3 7.3 33.8-2.8s7.3-25.3-2.8-33.8l-264-224zM256 224h64v64H256V224zm-8-48c-22.1 0-40 17.9-40 40v80c0 22.1 17.9 40 40 40h80c22.1 0 40-17.9 40-40V216c0-22.1-17.9-40-40-40H248zM111.9 430.1c-9.1-8.1-22.8-8.1-31.9 0C62.8 445 41 456.8 18.8 461.8C5.9 464.7-2.3 477.5 .6 490.5s15.7 21.1 28.7 18.2C58 502.2 81.6 488.2 96 478.2c28.1 19.5 61.4 33.8 96 33.8s67.9-14.3 96-33.8c28.1 19.5 61.4 33.8 96 33.8s67.9-14.3 96-33.8c14.4 10 38 24 66.7 30.4c12.9 2.9 25.8-5.2 28.7-18.2s-5.2-25.8-18.2-28.7c-22-4.9-44.3-16.7-61.3-31.8c-9.1-8.1-22.8-8.1-31.9 0c-21.5 18.6-51.2 33.9-80 33.9s-58.5-15.3-80-33.9c-9.1-8.1-22.8-8.1-31.9 0c-21.5 18.6-51.2 33.9-80 33.9s-58.5-15.3-80-33.9z"/></svg>
                        </button>
                    </li>
                    <li>
                        <button class="snapdragon-nav-button profile">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/></svg>
                        </button>
                    </li>
                    <li>
                        <button class="snapdragon-nav-button wishlist">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
                        </button>
                    </li>
                    <li>
                        <button class="snapdragon-nav-button language">
                            <img src="<?php echo $snapdragon->translates->get_selected_data()->attached_image ?>" alt="<?php esc_html_e( 'Selected language' , 'snapdragon' )?>">
                        </button>
                    </li>
                </ul>

                <?php do_action( 'snapdragon_mobile_button_group' ); ?>
            </div>
        </footer>
        
        <?php
    }
}