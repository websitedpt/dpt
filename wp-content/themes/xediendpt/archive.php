<?php
get_header();  
  $Catalog = get_category( get_query_var( 'cat' ) );
  $nameCatalog = $Catalog->slug;
	$postNo = $wp_query->found_posts;
	$catalogName = $Catalog->name; 
  $getArrayCatlogParent = $Catalog->category_parent;
  $getParentSlug = get_category($getArrayCatlogParent)->slug; 
  $taxonomy = get_queried_object();  
  $taxonomy_name = $taxonomy->taxonomy;  
  $term_id = $taxonomy->term_id;  
  $term_children = get_term_children($term_id,$taxonomy_name);  
  $cat_id = $taxonomy->term_id;
  $child_categories=get_categories(array( 'parent' => $cat_id ));
  //$post_type = get_post_type();
  
  $big = 999999999;
  if ( get_query_var('paged') ) {
    $paged = get_query_var('paged'); 
  } elseif ( get_query_var('page') ) { 
    $paged = get_query_var('page');
  } else {
    $paged = 1;
  }   
?>
<div class="banner banner-general d-flex flex-wrap align-items-end position-relative" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/bg_cat.jpg')">
  <div class="container">
      <h1 class="text-uppercase page-title mb-3 d-block w-100"><?php echo $taxonomy->name; ?></h1> 
  </div>
</div>

<div class="py-5">
  <div class="container">   
    <div class="row">
      <div class="col-md-8 col-lg-9 wow fadeInUp">    
        <?php if(function_exists('breadcrumb')){  echo '<div class="mb-4 mb-md-5">'; breadcrumb();  echo '</div>';  } 
          if($taxonomy->description !='') {
            echo '<div class="row"><div class="col-12 taxomy_descript mb-4">';
            echo $taxonomy->description;
            echo '</div></div>';
          }
        if($taxonomy_name == 'danh-muc-san-pham') {
          echo catalog_grid_2($taxonomy->slug);
              $q_products = new WP_Query(array(
              'post_type' => 'sanpham',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy_name,
                    'field' => 'slug',
                    'terms' => $taxonomy->slug,
                    'operator' => 'IN'
                )
              )
            ));
              if($q_products->have_posts()) {
                echo '<div class="row product">';
                while ($q_products->have_posts()) { 
                  $q_products->the_post(); 
                  $post_id = get_the_ID();
                  $price = get_post_meta($post_id, 'price', true);
                  if($price) {
                    $price = number_format($price);
                  }
                  $price_promo = get_post_meta($post_id, 'price_promo', true);
                  if($price_promo) {
                    $price_promo = number_format($price_promo);
                  }
                ?>
                  <div class="col-md-4 my-3 box-1">
                    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                      <div class="box-fix-h d-flex align-items-center justify-content-center p-3">
                        <?php if(has_post_thumbnail()){ echo get_the_post_thumbnail($post_id, 'full', array( 'class' => 'img-fluid mx-auto')); } ?>
                      </div>
                      <h3 class="mt-3 mb-2 title-h3 text-capitalize text-center text-sm-left">
                        <?php echo get_the_title(); ?>
                      </h3>
                      <div class="text-center">
                        <div class="d-flex flex-wrap mb-2 align-items-center justify-content-center">
                          <div class="review-star pr-2"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></div>
                          <div class="compare-prod" data-compare-id = "<?php echo $post_id; ?>">
                            <div class="compare-add px-2 rounded" data-compare-id = "<?php echo $post_id; ?>" data-action="add-compare"><span class="text-compare">So Sánh</span> <i class="fa fa-plus-square-o" aria-hidden="true"></i></div> 
                            <div class="compare-remove px-2 rounded d-none" data-compare-id = "<?php echo $post_id; ?>" data-action="remove-compare"><span class="text-compare">
                              <div class="comparing">Đang So Sánh</span> <i class="fa fa-balance-scale" aria-hidden="true"></i></div>                     
                              <div class="compare-hover d-none">Bỏ So Sánh</span> <i class="fa fa-minus-square-o" aria-hidden="true"></i></div>                     
                          </div>
                          </div>
                        </div>
                        <div class="price pb-2">
                         <?php if($price_promo) { if($price) { echo '<span class="price-promo"><del>'.$price.'</del><sup>(vnđ)</sup></span>'; } else { echo "Liên hệ";} echo '<strong class="pl-2">'.$price_promo.'<sup>(vnđ)</sup></strong>';
                          } else  {
                            echo'<strong>';if($price) { echo $price.'<sup>(vnđ)</sup>'; } else { echo "Liên hệ";} echo '</strong>';
                          }
                        echo '</div>'; ?>                                          
                      </div>
                    </a>
                  </div>
                <?php }
                echo '</div>';         
              }
          //}   
        } else {  ?>    
          <?php if ($postNo<=1) {?>
            <div class="row"><div class="col-12">
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
            </div></div>       
          <?php } else { 
            echo catalog_grid($nameCatalog); echo panigation(); 
          } 
        }?>
      </div>
      <div class="col-md-4 col-lg-3 d-none d-md-block wow fadeInRight">
        <?php if($taxonomy_name == 'danh-muc-san-pham') { ?>
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
        <?php } else { get_sidebar(); } ?>
          
        </div>
    </div>
  </div>
</div>
<?php get_footer();


