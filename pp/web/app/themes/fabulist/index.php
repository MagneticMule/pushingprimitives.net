<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fabulist
 */

get_header(); 
?>

<div class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header add-separator">
					<h1 class="page-title"><?php single_post_title( '', true ); ?></h1>
				</header><!-- .page-header -->
			<?php endif; ?>

			<div class="blog-posts-wrapper grid <?php echo esc_attr( fabulist_theme_option( 'blog_column_type','column-3' ) ); ?>">
				<?php
				if ( have_posts() ) : 

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div><!-- #blog-posts-wrapper -->
			<?php  
			/**
			* Hook - fabulist_pagination_action.
			*
			* @hooked fabulist_pagination 
			*/
			do_action( 'fabulist_pagination_action' ); 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrapper -->

<?php
get_footer();
