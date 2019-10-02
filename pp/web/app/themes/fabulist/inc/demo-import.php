<?php
/**
 * demo import
 *
 * @package fabulist
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function fabulist_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Fabulist Theme.', 'fabulist' ),
    esc_url( 'https://drive.google.com/open?id=1TNFDRkqgDeIHkTmXaGsWrENGf8iA3W-7' ), esc_html__( 'Click here to download Demo Data', 'fabulist' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'fabulist_intro_text' );