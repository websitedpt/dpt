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
<div class="banner banner-general d-flex flex-wrap align-items-center position-relative" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/bg_cat.jpg')">
  <div class="container text-center ">
      <h1 class="text-uppercase page-title mb-3 d-block text-center w-100"><?php echo $taxonomy->name; ?></h1>      
  </div>
</div>

<div class="py-5">
  <div class="container">   
    <div class="row">
      <div class="col-md-8 col-lg-9 wow fadeInUp">    
        <?php if(function_exists('breadcrumb')){  echo '<div class="mb-4 mb-md-5">'; breadcrumb();  echo '</div>';  } ?> 
        <?php if($taxonomy_name == 'danh-muc-san-pham') {
          if($taxonomy->parent == 0) {
            echo '<div class="row">';
            if($term_children) {
              foreach ( $term_children as $child ) {    
                $term = get_term_by('id', $child, $taxonomy_name );
                $image_id = get_term_meta ($term->term_id, 'category-image-id', true );
                $banerUrl = wp_get_attachment_image_src($image_id, 'full')[0];
                if($term->count > 0) { 
                  if($term->count == 1) {
                    $q_Post = new WP_Query(array(
                      'post_type' => 'sanpham',
                      'post_status' => 'publish',
                      'tax_query' => array(
                          array(
                              'taxonomy' => $term->taxonomy,
                              'field' => 'slug',
                              'terms' => $term->slug,
                              'operator' => 'IN'
                          )
                       )
                    ));
                    if($q_Post->have_posts()) {
                      while ($q_Post->have_posts()) { 
                        $q_Post->the_post(); 
                        $post_id = get_the_ID();
                        echo '<div class="col-md-4 my-3 box-1">
                          <a href="' . get_the_permalink() . '" title="'. $term->name .'">
                            <div class="box-fix-h d-flex align-items-center justify-content-center p-3">
                              '.get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto')).'                 
                            </div>
                            <h3 class="mt-3 mb-0 title-h3 text-capitalize text-center text-sm-left">
                              '. $term->name .'
                            </h3>
                          </a>
                        </div>'; 
                      }
                    }
                             
                  } else { 
                    echo '<div class="col-md-4 my-3 box-1">
                      <a href="' . get_term_link( $child, $taxonomy_name ) . '" title="'. $term->name .'">
                        <div class="box-fix-h d-flex align-items-center justify-content-center p-3">
                          <img src="'. $banerUrl.'" class="img-fluid mx-auto" alt="">                    
                        </div>
                        <h3 class="mt-3 mb-0 title-h3 text-capitalize text-center text-sm-left">
                          '. $term->name .'
                        </h3>
                      </a>
                    </div>';  
                  }
                } 
              }
            } else {
              $p_cat = new WP_Query(array(
                'post_type' => 'sanpham',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy_name,
                        'field' => 'slug',
                        'terms' => $taxonomy->slug,
                        'operator' => 'IN'
                    )
                 )
              ));
              if($p_cat->have_posts()) { 
                while ($p_cat->have_posts()) { 
                  $p_cat->the_post(); 
                  $post_id = get_the_ID();
                  $price = get_post_meta($post_id, 'price', true);
                  $price_promo = get_post_meta($post_id, 'price_promo', true);
                  echo '<div class="col-md-4 my-3 box-1">
                    <a href="' . get_the_permalink() . '" title="'. get_the_title() .'">
                      <div class="box-fix-h d-flex align-items-center justify-content-center p-3">
                        '.get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto')).'                 
                      </div>
                      <h3 class="mt-3 mb-0 title-h3 text-capitalize text-center text-sm-left">
                        '. get_the_title() .'
                      </h3>
                      <div class="text-center">
                        <div class="review-star"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></div>
                        <div class="price pb-2">';
                          if($price_promo) { if($price) { echo '<span class="price-promo"><del>'.$price.'</del><sup>(vnđ)</sup></span>'; } else { echo "Liên hệ";} echo '<strong class="pl-2">'.$price_promo.'<sup>(vnđ)</sup></strong>';
                          } else  {
                            echo'<strong>';if($price) { echo $price.'<sup>(vnđ)</sup>'; } else { echo "Liên hệ";} echo '</strong>';
                          }
                        echo '</div>                                            
                      </div>
                    </a>
                  </div>'; 
                }
              }
            }
            echo '</div>';
          } else { 
            $q_products = new WP_Query(array(
            'post_type' => 'sanpham',
            'post_status' => 'publish',
            // 'posts_per_page' => '16', 
            // 'paged'          => $paged,
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
                echo '<div class="row">';
                while ($q_products->have_posts()) { 
                  $q_products->the_post(); 
                  $post_id = get_the_ID();
                  $price = get_post_meta($post_id, 'price', true);
                  $price_promo = get_post_meta($post_id, 'price_promo', true);
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
                        <div class="review-star mb-2"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></div>
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
                  // echo '<div class="col-12">';
                  //   echo panigation();
                  // echo '</div>';
                echo '</div>';          
              
            }
          }   
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
      <div class="col-md-4 col-lg-3 d-none d-md-block wow fadeInRight"><?php get_sidebar(); ?></div>
    </div>
  </div>
</div>
<?php get_footer();
