<?php
/**
 * Global Customizer Options
 *
 * @package fabulist
 */

// Add Global section
$wp_customize->add_section( 'fabulist_global_section', array(
	'title'             => esc_html__( 'Global Setting','fabulist' ),
	'description'       => esc_html__( 'Global Setting Options', 'fabulist' ),
	'panel'             => 'fabulist_theme_options_panel',
) );

// site layout setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[site_layout]', array(
	'sanitize_callback'   => 'fabulist_sanitize_select',
	'default'             => fabulist_theme_option('site_layout'),
) );

$wp_customize->add_control(  new Fabulist_Radio_Image_Control ( $wp_customize, 'fabulist_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'fabulist' ),
	'section'             => 'fabulist_global_section',
	'choices'			  => fabulist_site_layout(),
) ) );


// loader setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[enable_loader]', array(
	'default'           => fabulist_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'fabulist' ),
	'section'           => 'fabulist_global_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'fabulist_theme_options[loader_type]', array(
	'default'          	=> fabulist_theme_option('loader_type'),
	'sanitize_callback' => 'fabulist_sanitize_select',
) );

$wp_customize->add_control( 'fabulist_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'fabulist' ),
	'section'           => 'fabulist_global_section',
	'type'				=> 'select',
	'choices'			=> fabulist_get_spinner_list(),
) );
