<?php 
	$category = get_the_category();
	//$parent = get_cat_name($category[0]->category_parent);
	$parent = get_category($category[0]->category_parent);  
	$parentSlug = $parent->slug;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mb-3 mb-md-4">
	<?php the_title( '<h1 class="title-post border-b-1 mb-3 pb-2">', '</h1>' );
		echo '<div class="event-post-ger"><i class="fa fa-calendar pr-2" aria-hidden="true"></i>'.get_the_date().' 
		<i class="fa fa-user-circle-o pr-2 pl-3" aria-hidden="true"></i> '.get_the_author().'</div>';
	?>	
		
	</div>
	<div class="entry-content">		
		<?php		
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );			

			/*wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );*/
		?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php //twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->


