<?php
/*
  Template Name: Result Search
*/  
get_header(); global $wpdb;?>
  <div class="wrap-result-search py-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">          
          <div class="real-list">
            <?php 
              if (isset($_GET['name_search'])) {
                $name_search = $_GET['name_search'];
              }                  
              if (isset($_GET['hangxe'])) {
                $hangxe = $_GET['hangxe'];              
              }
              if (isset($_GET['loaixe'])) {
                $loaixe = $_GET['loaixe'];              
              }
              if (isset($_GET['xuatxu'])) {
                $xuatxu = $_GET['xuatxu'];              
              }
              if (isset($_GET['namsanxuat'])) {
                $namsanxuat = $_GET['namsanxuat'];              
              }
              if (isset($_GET['tinhtrang'])) {
                $tinhtrang = $_GET['tinhtrang'];              
              }
              if (isset($_GET['color'])) {
                $color = $_GET['color'];              
              }
              if (isset($_GET['price'])) {
                $price = $_GET['price'];              
              }
              if (isset($_GET['model'])) {
                $model = $_GET['model'];              
              }
            $post = array(
              's' => $name_search,
              'post_type' => 'sanpham',
              'post_status' => 'publish',
              'posts_per_page' => '-1',
              'order' => 'ASC',
              'meta_query' => array(
                'relation' => 'OR',
                  array(
                    'key' => 'hangxe',
                    'value' => $hangxe,
                    'compare' => 'LIKE'
                  ),
                ),
                array(
                  'relation' => 'OR',
                  array(
                    'key' => 'loaixe',
                    'value' => $loaixe,
                    'compare' => 'LIKE'
                  )
                ),
                array(
                  'relation' => 'OR',
                  array(
                    'key' => 'xuatxu',
                    'value' => $xuatxu,
                    'compare' => 'LIKE'
                  )
                ),
                array(
                  'relation' => 'OR',
                  array(
                    'key' => 'namsanxuat',
                    'value' => $namsanxuat,
                    'compare' => 'LIKE'
                  )
                ),
                array(
                  'relation' => 'OR',
                  array(
                    'key' => 'tinhtrang',
                    'value' => $tinhtrang,
                    'compare' => 'LIKE'
                  )
                ),
                array(
                  'relation' => 'OR',
                  array(
                    'key' => 'color',
                    'value' => $color,
                    'compare' => 'LIKE'
                  )
                ),
                array(
                  'relation' => 'OR',
                  array(
                    'key' => 'price',
                    'value' => $price,
                    'compare' => 'LIKE'
                  )
                ),
                array(
                  'relation' => 'OR',
                  array(
                    'key' => 'model',
                    'value' => $model,
                    'compare' => 'LIKE'
                  )
                ),
                            
            );

            $timKiem = new WP_Query( $post );
            //echo "<pre>", var_dump($timKiem), "</pre>";
            ?>
            <div class="row">
              <div class="col-12">
                <h2 class="title-block line-bg-1 text-uppercase mt-0 mb-4 p-0 position-relative d-flex align-items-center">Có <strong style="color:red" class="px-2"><?php echo $timKiem->found_posts; ?></strong> sản phẩm đã tìm kiếm.</span></h2>
              </div>
            </div>            
            <?php
            if($timKiem->have_posts()) {
              echo '<div class="row">';
              while ( $timKiem->have_posts() ) : $timKiem->the_post();
                $postid = get_the_ID();
                $content = get_the_content(); 
                $price = get_post_meta($post_id, 'price', true);
                $price_promo = get_post_meta($post_id, 'price_promo', true);
                echo '<div class="col-sm-6 col-md-4 mb-4">
                  <a href="' . get_the_permalink() . '" title="'. get_the_title() .'">
                    <div class="animation-bg">
                      <div class="table-img">
                        <div class="table-cell p-3 py-md-3 px-md-3 overflow-hidden">
                          '.get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block')).' 
                        </div>
                      </div>
                      <div class="px-2 text-center">
                        <h4 class="title-product pt-3 position-relative">'. get_the_title() .'</h4>  
                        <div class="review-star"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></div>
                        <div class="price pb-2">';
                        if($price_promo) { echo '<del class="pr-2">'.$price_promo.'</del>'; }
                          echo'<strong>';if($price) { echo $price; } else { echo "Liên hệ";} echo '</strong>
                        </div>                                            
                      </div>
                    </div>
                  </a>
                </div>';              
              endwhile;
              echo "</div>";
              //Reset Post Data
              wp_reset_postdata();
            } else {
              echo "Không có nội dung nào khớp với yêu cầu tìm kiếm của bạn!";
            }

          //}
          ?>          
          </div>
        </div>
        <div class="col-sm-3">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer();
