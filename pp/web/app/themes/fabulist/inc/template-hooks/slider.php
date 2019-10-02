<?php
/**
 * Slider hook
 *
 * @package fabulist
 */

if ( ! function_exists( 'fabulist_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Fabulist 1.0.0
    */
    function fabulist_add_slider_section() {

        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'fabulist_section_status', 'enable_slider' );

        if ( ! $slider_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'fabulist_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render slider section now.
        fabulist_render_slider_section( $section_details );
    }
endif;
add_action( 'fabulist_primary_content_action', 'fabulist_add_slider_section', 10 );


if ( ! function_exists( 'fabulist_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Fabulist 1.0.0
    * @param array $input slider section details.
    */
    function fabulist_get_slider_section_details( $input ) {

        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 5; $i++ )  :
            $post_ids[] = fabulist_theme_option( 'slider_content_post_' . $i );
        endfor;
        
        $args = array(
            'post_type'         => 'post',
            'post__in'          =>  ( array ) $post_ids,
            'posts_per_page'    => 5,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), apply_filters( 'fabulist_slider_image_size_filter', 'full' ) ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// slider section content details.
add_filter( 'fabulist_filter_slider_section_details', 'fabulist_get_slider_section_details' );


if ( ! function_exists( 'fabulist_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Fabulist 1.0.0
   *
   */
   function fabulist_render_slider_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $readmore = fabulist_theme_option( 'slider_btn_label', esc_html__( 'Read Blog', 'fabulist' ) );
        ?>
    	<div id="custom-header">
            <div class="section-content banner-slider column-1" data-slick='{"slidesToShow": <?php echo apply_filters( 'fabulist_slider_slidestoshow_filter', 1 ); ?>, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows": true, "autoplay": true, "fade": <?php echo apply_filters( 'fabulist_slider_fade_filter', 'true' ); ?>, "draggable": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <div class="custom-header-content-wrapper slide-item">
                        <div class="overlay"></div>
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                        <?php endif; ?>
                        <div class="custom-header-content post-slider">
                            <?php the_category( '', '', $content['id'] );

                            if ( ! empty( $content['title'] ) ) : ?>
                                <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            <?php endif; 

                            if ( ! empty( $content['url'] ) && ! empty( $readmore ) ) : ?>
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                            <?php endif; ?>
                        </div><!-- .custom-header-content -->
                    </div><!-- .custom-header-content-wrapper -->
                <?php endforeach; ?>
            </div><!-- .banner-slider -->
        </div><!-- #custom-header -->
    <?php 
    }
endif;