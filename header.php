<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package snapdragon
 */


global $snapdragon;



?>

<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        
    <?php wp_body_open(); ?>


    <div id="page" class="site">

        <?php 

        if ( $snapdragon->cookies->get_cookie($snapdragon->defaults::MEDIAQUERY_COOKIE_NAME) === 'desktop' ) :

        ?>

        <header id="snapdragon-header" class="site-header" role="banner" style="<?php // style_function ?>">
            <?php do_action( 'snapdragon_main_header' ); ?>
        </header>
        

        <?php endif;?>

        <div id="content" class="site-content" tabindex="-1">
