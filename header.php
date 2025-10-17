<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package snapdragon
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        
    <?php wp_body_open(); ?>


    <div id="page" class="site">

        <header id="masterheader" class="site-header" role="banner" style="<?php // style_function ?>">
        </header>
        
        <div id="content" class="site-content" tabindex="-1">
