<?php
/**
 * Template hooks.
 *
 * @package snapdragon
 */



/**
 * Posts
 *
 * @see  snapdragon_post_header()
 * @see  snapdragon_post_content()
 * @see  snapdragon_post_taxonomy()
 * @see  snapdragon_post_meta()
 */
add_action( 'snapdragon_loop_posts', 'snapdragon_post_header', 10 );
add_action( 'snapdragon_loop_posts', 'snapdragon_post_content', 30 );
add_action( 'snapdragon_loop_posts', 'snapdragon_post_taxonomy', 40 );
add_action( 'snapdragon_post_header_before', 'snapdragon_post_meta', 10 );



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



/**
 * Homepage
 *
 * @see  snapdragon_homepage_header()
 * @see  snapdragon_page_content()
 */
add_action( 'snapdragon_homepage', 'snapdragon_homepage_header', 10 );
add_action( 'snapdragon_homepage', 'snapdragon_page_content', 20 );