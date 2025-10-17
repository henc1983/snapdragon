<?php
/**
 * Template functions.
 *
 * @package snapdragon
 */


defined('ABSPATH') or die('No script kiddies please!');



/**
 * add_action( 'snapdragon_page', 'snapdragon_page_header', 10 );
 */
if ( ! function_exists( 'snapdragon_page_header' )) {

    function snapdragon_page_header() {

        if ( is_front_page() && is_page_template( 'templates/content-fullwidth.php' ) ) {
            return;
        }

        global $snapdragon;

        ?>

        <header class="entry-header">
            <?php

            if ( is_object($snapdragon) && property_exists( $snapdragon , 'helpers' ) && method_exists( $snapdragon->helpers , 'post_thumbnail') ) {

                $snapdragon->helpers->post_thumbnail( 'full' );

            }


            the_title( '<h1 class="entry-title">', '</h1>' );
            ?>
        </header

        <?php

    }

} // add_action( 'snapdragon_page', 'snapdragon_page_header', 10 );



/**
 * add_action( 'storefront_page', 'snapdragon_page_content', 20 );
 */
if ( ! function_exists( 'snapdragon_page_content' )) {

    function snapdragon_page_content() {
        ?>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
                        'after'  => '</div>',
                    )
                );
            ?>
        </div>
    <?php
    }

} // add_action( 'storefront_page', 'snapdragon_page_content', 20 );



/**
 * add_action( 'storefront_page', 'snapdragon_edit_post_link', 30 );
 */
if ( ! function_exists( 'snapdragon_edit_post_link' )) {

    function snapdragon_edit_post_link() {

        edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'snapdragon' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<div class="edit-link">',
			'</div>'
		);

    }

} // add_action( 'storefront_page', 'snapdragon_edit_post_link', 30 );



/**
 * add_action( 'snapdragon_page_after', 'snapdragon_display_comments', 30 );
 */
if ( ! function_exists( 'snapdragon_display_comments' )) {

    function snapdragon_display_comments() {
        // If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || 0 !== intval( get_comments_number() ) ) :
			comments_template();
		endif;
    }

} // add_action( 'snapdragon_page_after', 'snapdragon_display_comments', 30 );


