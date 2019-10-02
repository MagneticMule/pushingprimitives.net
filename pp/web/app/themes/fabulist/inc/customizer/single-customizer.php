<?php
/**
 * Single Post Customizer Options
 *
 * @package fabulist
 */

// Add excerpt section
$wp_customize->add_section( 'fabulist_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','fabulist' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'fabulist' ),
	'panel'             => 'fabulist_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'fabulist_sanitize_select',
	'default'             => fabulist_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new Fabulist_Radio_Image_Control ( $wp_customize, 'fabulist_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'fabulist' ),
	'section'             => 'fabulist_single_section',
	'choices'			  => fabulist_sidebar_position(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[show_single_date]', array(
	'default'           => fabulist_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'fabulist' ),
	'section'           => 'fabulist_single_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[show_single_category]', array(
	'default'           => fabulist_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'fabulist' ),
	'section'           => 'fabulist_single_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[show_single_tags]', array(
	'default'           => fabulist_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'fabulist' ),
	'section'           => 'fabulist_single_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[show_single_author]', array(
	'default'           => fabulist_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'fabulist' ),
	'section'           => 'fabulist_single_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );
