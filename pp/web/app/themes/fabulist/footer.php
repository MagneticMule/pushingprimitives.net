<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fabulist
 */

/**
 * fabulist_site_content_ends_action hook
 *
 * @hooked fabulist_site_content_ends -  10
 *
 */
do_action( 'fabulist_site_content_ends_action' );

/**
 * fabulist_footer_start_action hook
 *
 * @hooked fabulist_footer_start -  10
 *
 */
do_action( 'fabulist_footer_start_action' );

/**
 * fabulist_site_info_action hook
 *
 * @hooked fabulist_site_info -  10
 *
 */
do_action( 'fabulist_site_info_action' );

/**
 * fabulist_footer_ends_action hook
 *
 * @hooked fabulist_footer_ends -  10
 * @hooked fabulist_slide_to_top -  20
 *
 */
do_action( 'fabulist_footer_ends_action' );

/**
 * fabulist_page_ends_action hook
 *
 * @hooked fabulist_page_ends -  10
 *
 */
do_action( 'fabulist_page_ends_action' );

wp_footer();

/**
 * fabulist_body_html_ends_action hook
 *
 * @hooked fabulist_body_html_ends -  10
 *
 */
do_action( 'fabulist_body_html_ends_action' );
