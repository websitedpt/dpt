<?php 
	$postid = get_the_ID(); 
	$price = get_post_meta($postid, 'price', true);
	$slider = get_post_meta($postid, 'tdc_gallery_id', true);

	$price_promo = get_post_meta($postid, 'price_promo', true);
	$color = get_post_meta($postid, 'color', true); 
	$model = get_post_meta($postid, 'model', true);
	$tinhtrang = get_post_meta($postid, 'tinhtrang', true);
	$xuatxu = get_post_meta($postid, 'xuatxu', true);
	$congsuat = get_post_meta($postid, 'congsuat', true);
	$namsanxuat = get_post_meta($postid, 'namsanxuat', true);
	$chongoi = get_post_meta($postid, 'chongoi', true);
	$bodieukhien = get_post_meta($postid, 'bodieukhien', true);
	$binhdien = get_post_meta($postid, 'binhdien', true);
	$kichthuoc = get_post_meta($postid, 'kichthuoc', true);
	$tocdotoida = get_post_meta($postid, 'tocdotoida', true);
	$leodoc = get_post_meta($postid, 'leodoc', true);
	$taitrong = get_post_meta($postid, 'taitrong', true);
	$hangxe = get_post_meta($postid, 'hangxe', true);
	$loaixe = get_post_meta($postid, 'loaixe', true);
	$phamvivanchuyen = get_post_meta($postid, 'phamvivanchuyen', true);
	
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h3 class="text-capitalize title-block mb-4 d-md-none"><strong>', '</strong></h3>' );?>		
	<div class="content-product">		
		<div class="row mb-4 mb-md-5 gallary">
            <div class="col-md-6 mb-4 mb-md-0">
              	<?php if($slider) { ?>
	                <div class="wrap-single-img">
	                  <div class="slider-for">
	                  	<?php 
				        foreach ($slider as $image) { ?>
				        	<div class="table">
		                      <div class="table-cell p-4">
		                        <img src="<?php echo wp_get_attachment_url($image, 'large'); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid mx-auto d-block">
		                      </div>
		                    </div>
				    	<?php } ?>	                    
	                  </div>
	                </div>
	                <div class="slider-nav">
	                	<?php 
				        	foreach ($slider as $image) { ?>
				        		<div class="item px-1">
				                    <div class="border-1 p-3 fix-h-thumb d-flex align-items-center">
				                      <img src="<?php echo wp_get_attachment_url($image, 'large'); ?>" class="img-fluid d-block mx-auto" alt="">                
				                    </div>
				                </div>				        		
				    	<?php }	?>
	                </div>  
	            <?php } else { ?>
	            	<div class="wrap-single-img">
	                  <div class="slider-for">
	                    <div class="table">
	                      <div class="table-cell p-4">
	                        <?php echo get_the_post_thumbnail($postid, 'full', array( 'class' => 'img-fluid mx-auto d-block')); ?>  
	                      </div>
	                    </div>
	                  </div>
	                </div>
	           	<?php } ?>
            </div>
	        <div class="col-md-6">
	            <?php the_title( '<h3 class="text-capitalize title-block mb-4 d-none d-md-block"><strong>', '</strong></h3>' );?>	
	            <div class="review-star mb-3"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></div>
	            <div class="wrap-price mb-2"><strong class="pr-2">Giá:</strong> 
	            	<?php 
	            		if($price_promo) { 
		            		if($price) {
		            			echo'<del>'.$price.'</del><sup>(vnđ)</sup>';
		            			echo'<span class="price pl-2"><strong>'.$price_promo.'</strong><sup>(vnđ)</sup></span>';
		            		} else {echo "Liên hệ";}	            		
	            		} else { ?>
	            			<span class="price"><strong> 
	             			<?php if($price) { echo $price.'<sup>(vnđ)</sup>';} else { echo "Liên hệ";} ?></strong></span>
	            		<?php  } ?>
	            	
	            </div>
	            <div class="line-1 mb-2"></div>
	            <div class="mb-3">
	            	<strong>Liên hệ ngay:</strong> 
	            	<div class="mt-2 box-lh row align-items-center justify-content-center">
	            		<div class="col col-sm-12 col-lg-6 pr-0 pr-md-2 mb-sm-3 mb-lg-0"><?php if(get_option('Hotline1') !='') {echo'<a class="d-block text-center px-2 py-2 phone-1" href="tel:'.get_option('Hotline1').'" title="'.get_option('Hotline1').'"><i class="icon fa fa-phone pr-2"></i>'.get_option('Hotline1').'</a>';}?>
	            		</div>
	            		<div class="col col-sm-12 col-lg-6">
	            			<?php if(get_option('phone_company') !='') {echo'<a class="d-block text-center px-2 py-2 phone-2" href="tel:'.get_option('phone_company').'" title="'.get_option('phone_company').'"><i class="fa fa-mobile pr-2" aria-hidden="true"></i>'.get_option('phone_company').'</a>';}?>
	            		</div>
	            	</div>
	            </div>
	            <div class="d-none d-md-block mt-5">
	            	<ul class="nav socials mb-3 mt-3 pt-3">
						<li class="nav-item mr-4"><strong>Chia Sẻ:</strong></li>
						<li class="nav-item"><a class="pr-4" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&title=<?php echo get_the_title(get_the_ID()); ?>" target="_blank" title="Share on facebook"><i class="fa fa-facebook-square"></i></a></li>
						<li class="nav-item"><a class="pr-4" href="https://telegram.me/share/url?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Share on telegram"><i class="fa fa-telegram"></i></a></li>
						<li class="nav-item"><a class="pr-4" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank" title="Share on twitter"><i class="fa fa-twitter"></i></a></li>
						<li class="nav-item"><a class="pr-4" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo get_the_title(get_the_ID()); ?>" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin"></i></a></li>
						<li class="nav-item"><a href="https://reddit.com/submit?url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo get_the_title(get_the_ID()); ?>" target="_blank" title="Share on Reddit"><i class="fa fa-reddit-square"></i></a></li>
					</ul>
	            </div>
	        </div>
        </div>
        <div>
        	<h3 class="title-block line-bg-1 text-uppercase mt-0 mb-4 p-0 position-relative d-flex align-items-center">Thông số kỹ thuật</h3>
        	<table class="table tbl-product mb-4">        		
        		<tbody>
        			<?php if($model) { echo '<tr><th>MODEL</th><td>'.$model.'</td></tr>';}?>
        			<?php if($tinhtrang) { echo '<tr><th>TÌNH TRẠNG</th><td>'.$tinhtrang.'</td></tr>';}?>
        			<?php if($xuatxu) { echo '<tr><th>XUẤT XỨ</th><td>'.$xuatxu.'</td></tr>';}?>
        			<?php if($model) { echo '<tr><th>MODEL</th><td>'.$model.'</td></tr>';}?>
        			<?php if($congsuat) { echo '<tr><th>CÔNG SUẤT ĐỘNG CƠ</th><td>'.$congsuat.'</td></tr>';}?>
        			<?php if($namsanxuat) { echo '<tr><th>NĂM SẢN XUẤT</th><td>'.$namsanxuat.'</td></tr>';}?>
        			<?php if($chongoi) { echo '<tr><th>SỐ CHỖ NGỒI</th><td>'.$chongoi.'</td></tr>';}?>
        			<?php if($color) { echo '<tr><th>MÀU SẮC</th><td>'.$color.'</td></tr>';}?>
        			<?php if($phamvivanchuyen) { echo '<tr><th>PHẠM VI VẬN CHUYỂN</th><td>'.$phamvivanchuyen.'</td></tr>';}?>
        			<?php if($bodieukhien) { echo '<tr><th>BỘ ĐIỀU KHIỂN</th><td>'.$bodieukhien.'</td></tr>';}?>
        			<?php if($binhdien) { echo '<tr><th>BÌNH ĐIỆN/HỘP ĐIỆN</th><td>'.$binhdien.'</td></tr>';}?>
        			<?php if($kichthuoc) { echo '<tr><th>KÍCH THƯỚC XE (MM)</th><td>'.$kichthuoc.'</td></tr>';}?>
        			<?php if($tocdotoida) { echo '<tr><th>TỐC ĐỘ TỐI ĐA</th><td>'.$tocdotoida.'</td></tr>';}?>
        			<?php if($leodoc) { echo '<tr><th>KHẢ NĂNG LEO DỐC</th><td>'.$leodoc.'</td></tr>';}?>
        			<?php if($taitrong) { echo '<tr><th>TẢI TRỌNG CHO PHÉP</th><td>'.$taitrong.'</td></tr>';}?>
        			<?php if($hangxe) { echo '<tr><th>HÃNG XE</th><td>'.$hangxe.'</td></tr>';}?>
        			<?php if($loaixe) { echo '<tr><th>LOẠI XE</th><td>'.$loaixe.'</td></tr>';}?>

        		</tbody>
        	</table>
        </div>
     	<div class="content-product">
     		<h3 class="title-block line-bg-1 text-uppercase mt-0 mb-4 p-0 position-relative d-flex align-items-center">Tổng quan</h3>
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
		</div>
		<div class="d-block d-md-none"><?php echo share_social();?> </div>
		<?php if(function_exists('related_taxomy_posts')){ ?>
			<div class="related-product"><h4 class="title-block title-b-3 position-relative line-bg-3 text-uppercase mb-3 pb-2 mt-5"><span class="color-primary">Sản Phẩm</span> Liên quan</h4>
			<?php echo related_taxomy_posts();
		} ?>    
	</div><!-- .entry-content -->
</article><!-- #post-## -->
