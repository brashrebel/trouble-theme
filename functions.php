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

function trouble_add_meta_box() {
	add_meta_box(
		'yes_and_no',
		'Subsequent Pages',
		'trouble_add_page_fields',
		'page',
		'normal'
	);
}
add_action( 'add_meta_boxes', 'trouble_add_meta_box' );

function trouble_add_page_fields() {

	$posts = get_posts( array(
		'post_type'   => 'page',
		'numberposts' => - 1,
	) );
	$post_options = array();
	if ( ! empty( $posts ) ) {
		foreach ( $posts as $post ) {
			$post_options['Pages'][ $post->ID ] = $post->post_title;
		}
	}

	rbm_do_field_select( 'trouble_yes', 'Yes', false, array(
		'options'     => $post_options,
		'input_class' => 'rbm-select2 widefat',
		'opt_groups'  => true,
		'multiple'    => true,
		'multi_field' => true,
	) );
	rbm_do_field_select( 'trouble_no', 'No', false, array(
		'options'     => $post_options,
		'input_class' => 'rbm-select2 widefat',
		'opt_groups'  => true,
		'multiple'    => true,
		'multi_field' => true,
	) );
}