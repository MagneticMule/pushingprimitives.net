<?php
/**
 * Default Theme Customizer Values
 *
 * @package fabulist
 */

function fabulist_get_default_theme_options() {
	$fabulist_default_options = array(
		// default options

		// Slider
		'enable_slider'			=> true,

		// Hero Content
		'enable_hero_content' 	=> true,

		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2019 | All Rights Reserved.', 'fabulist' ),

		// blog / archive
		'filter_blog_posts'		=> 'both',
		'blog_column_type'		=> 'column-3',
		'excerpt_count'			=> 15,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_loader'			=> false,
		'loader_type'			=> 'spinner-dots',
		'site_layout'			=> 'full',

	);

	$output = apply_filters( 'fabulist_default_theme_options', $fabulist_default_options );
	return $output;
}