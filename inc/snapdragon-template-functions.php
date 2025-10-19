<?php
/**
 * Template functions.
 *
 * @package snapdragon
 */


defined('ABSPATH') or die('No script kiddies please!');


require_once __DIR__ . '/template-functions/snapdragon-header-functions.php';
require_once __DIR__ . '/template-functions/snapdragon-footer-functions.php';



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
        global $snapdragon;
        ?>
            <form method="POST" id="snapdragon-device-screen-form" style="display:none;">
                <input type="hidden" name="<?php esc_html_e($snapdragon->defaults::MEDIAQUERY_POST_NAME) ?>" value="<?php esc_html_e($snapdragon->cookies->get_cookie($snapdragon->defaults::MEDIAQUERY_COOKIE_NAME)) ?>" />
            </form>
        <?php
    }

}



/**
 * add_action( '***', 'snapdragon_post_meta', 10 );
 */
if ( ! function_exists( 'snapdragon_post_meta' ) ) {

    
        function snapdragon_post_meta() {
    
            if ( 'post' !== get_post_type() ) {
                return;
            }

            // Posted on.
            $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $time_string = sprintf(
                $time_string,
                esc_attr( get_the_date( 'c' ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( 'c' ) ),
                esc_html( get_the_modified_date() )
            );

            $output_time_string = sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string );

            $posted_on = '
                <span class="posted-on">' .
                /* translators: %s: post date */
                sprintf( __( 'Posted on %s', 'snapdragon' ), $output_time_string ) .
                '</span>';

            // Author.
            $author = sprintf(
                '<span class="post-author">%1$s <a href="%2$s" class="url fn" rel="author">%3$s</a></span>',
                __( 'by', 'snapdragon' ),
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_html( get_the_author() )
            );

            // Comments.
            $comments = '';

            if ( ! post_password_required() && ( comments_open() || 0 !== intval( get_comments_number() ) ) ) {
                $comments_number = get_comments_number_text( __( 'Leave a comment', 'snapdragon' ), __( '1 Comment', 'snapdragon' ), __( '% Comments', 'snapdragon' ) );

                $comments = sprintf(
                    '<span class="post-comments">&mdash; <a href="%1$s">%2$s</a></span>',
                    esc_url( get_comments_link() ),
                    $comments_number
                );
            }

            echo wp_kses(
                sprintf( '%1$s %2$s %3$s', $posted_on, $author, $comments ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                    'a'    => array(
                        'href'  => array(),
                        'title' => array(),
                        'rel'   => array(),
                    ),
                    'time' => array(
                        'datetime' => array(),
                        'class'    => array(),
                    ),
                )
            );
    
        }

} // POST META



/**
 * add_action( 'snapdragon_loop_posts', 'snapdragon_post_header', 10 );
 */
if ( ! function_exists( 'snapdragon_post_header' ) ) {

    
        function snapdragon_post_header() {
    
            ?>

            <header class="entry-header">

            <?php

            /**
             * Functions hooked in to snapdragon_post_header_before action.
             *
             * @hooked snapdragon_post_meta - 10
             */
            do_action( 'snapdragon_post_header_before' );

            if ( is_single() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            }

            do_action( 'snapdragon_post_header_after' );
            ?>

            </header>

		<?php
    
        }

} // add_action( 'snapdragon_loop_posts', 'snapdragon_post_header', 10 );



/**
 * add_action( 'snapdragon_loop_posts', 'snapdragon_post_content', 30 );
 */
if ( ! function_exists( 'snapdragon_post_content' ) ) {

    
        function snapdragon_post_content() {
    
            ?>

            <div class="entry-content">

            <?php

            /**
             * Functions hooked in to snapdragon_post_content_before action.
             *
             * @hooked snapdragon_post_thumbnail - 10
             */
            do_action( 'snapdragon_post_content_before' );

            the_content(
                sprintf(
                    /* translators: %s: post title */
                    __( 'Continue reading %s', 'snapdragon' ),
                    '<span class="screen-reader-text">' . get_the_title() . '</span>'
                )
            );

            do_action( 'snapdragon_post_content_after' );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'snapdragon' ),
                    'after'  => '</div>',
                )
            );
            ?>
            </div>
            <?php
    
        }

} // add_action( 'snapdragon_loop_posts', 'snapdragon_post_content', 30 );



/**
 * add_action( 'snapdragon_loop_posts', 'snapdragon_post_taxonomy', 40 );
 */
if ( ! function_exists( 'snapdragon_post_taxonomy' ) ) {

    
        function snapdragon_post_taxonomy() {
    
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( __( ', ', 'snapdragon' ) );

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', __( ', ', 'snapdragon' ) );
            ?>

            <aside class="entry-taxonomy">
                <?php if ( $categories_list ) : ?>
                <div class="cat-links">
                    <?php echo esc_html( _n( 'Category:', 'Categories:', count( get_the_category() ), 'snapdragon' ) ); ?> <?php echo wp_kses_post( $categories_list ); ?>
                </div>
                <?php endif; ?>

                <?php if ( $tags_list ) : ?>
                <div class="tags-links">
                    <?php echo esc_html( _n( 'Tag:', 'Tags:', count( get_the_tags() ), 'snapdragon' ) ); ?> <?php echo wp_kses_post( $tags_list ); ?>
                </div>
                <?php endif; ?>
            </aside>

            <?php
    
        }

} // add_action( 'snapdragon_loop_posts', 'snapdragon_post_taxonomy', 40 );




/**
 * add_action( 'snapdragon_homepage', 'snapdragon_homepage_header', 10 );
 */
if ( ! function_exists( 'snapdragon_homepage_header' )) {

    function snapdragon_homepage_header() {

        
    }

} // add_action( 'snapdragon_homepage', 'snapdragon_homepage_header', 10 );



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
 * add_action( 'snapdragon_page', 'snapdragon_page_content', 20 );
 */
if ( ! function_exists( 'snapdragon_page_content' )) {

    function snapdragon_page_content() {
        ?>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'snapdragon' ),
                        'after'  => '</div>',
                    )
                );
            ?>
        </div>
    <?php
    }

} // add_action( 'snapdragon_page', 'snapdragon_page_content', 20 );



/**
 * add_action( 'snapdragon_page', 'snapdragon_edit_post_link', 30 );
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

} // add_action( 'snapdragon_page', 'snapdragon_edit_post_link', 30 );



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


