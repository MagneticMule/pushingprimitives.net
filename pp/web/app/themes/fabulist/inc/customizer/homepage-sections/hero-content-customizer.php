<?php
/**
 * Hero Content Customizer Options
 *
 * @package fabulist
 */

// Add hero content section
$wp_customize->add_section( 'fabulist_hero_content_section', array(
	'title'             => esc_html__( 'Hero Content Section','fabulist' ),
	'description'       => esc_html__( 'Hero Content Setting Options', 'fabulist' ),
	'panel'             => 'fabulist_homepage_sections_panel',
) );

// hero content menu enable setting and control.
$wp_customize->add_setting( 'fabulist_theme_options[enable_hero_content]', array(
	'default'           => fabulist_theme_option('enable_hero_content'),
	'sanitize_callback' => 'fabulist_sanitize_switch',
) );

$wp_customize->add_control( new Fabulist_Switch_Control( $wp_customize, 'fabulist_theme_options[enable_hero_content]', array(
	'label'             => esc_html__( 'Enable Hero Content', 'fabulist' ),
	'section'           => 'fabulist_hero_content_section',
	'on_off_label' 		=> fabulist_show_options(),
) ) );

// hero content pages drop down chooser control and setting
$wp_customize->add_setting( 'fabulist_theme_options[hero_content_page]', array(
	'sanitize_callback' => 'fabulist_sanitize_page_post',
) );

$wp_customize->add_control( new Fabulist_Dropdown_Chosen_Control( $wp_customize, 'fabulist_theme_options[hero_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'fabulist' ),
	'section'           => 'fabulist_hero_content_section',
	'choices'			=> fabulist_page_choices(),
) ) );
