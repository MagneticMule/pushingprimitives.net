<?php
/**
 * latest blog Customizer Options
 *
 * @package fabulist
 */

// Add blog section
$wp_customize->add_section( 'fabulist_latest_blog_section', array(
	'title'             => esc_html__( 'Latest Blog Section','fabulist' ),
	'description'       => esc_html__( 'Latest Blog Section Setting Options', 'fabulist' ),
	'panel'             => 'fabulist_homepage_sections_panel',
) );

// column control and setting
$wp_customize->add_setting( 'fabulist_theme_options[blog_column_type]', array(
	'default'          	=> fabulist_theme_option('blog_column_type'),
	'sanitize_callback' => 'fabulist_sanitize_select',
) );

$wp_customize->add_control( 'fabulist_theme_options[blog_column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'fabulist' ),
	'section'           => 'fabulist_latest_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2' 		=> esc_html__( 'Two Column', 'fabulist' ),
		'column-3' 		=> esc_html__( 'Three Column', 'fabulist' ),
	),
) );
