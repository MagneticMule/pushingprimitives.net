<?php
/**
 * Theme functions and definitions
 *
 * @package fabmasonry
 */ 

if ( ! function_exists( 'fabmasonry_theme_defaults' ) ) :
	/**
	 * Customize theme defaults.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defaults Theme defaults.
	 * @param array Custom theme defaults.
	 */
	function fabmasonry_theme_defaults( $defaults ) {
        $defaults['enable_slider'] = false;
        $defaults['enable_hero_content'] = false;
        $defaults['blog_column_type'] = 'column-3';
		$defaults['excerpt_count']    = 25;

		return $defaults;
	}
endif;
add_filter( 'fabulist_default_theme_options', 'fabmasonry_theme_defaults', 99 );

if ( ! function_exists( 'fabmasonry_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function fabmasonry_enqueue_styles() {

		wp_enqueue_style( 'fabmasonry-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'fabmasonry-style', get_stylesheet_directory_uri() . '/style.css', array( 'fabmasonry-style-parent' ), '1.0.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'fabmasonry_enqueue_styles', 99 );

if( ! function_exists( 'fabmasonry_check_enable_status' ) ):
    /**
     * Adds custom classes to the array of body classes.
     *
     * @param array $classes Classes for the body element.
     * @return array
     */
    function fabmasonry_body_classes( $classes ) {

        if ( is_home() && is_front_page() )
            $classes[] = 'image-focus-masonry';

        return $classes;
    }
endif;
add_filter( 'body_class', 'fabmasonry_body_classes' );
