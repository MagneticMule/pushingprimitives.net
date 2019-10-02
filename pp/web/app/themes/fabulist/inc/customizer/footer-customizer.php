<?php
/**
 * Footer Customizer Options
 *
 * @package fabulist
 */

// Add footer section
$wp_customize->add_section( 'fabulist_footer_section', array(
	'title'             => esc_html__( 'Footer Section','fabulist' ),
	'description'       => esc_html__( 'Footer Setting Options', 'fabulist' ),
	'panel'             => 'fabulist_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[slide_to_top]', array(
	'default'           => fabulist_theme_option('slide_to_top'),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'fabulist' ),
	'section'           => 'fabulist_footer_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'fabulist_theme_options[copyright_text]',
	array(
		'default'       		=> fabulist_theme_option('copyright_text'),
		'sanitize_callback'		=> 'fabulist_santize_allow_tags',
	)
);
$wp_customize->add_control( 'fabulist_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'fabulist' ),
		'section'    			=> 'fabulist_footer_section',
		'type'		 			=> 'textarea',
    )
);
