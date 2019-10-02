<?php
/**
 * Callbacks functions
 *
 * @package fabulist
 */

if ( ! function_exists( 'fabulist_theme_color_custom_enable' ) ) :
	/**
	 * Check if theme color is custom.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function fabulist_theme_color_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'fabulist_theme_options[theme_color]' )->value();
	}
endif;


if ( ! function_exists( 'fabulist_blog_filter_category' ) ) :
	/**
	 * Check if blog filter category enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function fabulist_blog_filter_category( $control ) {
		return ( in_array( $control->manager->get_setting( 'fabulist_theme_options[filter_blog_posts]' )->value(), array( 'category', 'both' ) ) );
	}
endif;

if ( ! function_exists( 'fabulist_blog_filter_tag' ) ) :
	/**
	 * Check if blog filter tag enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function fabulist_blog_filter_tag( $control ) {
		return ( in_array( $control->manager->get_setting( 'fabulist_theme_options[filter_blog_posts]' )->value(), array( 'tag', 'both' ) ) );
	}
endif;
