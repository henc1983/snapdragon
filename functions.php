<?php
/**
 * Snapdragon engine room
 *
 * @package snapdragon
 */

defined('ABSPATH') or die('No script kiddies please!');



/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}



/**
 * 
 * Initialize all the things.
 * 
 * main class declare necessary objects are use later
 * @see inc/class-snapdragon.php 
 * @see inc/helpers/class-snapdragon-defaults.php 
 * @see inc/helpers/class-snapdragon-cookies.php 
 * 
 * @method Snapdragon::instance()
 * 
 * @return (object) $snapdragon
 * 
 */
require_once 'inc/class-snapdragon.php';


echo '<pre>';

var_dump(
	$snapdragon->defaults::COOKIE_EXP_TIME
);