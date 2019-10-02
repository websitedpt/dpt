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
get_header(); 
	$taxonomy_name = 'danh-muc-san-pham';
	$terms = get_the_terms( get_the_ID(),$taxonomy_name);	
	$postid = get_the_ID(); 
	$slider = get_post_meta($postid, 'tdc_gallery_id', true);

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

?>
<div class="banner banner-general  position-relative" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/banner-2.jpg');background-position: bottom">
	<div class="container text-center d-flex flex-wrap align-items-center position-relative">
        <h1 class="text-uppercase page-title mb-3 d-block w-100"><?php echo get_the_title(); ?></h1>
        <div id="crumbs" class="list-crumb text-capitalize">
		    <i class="fa fa-home" aria-hidden="true"></i><a href="<?php echo get_site_url();?>" title="">Trang chủ</a>
		    <?php foreach ( $terms as $child ) {
				if($child->parent == 0) {
					echo '<i class="fa fa-angle-double-right"></i>';
			  		echo '<a href="' . get_term_link( $child->name, $taxonomy_name) . '">' . $child->name . '</a>';
				}
			}
			foreach ( $terms as $child ) {
				if($child->parent != 0) {
					echo '<i class="fa fa-angle-double-right"></i>';
					echo '<a href="' . get_term_link( $child->name, $taxonomy_name) . '">' . $child->name . '</a>';
				}
			}
			echo '<i class="fa fa-angle-double-right"></i>';
			echo get_the_title();
			?>
		</div>
    </div>
</div>

<div class="content-area area-post py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 wow fadeInUp">	
				<div class="pr-lg-4">
			        <?php 
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content-products', get_post_format() );
							// If comments are open or we have at least one comment, load up the comment template.
							/*if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;*/
						endwhile; // End of the loop.			
					?>	
				</div>	
			</div> 
			<div class="col-md-4 col-lg-3 d-none d-md-block wow fadeInRight">
				<div class="search-block p-2">
			        <h3 class="m-0 mb-2">Công Cụ Tìm Kiếm</h3>          
		            <form class="form-timkiem" action="<?php bloginfo('url'); ?>/ket-qua-tim-kiem" method="get" accept-charset="utf-8" enctype="multipart/form-data">
		              <input type="text" name="name_search" class="form-control mb-3" placeholder="Nhập địa điểm cần tìm kiếm">
		              <div class="select-box mb-3">
		                <select class="form-control" name="hangxe">
		                   <option value="" selected disabled hidden>Hãng xe</option>
		                  <?php showTaxomi('hangxe');?>
		                </select>
		              </div>
		              <div class="select-box mb-3">
		                <select class="form-control" name="model">
		                  <option value="" selected disabled hidden>Model</option>
		                  <?php showTaxomi('model');?>
		                </select>
		              </div> 
		              <div class="select-box mb-3">
		                <select class="form-control" name="loaixe">
		                  <option value="" selected disabled hidden>Loại xe</option>
		                  <?php showTaxomi('loaixe');?>
		                </select>
		              </div>
		              <div class="select-box mb-3">
		                <select class="form-control" name="color">
		                  <option value="" selected disabled hidden>Màu sắc</option>
		                  <?php showTaxomi('color');?>
		                </select>
		              </div>
		              
		              <div class="select-box mb-3">
		                <select class="form-control" name="xuatxu">
		                  <option value="" selected disabled hidden>Xuất xứ</option>
		                  <?php showTaxomi('xuatxu');?> 
		                </select>
		              </div>
		              <div class="select-box mb-3">
		                <select class="form-control" name="namsanxuat">
		                  <option value="" selected disabled hidden>Năm sản xuất</option>
		                  <?php showTaxomi('namsanxuat');?>
		                </select>
		              </div> 
		              <div class="select-box mb-3">
		                <select class="form-control" name="tinhtrang">
		                  <option value="" selected disabled hidden>Tình trạng</option>
		                  <?php showTaxomi('tinhtrang');?>
		                </select>
		              </div> 
		              <div class="select-box mb-3">
		                <select class="form-control" name="price">
		                  <option value="" selected disabled hidden>Giá tiền</option>
		                  <?php showTaxomi('price');?>
		                </select>
		              </div> 
		              
		              
		              <input type="submit" name="querySearch" class="form-control btn-search text-uppercase" value="Tìm Kiếm">
		              <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
		            </form>                     
			    </div>
			    <div class="line-doted mb-2 mt-5"></div>
  				<h3 class="title-block text-capitalize mb-3">Hãng Xe</h3>
  				<?php
  					$taxonomy_prod = 'danh-muc-san-pham';
	  				$term_children = get_term_children('14',$taxonomy_prod); 
	  				echo '<ul class="list-menu list-inline px-2 py-2 box-3 shadow-img-3">';  
	  				foreach ( $term_children as $child ) { 
		  				$term_child = get_term_by('id', $child, $taxonomy_prod );
		  				//echo $term_child->name;		  				
		  				echo '<li class="px-2 text-capitalize"><a class="py-2 d-block" href="'.get_term_link($term_child->slug, $taxonomy_prod).'" >'. $term_child->name .'</a></li>'; 
		  			}
		  			echo '</ul>';
  				?>

  				<div class="line-doted mb-2 mt-5"></div>
  				<h3 class="title-block text-capitalize mb-3">Loại Xe</h3>
  				<?php
	  				$term_children_2 = get_term_children('19',$taxonomy_prod); 
	  				echo '<ul class="list-menu list-inline px-2 py-2 box-3 shadow-img-3">';  
	  				foreach ( $term_children_2 as $child ) { 
		  				$term_child = get_term_by('id', $child, $taxonomy_prod );
		  				//echo $term_child->name;		  				
		  				echo '<li class="px-2 text-capitalize"><a class="py-2 d-block" href="'.get_term_link($term_child->slug, $taxonomy_prod).'" >'. $term_child->name .'</a></li>'; 
		  			}
		  			echo '</ul>';
  				?>

			</div>
		</div>      
	</div>	
</div>

<?php get_footer(); ?>
