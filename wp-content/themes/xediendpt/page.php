<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>
<div class="banner banner-general d-flex flex-wrap align-items-end position-relative" style="background-image: url('<?php if($thumb) {
	echo $thumb['0'];
} else {
	echo get_template_directory_uri()."/assets/images/banner-1.jpg";
} ?>')">
  <div class="container">
      <h1 class="text-uppercase page-title mb-3 d-block w-100"><?php echo get_the_title();?></h1>
  </div>
</div>

<div class="area-page wow fadeInUp">	
	<div class="container py-5">
		<?php if(function_exists('breadcrumb')){  echo '<div class="mb-4">'; breadcrumb();  echo '</div>';  } ?> 
		<?php if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/page/content', 'page' );
			endwhile; // End of the loop.			
		endif; ?>	
	</div>
</div>
<?php get_footer();
