<?php
/**
 * Slider Customizer Options
 *
 * @package fabulist
 */

// Add slider section
$wp_customize->add_section( 'fabulist_slider_section', array(
	'title'             => esc_html__( 'Slider Section','fabulist' ),
	'description'       => esc_html__( 'Slider Setting Options', 'fabulist' ),
	'panel'             => 'fabulist_homepage_sections_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[enable_slider]', array(
	'default'           => fabulist_theme_option('enable_slider'),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'fabulist' ),
	'section'           => 'fabulist_slider_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'fabulist_theme_options[slider_btn_label]', array(
	'default'          	=> fabulist_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'fabulist_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'fabulist' ),
	'section'           => 'fabulist_slider_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// slider posts drop down chooser control and setting
	$wp_customize->add_setting( 'fabulist_theme_options[slider_content_post_' . $i . ']', array(
		'sanitize_callback' => 'fabulist_sanitize_page_post',
	) );

	$wp_customize->add_control( new Fabulist_Dropdown_Chosen_Control( $wp_customize, 'fabulist_theme_options[slider_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'fabulist' ), $i ),
		'section'           => 'fabulist_slider_section',
		'choices'			=> fabulist_post_choices(),
	) ) );

endfor;