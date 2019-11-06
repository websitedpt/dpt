<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="wrap-vertical">
  <div class="container">
    <div class="row">
      <div class="col-xl-3 d-none d-xl-block">
        <div class="menu-vertical">
          <h4 class="px-3 m-0 text-capitalize">Danh mục sản phẩm</h4>
          <?php $taxonomy_p = 'danh-muc-san-pham';
            $terms_1 = get_terms(array( 'taxonomy' => $taxonomy_p,'orderby' => 'ID','order' => 'ASC' ));            
            if ( $terms_1 && !is_wp_error( $terms_1 ) ) : 
              echo '<ul class="list-inline m-0 pb-3">';
              foreach ( $terms_1 as $term ) {
                if($term->parent == 0) { 
                  $term_children = get_term_children($term->term_id,$taxonomy_p);
                  if($term_children) {?>
                    <li class="px-3"><a href="<?php echo get_term_link($term->slug, $taxonomy_p); ?>" title="<?php echo $term->name; ?>" class="d-block li-pa pl-3 pt-3 text-capitalize"><?php echo $term->name; ?></a>  
                      <ul class="list-inline pl-3 sub-list">
                        <?php  
                          foreach($term_children as $child){
                            $chTerm = get_term_by( 'id', $child, $taxonomy_p);
                            $termLink = get_term_link( $chTerm );
                            echo "<li><a class='py-2 text-capitalize d-block' href='$termLink' title='$chTerm->name'>".$chTerm->name."</a></li>";
                          }
                        ?>
                      </ul>
                    </li>                
                  <?php } else { ?>
                    <li class="px-3 pb-1"><a href="<?php echo get_term_link($term->slug, $taxonomy_p); ?>" title="<?php echo $term->name; ?>" class="d-block li-pa pl-3 pt-3 text-capitalize"><?php echo $term->name; ?></a></li>
                  <?php } 
                } 
              } ?>
            <?php echo '</ul>'; endif; ?>
        </div>
      </div>
      <div class="col-12 col-xl-9">
        <?php if(function_exists('getSliderBanner')){?>
          <div class="banner-home position-relative overflow-hidden">
            <div data-slider class="">
              <!-- wow fadeInDown -->
              <?php echo getSliderBanner(); ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>  
</div> 
  <div class="py-4 bg-gray why-select mt-4 ">
    <div class="container pt-4 pb-1 overflow-hidden">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-4 pb-4 text-center ">Tại sao chọn chúng tôi</h3>
      <div class="row">
        <div class="col-12 col-sm-3 mb-4">
          <div class="box-select py-4 px-4 text-center">
            <div class="img-2">              
              <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-1.png" alt="" class="mr-3 img-fluid mb-3 d-block mx-auto">
            </div>
            <div class="media-body">
              <h5 class="mt-0 mb-2 text-center">THANH TOÁN TÀI CHÍNH DỄ DÀNG</h5>
              <div>Bộ Phận Tài Chính làm việc hiệu suất cao có thể tìm giải pháp tài chính tiết kiệm và tối ưu cho Quý Khách Hàng.</div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-3 mb-4">
          <div class="box-select py-4 px-4 text-center">
            <div class="img-2">              
              <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-2.png" alt="" class="mr-3 img-fluid mb-3 d-block mx-auto">
            </div>
            <div class="media-body">
              <h5 class="mt-0 mb-2 text-center">THƯƠNG HIỆU NỔI TIẾNG</h5>
              <div>Với một sự lựa chọn những hãng xe điện nổi tiếng và uy tín trên Thế Giới.</div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-3 mb-4">
          <div class="box-select py-4 px-4 text-center">
            <div class="img-2">              
              <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-3.png" alt="" class="mr-3 img-fluid mb-3 d-block mx-auto">
            </div>
            <div class="media-body">
              <h5 class="mt-0 mb-2 text-center">ĐƯỢC TÍN NHIỆM BỞI HÀNG NGHÌN NGƯỜI</h5>
              <div>Có 10 đơn đặt hàng mới mỗi ngày. 350 lượt truy cập mỗi tháng và là nơi vô cùng tin cậy của hàng nghìn Khách Hàng.</div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-3 mb-4">
          <div class="box-select py-4 px-4 text-center">
            <div class="img-2">              
              <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-4.png" alt="" class="mr-3 img-fluid mb-3 d-block mx-auto">
            </div>
            <div class="media-body">
              <h5 class="mt-0 mb-2 text-center">DỊCH VỤ BẢO HÀNH BẢO DƯỠNG XE</h5>
              <div>Bộ phận dịch vụ của chúng tôi bảo dưỡng xe của bạn để giữ an toàn trên đường trong nhiều năm nữa.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-md-4 overflow-hidden gthieu-home">
    <div class="container py-4 py-md-5">
      <div class="row align-items-center">
        <div class="col-12 col-md-6 mb-4 mb-md-0"> 
          <div class="pr-md-4 pr-lg-5">
            <h3 class="title-block line-bg-1 text-uppercase mt-0 mb-4 p-0 position-relative d-flex align-items-center">Về Chúng Tôi!</h3>
            <p>Xe điện Đại Phát Tín là đơn vị cung cấp xe ô tô điện chính hãng tại thị trường Việt Nam. Hoạt động kinh doanh chính của chúng tôi hiện nay là phân phối, cung ứng dịch vụ bảo trì sửa chữa và cung cấp phụ tùng xe ô tô điện. Sản xuất và kinh doanh xe tải điện nhập khẩu nguyên chiếc & đóng thùng xe tải điện.</p>
            <p>Hiện nay, xe điện Đại Phát tín là một trong những nhà nhập khẩu lớn xe ô tô điện chính hãng. Với nhiều mẫu mã đa dạng, đem lại cho người dân Việt Nam những sản phẩm xe điện bốn bánh đa dạng, chất lượng giá cả hợp lý.</p>
            <a href="<?php bloginfo('url'); ?>/gioi-thieu" class="read-more px-4 text-capitalize rounded mt-3 mb-4 mb-md-0" title="">Xem thêm <i class="fa fa-angle-right pl-2" aria-hidden="true"></i></a>                
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="">
            <div class="img-wrap img-decoration">
              <div class="bg-img" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/showroom-xe-dien-dai-phat-tin.jpg')">
              </div>
            </div>
          </div>
        </div>  
      </div> 
    </div>        
  </div> 
  
  <div class="py-5 prod-home">
    <div class="container pt-4 pb-3 overflow-hidden">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-4 pb-4 text-center">Sản Phẩm</h3>
    </div>
    <div class="container">
      <?php $taxonomy_prod = 'danh-muc-san-pham'; //$terms = get_terms($taxonomy_prod); 
      $terms = get_terms(array(
        'taxonomy' => $taxonomy_prod,
        'orderby' => 'ID',
        'order' => 'ASC' 
      ));
        if ( $terms && !is_wp_error( $terms ) ) : 
          foreach ( $terms as $term ) {
            if($term->parent == 0) { 
              $term_children = get_term_children($term->term_id,$taxonomy_prod); ?> 
              <div class="row mb-4">
                <div class="col-12">   
                  <div>    
                    <div class="title-block title-b-3 position-relative line-bg-3 text-uppercase mt-2 mb-5 pb-2 d-flex align-items-center flex-wrap"><?php echo $term->name; ?>
                      <div class="ml-md-auto d-flex flex-wrap align-items-center">
                        <ul class="list-inline list-tabs mb-0 mr-md-4 nav" role="tablist">
                          <?php
                            $stt= 1;                            
                            foreach ( $term_children as $child ) { 
                              $term_child = get_term_by('id', $child, $taxonomy_prod );
                              if($term_child->count > 0) {
                                $class1 ='';
                                if($stt==1) {
                                  $class1 ='active';
                                }
                                echo '<li class="list-inline-item"><a class="px-0 px-sm-2 nav-link '.$class1.'" id="home-tab" data-toggle="tab" href="#'.$term_child->slug.'" role="tab" aria-controls="home" >'. $term_child->name .'</a></li>'; 
                                $stt ++;
                              }                              
                            }
                          ?>
                        </ul>
                        <a title="Xem tất cả" href="<?php echo get_term_link($term->slug, $taxonomy_prod); ?>" class="view-all text-capitalize pull-right pl-2 pl-md-0">Xem tất cả <i class="fa fa-eye"></i></a>                        
                      </div>
                    </div>
                    <div class="tab-content">                      
                      <?php 
                        if($term_children) {
                          $pst= 1;
                          foreach ( $term_children as $child ) {    
                            $term_child = get_term_by('id', $child, $taxonomy_prod );

                            //$image_id = get_term_meta ($term_child->term_id, 'category-image-id', true );
                            //$banerUrl = wp_get_attachment_image_src($image_id, 'full')[0];
                             if($term_child->count > 0) {                            
                              //if($term_child->count == 1) {                              
                              // if($term->term_id == 14) {
                              //   $q_Post = new WP_Query(array(
                              //     'post_type' => 'sanpham',
                              //     'post_status' => 'publish',
                              //     'posts_per_page' => '8',
                              //     'tax_query' => array(
                              //         array(
                              //             'taxonomy' => $term->taxonomy,
                              //             'field' => 'slug',
                              //             'terms' => $term_child->slug,
                              //             'operator' => 'IN'
                              //         )
                              //      )
                              //   ));
                              // } else {
                                $q_Post = new WP_Query(array(
                                  'post_type' => 'sanpham',
                                  'post_status' => 'publish',
                                  'posts_per_page' => '4',
                                  'tax_query' => array(
                                      array(
                                          'taxonomy' => $term->taxonomy,
                                          'field' => 'slug',
                                          'terms' => $term_child->slug,
                                          'operator' => 'IN'
                                      )
                                   )
                                ));                                
                              // }
                                $active1 ='';
                                if($pst==1) {
                                  $active1 ='active';
                                }
                                echo '<div class="tab-pane fade show '.$active1.'" id="'.$term_child->slug.'" role="tabpanel"><div class="row">';
                                  if($q_Post->have_posts()) {
                                    while ($q_Post->have_posts()) { 
                                      $q_Post->the_post(); 
                                      $post_id = get_the_ID();
                                      $price = get_post_meta($post_id, 'price', true);
                                      if($price) {
                                        $price = number_format($price);
                                      }
                                      $price_promo = get_post_meta($post_id, 'price_promo', true);
                                      if($price_promo) {
                                        $price_promo = number_format($price_promo);
                                      }
                                      echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
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
                                                if($price_promo) { if($price) { echo '<span class="price-promo"><del>'.$price.'</del><sup>(vnđ)</sup></span>'; } else { echo "Liên hệ";} echo '<strong class="pl-2">'.$price_promo.'<sup>(vnđ)</sup></strong>';
                                                } else  {
                                                  echo'<strong>';if($price) { echo $price.'<sup>(vnđ)</sup>'; } else { echo "Liên hệ";} echo '</strong>';
                                                }
                                              echo '</div>                                            
                                            </div>
                                          </div>
                                        </a>
                                      </div>'; 
                                    }
                                  }
                                  echo '<div class="col-12 mb-4 text-center">';?>
                                    <a class="text-center text-capitalize read-more rounded px-3 mt-3 mb-4 mb-md-0" href="<?php echo get_term_link($term_child->slug, $taxonomy_prod); ?>" title="<?php echo $term_child->name; ?>">Xem thêm <?php echo $term_child->name; ?> <i class="fa fa-angle-right pl-2" aria-hidden="true"></i></a>
                                  <?php echo '</div>';
                                echo '</div></div>';
                              //} 
                              $pst ++;
                            }                           
                          }
                        } else {                          
                          $post_prod = new WP_Query(array(
                            'post_type' => 'sanpham',
                            'post_status' => 'publish',
                            'posts_per_page' => '4',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $term->taxonomy,
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                    'operator' => 'IN'
                                )
                             )
                          ));
                          echo '<div class="tab-pane fade show active" id="'.$term->slug.'" role="tabpanel"><div class="row">';
                            if($post_prod->have_posts()) {
                              while ($post_prod->have_posts()) { 
                                $post_prod->the_post(); 
                                $post_id = get_the_ID();
                                $price = get_post_meta($post_id, 'price', true);
                                if($price) {
                                  $price = number_format($price);
                                }
                                $price_promo = get_post_meta($post_id, 'price_promo', true);
                                if($price_promo) {
                                  $price_promo = number_format($price_promo);
                                }
                                echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
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
                                        if($price_promo) { if($price) { echo '<span class="price-promo"><del>'.$price.'</del><sup>(vnđ)</sup></span>'; } else { echo "Liên hệ";} echo '<strong class="pl-2">'.$price_promo.'<sup>(vnđ)</sup></strong>';
                                          } else  {
                                              echo'<strong>';if($price) { echo $price.'<sup>(vnđ)</sup>'; } else { echo "Liên hệ";} echo '</strong>';
                                            }
                                            echo '</div>                                            
                                      </div>
                                    </div>
                                  </a>
                                </div>'; 
                              }
                            }
                          echo '</div></div>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php }
          }  
        endif; ?>
    </div>
  </div>
  

  <div class="pb-4 review-custome">
    <div class="container py-3 overflow-hidden">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-3 mb-md-5 pb-4 text-center">Đánh giá khách hàng</h3>
      <?php 
        $post_news_videos = new WP_Query(array(
          'post_type' => 'review',
          'post_status' => 'publish',
          'posts_per_page' => '6',          
        ));
        if($post_news_videos->have_posts()) {
          echo '<div class="row" data-review>';
          while ($post_news_videos->have_posts()) {
            $post_news_videos->the_post(); 
            $post_id = get_the_ID();
            $chucvu = get_post_meta($post_id, 'chucvu', true );
            $name_review = get_post_meta($post_id, 'name_review', true );
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
            
            ?>  
            <div class="col-12 py-3">
              <div class="item item-block p-5 p-sm-3 p-lg-5">
                <div class="media align-items-center">
                  <div class="left-media text-center">
                    <div class="img-review mt-0 mb-3 mx-auto">
                      <?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' =>'img-fluid mx-auto') ); ?>
                    </div>
                    <h5 class="mb-1"><?php echo $name_review; ?></h5>
                    <div class="revie-chuvu"><?php echo $chucvu; ?></div>                    
                  </div>
                                         
                  <div class="media-body pl-3">
                    <?php echo get_the_content(); ?>
                  </div>
                </div>
              </div>
            </div>             
          <?php } 
          echo '</div>';
        } 
      wp_reset_postdata();  ?>      
    </div>
  </div>
  <div class="py-4 py-md-5 news-home bg-gray">
    <div class="container py-3">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-5 pb-4 text-center">Tin tức</h3>
      <?php echo news_home();?>
    </div>
  </div>
  <div class="show-room py-4 py-md-5">
    <div class="container py-3 overflow-hidden">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-3 pb-4 text-center">Hệ thống showroom</h3>
      <?php 
        $post_news_videos = new WP_Query(array(
          'post_type' => 'showroom',
          'post_status' => 'publish',
          'posts_per_page' => '-1',          
        ));
        if($post_news_videos->have_posts()) {
          $stt = 1;$acti = 1;
          $active_class ='';$active_cl ='';
          echo '<div class="row justify-content-center mt-4">';
            echo '<div class="col-md-5 order-md-2"><div class="block-room p-2 p-sm-3"><ul class="nav nav-tabs">';
              while ($post_news_videos->have_posts()) {
                $post_news_videos->the_post(); 
                $post_id = get_the_ID();
                $slug = get_post_field( 'post_name', $post_id );
                $addres_room = get_post_meta($post_id, 'addres_room', true );
                $mapview = get_post_meta($post_id, 'mapview', true );
                if($acti==1) { $active_cl ='active'; }
                ?>
                <li class="d-block w-100">
                  <a class="block-room-inner d-block p-3" data-toggle="tab" href="#<?php echo $slug;?>">
                    <h5 class="mt-0 text-uppercase mb-2"><?php echo get_the_title();?></h5>
                    <div class="media align-items-center">
                      <div class="icon-map"><i class="fa fa-map-marker" aria-hidden="true"></i></div>                  
                      <div class="media-body pl-2"><?php echo $addres_room; ?></div>
                    </div>    
                  </a>
                </li>            
              <?php $acti ++;  } 
            echo '</ul></div></div>';
            echo '<div class="col-md-7 d-none d-sm-block"><div class="tab-content">';
              while ($post_news_videos->have_posts()) {
                $post_news_videos->the_post(); 
                $post_id = get_the_ID();
                $slug = get_post_field( 'post_name', $post_id );
                $addres_room = get_post_meta($post_id, 'addres_room', true );
                $mapview = get_post_meta($post_id, 'mapview', true );
                if($stt==1) { $active_class ='active'; } else {$active_class ='fade';}
                ?>                 
                <div class="tab-pane <?php echo $active_class; ?>" id="<?php echo $slug;?>">
                  <div class="room-map border-1">
                    <iframe src="<?php echo $mapview; ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                  </div>
                </div>
              <?php $stt ++; } 
            echo '</div></div>';
            
          echo '</div>';
        } 
      wp_reset_postdata();  ?>  
    </div>
  </div>

  <?php
   $id_array = array(208,107);
    
    $args = array(
        // 'post_type' => 'sanpham',
        'post__in' => $id_array,
        // 'post_status' => 'publish',
        // 'posts_per_page' => '3',
    );
    // var_dump($args);
    
    // $args = array(
    //  'post_type'=> 'post',
    //  'post_status' => 'publish',
    //  'posts_per_page' => -1 // this will retrive all the post that is published 
    // );
    $listPost = new WP_Query($args);
    global $post;
    if ( $listPost-> have_posts() ) :
      $stt = 1 ;
      while ( $listPost->have_posts() ) : $listPost->the_post();
        echo get_the_title();
      endwhile;
    endif; 
    wp_reset_postdata(); 
  ?>

  <?php get_footer();?>