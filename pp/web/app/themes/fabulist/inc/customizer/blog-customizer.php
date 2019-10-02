<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package fabulist
 */

// Add blog section
$wp_customize->add_section( 'fabulist_blog_section', array(
	'title'             => esc_html__( 'Archive Page Setting','fabulist' ),
	'description'       => esc_html__( 'Archive/Search Page Setting Options', 'fabulist' ),
	'panel'             => 'fabulist_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'fabulist_sanitize_select',
	'default'             => fabulist_theme_option('sidebar_layout'),
) );

$wp_customize->add_control(  new Fabulist_Radio_Image_Control ( $wp_customize, 'fabulist_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'fabulist' ),
	'description'         => esc_html__( 'Note: Option for Archive and Search Page.', 'fabulist' ),
	'section'             => 'fabulist_blog_section',
	'choices'			  => fabulist_sidebar_position(),
) ) );

// column control and setting
$wp_customize->add_setting( 'fabulist_theme_options[column_type]', array(
	'default'          	=> fabulist_theme_option('column_type'),
	'sanitize_callback' => 'fabulist_sanitize_select',
) );

$wp_customize->add_control( 'fabulist_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'fabulist' ),
	'description'         => esc_html__( 'Note: Option for Archive and Search Page.', 'fabulist' ),
	'section'           => 'fabulist_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2' 		=> esc_html__( 'Two Column', 'fabulist' ),
		'column-3' 		=> esc_html__( 'Three Column', 'fabulist' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'fabulist_theme_options[excerpt_count]', array(
	'default'          	=> fabulist_theme_option('excerpt_count'),
	'sanitize_callback' => 'fabulist_sanitize_number_range',
	'validate_callback' => 'fabulist_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'fabulist_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'fabulist' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'fabulist' ),
	'section'           => 'fabulist_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'fabulist_theme_options[pagination_type]', array(
	'default'          	=> fabulist_theme_option('pagination_type'),
	'sanitize_callback' => 'fabulist_sanitize_select',
) );

$wp_customize->add_control( 'fabulist_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'fabulist' ),
	'section'           => 'fabulist_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'fabulist' ),
		'numeric' 		=> esc_html__( 'Numeric', 'fabulist' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[show_date]', array(
	'default'           => fabulist_theme_option( 'show_date' ),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'fabulist' ),
	'section'           => 'fabulist_blog_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[show_category]', array(
	'default'           => fabulist_theme_option( 'show_category' ),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'fabulist' ),
	'section'           => 'fabulist_blog_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[show_author]', array(
	'default'           => fabulist_theme_option( 'show_author' ),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'fabulist' ),
	'section'           => 'fabulist_blog_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );
