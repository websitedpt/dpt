<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="content-area area-404 pt-5">
	<div class="container pt-md-4">
		<div class="row">
			<div class="col-md-12 error-404 not-found text-center">			
					<h1 class="page-title mb-3"><?php _e( 'Rất tiếc! Không thể tìm thấy trang web.', 'twentyseventeen' ); ?></h1>				
				<div class="page-content">
					<p class="mb-3 mb-md-5"><?php _e( 'Có vẻ như không có gì được tìm thấy tại địa điểm này. Bạn có thể thử tìm kiếm?', 'twentyseventeen' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div>
		</div>
	</div>
</div>

<?php get_footer();
