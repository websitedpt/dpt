<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap page-search py-5">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<h1 class="title-block line-bg-1 text-uppercase mt-0 mb-4 p-0 position-relative d-flex flex-wrap align-items-center"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span style="color:#cb3435; padding-left:10px">' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="title-block line-bg-1 text-uppercase mt-0 mb-4 p-0 position-relative d-flex align-items-center"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
		<?php endif; ?>
		<div class="content-area">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', 'search' );

				endwhile; // End of the loop.

				the_posts_pagination( array(
					'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
				) );

			else : ?>

				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
				<?php
					get_search_form();

			endif;
			?>

		</div><!-- #primary -->	
	</div>
</div><!-- .wrap -->

<?php get_footer();
