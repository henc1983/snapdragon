<?php
/**
 * Template hooks.
 *
 * @package snapdragon
 */



/**
 * Pages
 *
 * @see  snapdragon_page_header()
 * @see  snapdragon_page_content()
 * @see  snapdragon_edit_post_link()
 * @see  snapdragon_display_comments()
 */
add_action( 'snapdragon_page', 'snapdragon_page_header', 10 );
add_action( 'snapdragon_page', 'snapdragon_page_content', 20 );
add_action( 'snapdragon_page', 'snapdragon_edit_post_link', 30 );
add_action( 'snapdragon_page_after', 'snapdragon_display_comments', 10 );