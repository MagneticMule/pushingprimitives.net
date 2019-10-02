<?php
/**
 * Hero Content hook
 *
 * @package fabulist
 */

if ( ! function_exists( 'fabulist_add_hero_content_section' ) ) :
    /**
    * Add hero_content section
    *
    *@since Fabulist 1.0.0
    */
    function fabulist_add_hero_content_section() {

        // Check if hero_content is enabled on frontpage
        $hero_content_enable = apply_filters( 'fabulist_section_status', 'enable_hero_content', '' );

        if ( ! $hero_content_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get hero_content section details
        $section_details = array();
        $section_details = apply_filters( 'fabulist_filter_hero_content_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render hero_content section now.
        fabulist_render_hero_content_section( $section_details );
    }
endif;
add_action( 'fabulist_primary_content_action', 'fabulist_add_hero_content_section', 20 );


if ( ! function_exists( 'fabulist_get_hero_content_section_details' ) ) :
    /**
    * hero_content section details.
    *
    * @since Fabulist 1.0.0
    * @param array $input hero_content section details.
    */
    function fabulist_get_hero_content_section_details( $input ) {

        $content = array();
        $page_id = fabulist_theme_option( 'hero_content_page', '' );
        
        $args = array(
            'post_type' => 'page',
            'page_id' => absint( $page_id ),
            'posts_per_page' => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = get_the_content();

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
// hero_content section content details.
add_filter( 'fabulist_filter_hero_content_section_details', 'fabulist_get_hero_content_section_details' );


if ( ! function_exists( 'fabulist_render_hero_content_section' ) ) :
  /**
   * Start hero_content section
   *
   * @return string hero_content content
   * @since Fabulist 1.0.0
   *
   */
   function fabulist_render_hero_content_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) : ?>
            <div class="page-section hero-section relative">
                <div class="wrapper">
                    <?php if ( ! empty( $content['title'] ) ) : ?>
                        <div class="section-header add-separator">
                            <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <article class="hentry">
                        <div class="post-wrapper">
                            <div class="entry-container">
                                <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <div class="entry-content">
                                        <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                        </div><!-- .post-wrapper -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #hero_content -->
        <?php endforeach;
    }
endif;