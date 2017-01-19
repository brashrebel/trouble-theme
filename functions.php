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
			$post_options[ $post->ID ] = $post->post_title;
		}
	}

	rbm_do_field_select( 'trouble_yes', 'Yes', false, array(
		'options'     => $post_options,
		'option_none' => '-',
		'option_none_value' => null,
	) );
	rbm_do_field_select( 'trouble_no', 'No', false, array(
		'options'     => $post_options,
		'option_none' => '-',
		'option_none_value' => null,
	) );
	rbm_do_field_checkbox( 'trouble_solved', false, false, array(
		'check_label' => 'Solved',
	) );
}

/**
 * Add a column to the WP_List_Table for pages
 * @param $columns
 * @return mixed
 */
function trouble_new_page_column( $columns ) {
	$columns["yn"] = "Yes / No";
	return $columns;
}
add_filter('manage_edit-page_columns', 'trouble_new_page_column');

function trouble_populate_column( $colname, $cptid ) {
	if ( $colname == 'yn')
		echo get_the_title( rbm_get_field( 'trouble_yes' ) );
		echo '<br/>';
		echo get_the_title( rbm_get_field( 'trouble_no' ) );
}
add_action('manage_page_posts_custom_column', 'trouble_populate_column', 10, 2);