<?php
/**
 * Page Customizer Options
 *
 * @package fabulist
 */

// Add excerpt section
$wp_customize->add_section( 'fabulist_page_section', array(
	'title'             => esc_html__( 'Page Setting','fabulist' ),
	'description'       => esc_html__( 'Page Setting Options', 'fabulist' ),
	'panel'             => 'fabulist_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'fabulist_sanitize_select',
	'default'             => fabulist_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new Fabulist_Radio_Image_Control ( $wp_customize, 'fabulist_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'fabulist' ),
	'section'             => 'fabulist_page_section',
	'choices'			  => fabulist_sidebar_position(),
) ) );
