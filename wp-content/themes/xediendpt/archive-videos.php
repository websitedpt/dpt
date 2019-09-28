<?php
	get_header();   
	$lang  = pll_current_language('locale'); 
	$Catalog = get_queried_object();  
  
	$taxonomy = 'danh-muc-videos';
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
	<div class="banner banner-general d-flex flex-wrap align-items-center position-relative" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/bg_cat.jpg')">
		<div class="container text-center">
	        <h1 class="text-uppercase page-title mb-3"><?php echo $Catalog->name; ?></h1>
	        <?php if(function_exists('breadcrumb')){breadcrumb();} ?>  
	    </div>
    </div>
	<div class="py-5 arch-videos">
	  	<div class="container">
		  	<div class="row">
		  		<div class="col-md-8 col-lg-9 wow fadeInUp"><div class="row">
				  	<?php $queryVideo = new WP_Query(array(
						'post_type' => 'videos',
						'post_status' => 'publish',
						'posts_per_page' => '20', 
						'paged'          => $paged,
					    ));
					    if($queryVideo->have_posts()) {				    						    	
					        while ($queryVideo->have_posts()) { 
					            $queryVideo->the_post(); 
					            $post_id = get_the_ID();
					            $link_videos = get_post_meta($post_id, 'link_youtube', true );
					            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
					            ?>  
					            <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-4">
					              <div class="overflow-hidden item-block ">
					                <a href="<?php echo $link_videos; ?>" title="<?php echo get_the_title(); ?>" data-modal-video>
					                  <div class="bg-img mb-3 mb-md-4 position-relative rounded" style="background-image: url('<?php echo $thumb['0'] ?>')"><div class="icon-play play-2"></div></div>
					                </a>    
					                <h3 class="title-h3 mt-3 mb-3 mb-md-4"><a href="<?php echo $link_videos; ?>" title="<?php echo get_the_title(); ?>" data-modal-video><?php echo get_the_title(); ?></a></h3>
					              </div>              
					            </div>
					        <?php } 
					    }
						wp_reset_query(); 
					?>
					<div class="col-12"><?php echo panigation();  ?></div>
					<!-- Modal show -->
      <div id="poupVideos" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="padding-right: 17px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Làm Sạch Siêu Âm Được Sử Dụng Trong Cọ Rửa Và Vẽ</h5>
              <button type="button" class="close" data-dismiss aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="h-video">
                <iframe id="iframe-video" width="100%" height="100%" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-backdrop fade d-none"></div>
      <!-- End Modal -->
				</div></div>
				<div class="col-md-4 col-lg-3 d-none d-md-block wow fadeInRight"><?php get_sidebar(); ?></div>
			</div>
	  	</div>
	</div>

<?php get_footer();
