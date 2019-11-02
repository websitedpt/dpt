<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header(); $Catalog = get_the_category();$catalogName = $Catalog[0]->cat_name; ?>
<div class="banner banner-general d-flex flex-wrap align-items-end position-relative" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/bg_cat.jpg')">
  <div class="container">
      <h1 class="text-uppercase page-title mb-3 d-block w-100"><?php echo get_the_title(); ?></h1>
  </div>
</div>
<div class="content-area area-post py-5">
	<div class="container">	
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<?php if(function_exists('breadcrumb')){  echo '<div class="mb-4">'; breadcrumb();  echo '</div>';  } ?> 
				<?php 
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/content', get_post_format() );
						// If comments are open or we have at least one comment, load up the comment template.
						/*if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;*/
					endwhile; // End of the loop.			
				?>	
				<?php echo share_social();?>
			</div>		
			<div class="col-sm-4 col-md-3 hidden-xs"><?php get_sidebar(); ?></div>
			<div class="col-12">					
				<div class="related-product"><h4 class="title-block title-b-3 position-relative line-bg-3 text-uppercase mb-3 pb-2 mt-5"><span class="color-primary"><?php echo $catalogName; ?></span> Liên quan</h4>
					<?php echo related_taxomy_posts(); ?>
				</div>
			</div>	
		</div>			
	</div>	
</div>

<?php get_footer();
