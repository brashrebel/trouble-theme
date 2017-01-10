<?php
/**
 * User: kylemaurer
 * Date: 1/9/17
 * Time: 8:10 PM
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles.
 */
function kyle_scripts() {
	wp_enqueue_style( 'trouble', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'kyle_scripts' );

