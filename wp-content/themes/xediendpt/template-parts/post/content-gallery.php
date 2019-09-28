<?php
/**
 * Template part for displaying gallery posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h2 class="title-post">', '</h2>' ); ?>
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && ! get_post_gallery() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php if(has_shortcode(get_the_content(), 'gallery')) : 			
	        $pattern = get_shortcode_regex(); 
	        preg_match("/$pattern/s", get_the_content(), $matches);
	    ?>
	    <div class="gallary">
	    	<div class="slider-for"><?php echo do_shortcode($matches[0]); ?></div>
	    	<div class="slider-nav"><?php echo do_shortcode($matches[0]); ?></div>
	    </div>

	    <!-- <div id="content">
	        <?php //echo strip_shortcodes(get_the_content()); ?>
	    </div> -->
		<?php endif; ?>
		
		<?php //if ( ! is_single() ) :

			// If not a single post, highlight the gallery.
			// if ( get_post_gallery() ) :
			// 	echo '<div class="entry-gallery">';
			// 		echo get_post_gallery();
			// 	echo '</div>';
			// endif;

		//endif;

		// if (get_post_gallery() ) :

		// 	/* translators: %s: Name of current post */
		// 	the_content( sprintf(
		// 		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
		// 		get_the_title()
		// 	) );
		// endif;
		 ?>

	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php //twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
