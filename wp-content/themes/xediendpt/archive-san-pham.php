<?php
	get_header();   
	$lang  = pll_current_language('locale'); 
	$Catalog = get_queried_object();  
	$taxonomy = 'danh-muc-san-pham';
	$terms = get_terms($taxonomy);
	//$term_id = '29';
	//echo term_description( $term_id, $taxonomy );
	//$image_id = get_term_meta ( $term_id, 'category-image-id', true );
	//echo wp_get_attachment_image ($image_id, 'full');
	//$banerUrl = wp_get_attachment_image_src($image_id, 'full')[0];
	$big = 999999999;
	if ( get_query_var('paged') ) {
	  $paged = get_query_var('paged'); 
	} elseif ( get_query_var('page') ) { 
	  $paged = get_query_var('page');
	} else {
	  $paged = 1;
	}   
?>
	<div class="banner banner-general" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/bg_cat.jpg')">
		<div class="container text-center d-flex flex-wrap align-items-center position-relative">
	        <h1 class="text-uppercase page-title mb-3"><?php echo $Catalog->name; ?></h1>
	        <?php if(function_exists('breadcrumb')){breadcrumb();} ?>  
	    </div>
    </div>
    
	<div class="py-5 arch-products">
	  	<div class="container">
		  	<div class="row">
		  		<div class="col-md-4 col-lg-3 d-none d-md-block wow fadeInRight"><?php get_sidebar(); ?></div>
		  		<div class="col-md-8 col-lg-9 wow fadeInUp"><div class="row">
				  	<?php 
				  		if ( $terms && !is_wp_error( $terms ) ) : 
				  			foreach ( $terms as $term ) {
						        $image_id = get_term_meta ($term->term_id, 'category-image-id', true );
						        $banerUrl = wp_get_attachment_image_src($image_id, 'full')[0];
					        	if($term->parent == 0) { ?> 
					        		<div class="col-md-4 my-3 box-1">
							            <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>" title="<?php echo $term->name; ?>">
							                <div class="box-fix-h d-flex align-items-center justify-content-center p-3">
							                  <img src="<?php echo $banerUrl ?>" class="img-fluid mx-auto" alt="<?php echo $term->name; ?>">                    
							                </div>
							                <h3 class="mt-3 mb-0 title-h3 text-capitalize text-center">
							                  <?php echo $term->name; ?>
							                </h3>
							            </a>
						            </div>						            	
					        	<?php }
					        } ?>
						<?php endif;
					?>
				</div></div>
				
			</div>
	  	</div>
	</div>

<?php get_footer();
