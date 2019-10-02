<?php
/**
 * Options functions
 *
 * @package fabulist
 */

if ( ! function_exists( 'fabulist_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function fabulist_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'fabulist' ),
            'off'       => esc_html__( 'No', 'fabulist' )
        );
        return apply_filters( 'fabulist_show_options', $arr );
    }
endif;

if ( ! function_exists( 'fabulist_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function fabulist_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'fabulist' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'fabulist_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function fabulist_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'fabulist' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'fabulist_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function fabulist_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => true,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'fabulist' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'fabulist_tag_choices' ) ) :
    /**
     * List of tags for category choices.
     * @return Array Array of tag ids and name.
     */
    function fabulist_tag_choices() {
        $args = array(
                'taxonomy' => 'post_tag',
                'hide_empty' => true,
            );
        $tags = get_terms( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'fabulist' );
        foreach ( $tags as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'fabulist_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function fabulist_site_layout() {
        $fabulist_site_layout = array(
            'full'    => get_template_directory_uri() . '/assets/uploads/full.png',
            'boxed'   => get_template_directory_uri() . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'fabulist_site_layout', $fabulist_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'fabulist_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function fabulist_sidebar_position() {
        $fabulist_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/uploads/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/uploads/full.png',
        );

        $output = apply_filters( 'fabulist_sidebar_position', $fabulist_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'fabulist_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function fabulist_get_spinner_list() {
        $arr = array(
            'spinner-two-way'       => esc_html__( 'Two Way', 'fabulist' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'fabulist' ),
            'spinner-dots'          => esc_html__( 'Dots', 'fabulist' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'fabulist' ),
        );
        return apply_filters( 'fabulist_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'fabulist_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function fabulist_selected_sidebar() {
        $fabulist_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'fabulist' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'fabulist' ),
        );

        $output = apply_filters( 'fabulist_selected_sidebar', $fabulist_selected_sidebar );

        return $output;
    }
endif;
