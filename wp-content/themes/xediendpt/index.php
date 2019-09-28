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
      <div class="col-lg-3">
        <div class="menu-vertical">
          <h4 class="px-3 m-0 text-capitalize">Danh mục sản phẩm</h4>
          <ul class="list-inline m-0 pb-3">
            <li class="px-3"><a href="ss" title="ss" class="d-block li-pa pl-3 pt-3 text-capitalize">Xe ô tô điện</a>
              <ul class="list-inline pl-3 sub-list">
                <li><a href="" title="" class="py-2 text-capitalize d-block">Xe điện Eagle</a></li>
                <li><a href="" title="" class="py-2 text-capitalize d-block">Xe điện Eagle</a></li>
                <li><a href="" title="" class="py-2 text-capitalize d-block">Xe điện Eagle</a></li>
                <li><a href="" title="" class="py-2 text-capitalize d-block">Xe điện Eagle</a></li>
              </ul>
            </li>
            <li class="px-3"><a href="ss" title="ss" class="d-block li-pa pl-3 pt-3 text-capitalize">Xe điện chuyên dụng</a>
              <ul class="list-inline pl-3 sub-list">
                <li><a href="" title="" class="py-2 text-capitalize d-block">Xe điện Eagle</a></li>
                <li><a href="" title="" class="py-2 text-capitalize d-block">Xe điện Eagle</a></li>
                <li><a href="" title="" class="py-2 text-capitalize d-block">Xe điện Eagle</a></li>                
              </ul>
            </li>
            <li class="px-3"><a href="ss" title="ss" class="d-block li-pa pl-3 pt-3 text-capitalize">Phụ tùng chính hãng</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
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
  
  <div class="py-md-4 overflow-hidden bg-gray mt-4 gthieu-home">
    <div class="container py-4 py-md-5">
      <div class="row align-items-center">
        <div class="col-12 col-md-6 mb-4 mb-md-0"> 
          <div class="wow fadeInLeft pr-md-4">
            <h3 class="title-block line-bg-1 text-uppercase mt-0 mb-4 p-0 position-relative d-flex align-items-center">Về Chúng Tôi!</h3>
            <p>Xe điện Đại Phát Tín là đơn vị cung cấp xe ô tô điện chính hãng tại thị trường Việt Nam. Hoạt động kinh doanh chính của chúng tôi hiện nay là phân phối, cung ứng dịch vụ bảo trì sửa chữa và cung cấp phụ tùng xe ô tô điện. Sản xuất và kinh doanh xe tải điện nhập khẩu nguyên chiếc & đóng thùng xe tải điện.</p>
            <p>Hiện nay, xe điện Đại Phát tín là một trong những nhà nhập khẩu lớn xe ô tô điện chính hãng. Với nhiều mẫu mã đa dạng, đem lại cho người dân Việt Nam những sản phẩm xe điện bốn bánh đa dạng, chất lượng giá cả hợp lý.</p>
            <a href="<?php bloginfo('url'); ?>/gioi-thieu" class="read-more px-4 text-capitalize rounded mt-3" title="">Xem thêm <i class="fa fa-angle-right pl-2" aria-hidden="true"></i></a>                
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="wow fadeInRight">
            <div class="img-wrap img-decoration">
              <div class="bg-img" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/showroom-xe-dien-dai-phat-tin.jpg')">
              </div>
            </div>
          </div>
        </div>  
      </div> 
    </div>        
  </div> 
  
  <div class="py-5">
    <div class="container pt-4 pb-3 overflow-hidden">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-4 pb-4 text-center wow fadeInDown">Sản Phẩm</h3>
    </div>
    <div class="container">
      <?php $taxonomy_prod = 'danh-muc-san-pham'; $terms = get_terms($taxonomy_prod); 
        if ( $terms && !is_wp_error( $terms ) ) : 
          foreach ( $terms as $term ) {
            if($term->parent == 0) { ?> 
              <div class="row mb-4">
                <div class="col-12">   
                  <div class="wow fadeInUp" data-wow-duration="2s">    
                    <div class="title-block title-b-3 position-relative line-bg-3 text-uppercase mt-2 mb-5 pb-2 d-flex align-items-center flex-wrap"><?php echo $term->name; ?>
                      <div class="ml-auto d-flex flex-wrap align-items-center">
                        <ul class="list-inline list-tabs mb-0 mr-md-4 nav" role="tablist">
                          <li class="list-inline-item">
                            <a class="px-2 nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" >Home</a>
                          </li>
                          <li class="list-inline-item">
                            <a class="px-2 nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Profile</a>
                          </li>
                          <li class="list-inline-item">
                            <a class="px-2 nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact">Contact</a>
                          </li>
                        </ul>
                        <a title="Xem tất cả" href="<?php echo get_term_link($term->slug, $taxonomy_prod); ?>" class="view-all text-capitalize pull-right">Xem tất cả <i class="fa fa-eye"></i></a>                        
                      </div>
                    </div>
                    <div class="tab-content">
                      <div class="row">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                      </div>
                      <?php 
                        $q_Post = new WP_Query(array(
                          'post_type' => 'sanpham',
                          'post_status' => 'publish',
                          'posts_per_page' => '8',
                          'tax_query' => array(
                              array(
                                  'taxonomy' => $term->taxonomy,
                                  'field' => 'id',
                                  'terms' => $term->term_id,
                                  'operator' => 'IN'
                              )
                           )
                        ));
                        if($q_Post->have_posts()) {
                          while ($q_Post->have_posts()) { 
                            $q_Post->the_post(); 
                            $post_id = get_the_ID();
                            $price = get_post_meta($post_id, 'price', true);
                            $price_promo = get_post_meta($post_id, 'price_promo', true);
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
                                    if($price_promo) { echo '<del class="pr-2">'.$price_promo.'</del>'; }
                                      echo'<strong>';if($price) { echo $price; } else { echo "Liên hệ";} echo '</strong>
                                    </div>                                            
                                  </div>
                                </div>
                              </a>
                            </div>'; 
                          }
                        }
                      ?>
                      
                    </div>
                  </div>
                </div>
              </div>
            <?php } 
          }  endif; ?>
    </div>
  </div>
  <div class="py-5  bg-gray why-select">
    <div class="container pt-4 pb-3 overflow-hidden wow zoomIn">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-5 pb-4 text-center ">Tại sao chọn chúng tôi</h3>
      <div class="row">
        <div class="col-6 mb-4">
          <div class="box-select p-5">
            <div class="media">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-1.png" alt="" class="mr-3 img-fluid">                    
              <div class="media-body pl-2">
                <h5 class="mt-0 mb-2">THANH TOÁN TÀI CHÍNH DỄ DÀNG</h5>
                <div>Bộ Phận Tài Chính làm việc hiệu suất cao có thể tìm giải pháp tài chính tiết kiệm và tối ưu cho Quý Khách Hàng.          </div>
              </div>
            </div>            
          </div>
        </div>
        <div class="col-6 mb-4">
          <div class="box-select p-5">
            <div class="media">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-2.png" alt="" class="mr-3 img-fluid">                    
              <div class="media-body pl-2">
                <h5 class="mt-0 mb-2">THƯƠNG HIỆU NỔI TIẾNG</h5>
                <div>Với một sự lựa chọn những hãng xe điện nổi tiếng và uy tín trên Thế Giới.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="box-select p-5">
            <div class="media">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-3.png" alt="" class="mr-3 img-fluid">                    
              <div class="media-body pl-2">
                <h5 class="mt-0 mb-2">ĐƯỢC TÍN NHIỆM BỞI HÀNG NGHÌN NGƯỜI</h5>
                <div>Có 10 đơn đặt hàng mới mỗi ngày. 350 lượt truy cập mỗi tháng và là nơi vô cùng tin cậy của hàng nghìn Khách Hàng.        </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="box-select p-5">
            <div class="media">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/icon-4.png" alt="" class="mr-3 img-fluid">                    
              <div class="media-body pl-2">
                <h5 class="mt-0 mb-2">DỊCH VỤ BẢO HÀNH BẢO DƯỠNG XE</h5>
                <div>Bộ phận dịch vụ của chúng tôi bảo dưỡng xe của bạn để giữ an toàn trên đường trong nhiều năm nữa.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-5 review-custome">
    <div class="container pt-4 pb-3 overflow-hidden">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-5 pb-4 text-center wow fadeInDown">Đánh giá khách hàng</h3>
      <?php 
        $post_news_videos = new WP_Query(array(
          'post_type' => 'review',
          'post_status' => 'publish',
          'posts_per_page' => '6',          
        ));
        if($post_news_videos->have_posts()) {
          echo '<div class="row wow fadeInUp" data-review>';
          while ($post_news_videos->have_posts()) {
            $post_news_videos->the_post(); 
            $post_id = get_the_ID();
            $chucvu = get_post_meta($post_id, 'chucvu', true );
            $name_review = get_post_meta($post_id, 'name_review', true );
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
            
            ?>  
            <div class="col-12 py-3">
              <div class="item item-block p-5">
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
                <!-- <a href="<?php echo $link_videos; ?>" title="<?php echo get_the_title(); ?>" data-modal-video>
                  <div class="bg-img mb-3 mb-md-4 position-relative rounded" style="background-image: url('<?php echo $thumb['0'] ?>')"><div class="icon-play"></div></div>
                </a>    
                <h3 class="title-h3 mt-3 mb-3 mb-md-4"><a href="<?php echo $link_videos; ?>" title="<?php echo get_the_title(); ?>" data-modal-video><?php echo get_the_title(); ?></a></h3> -->
              </div>
            </div>             
          <?php } 
          echo '</div>';
        } 
      wp_reset_postdata();  ?>      
    </div>
  </div>
  <div class="py-5 news-home bg-gray">
    <div class="container pt-4 pb-3">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-5 pb-4 text-center wow fadeInDown">Tin tức</h3>
      <?php echo news_home();?>
    </div>
  </div>
  <div class="show-room py-5">
      <div class="container pt-4 pb-3 overflow-hidden">
        <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-3 pb-4 text-center wow fadeInDown">Hệ thống showroom</h3>
        <?php 
          $post_news_videos = new WP_Query(array(
            'post_type' => 'showroom',
            'post_status' => 'publish',
            'posts_per_page' => '-1',          
          ));
          if($post_news_videos->have_posts()) {
            echo '<div class="row wow fadeInUp justify-content-center">';
            while ($post_news_videos->have_posts()) {
              $post_news_videos->the_post(); 
              $post_id = get_the_ID();
              $addres_room = get_post_meta($post_id, 'addres_room', true );
              ?>  
              <div class="col-6 col-sm-4 col-md-4 mt-4">
                <div class="block-room py-5 px-5">
                  <h5 class="mt-0 text-uppercase mb-3"><?php echo get_the_title();?></h5>
                  <div class="media">
                    <div class="icon-map"><i class="fa fa-map-marker" aria-hidden="true"></i></div>                  
                    <div class="media-body pl-2"><?php echo $addres_room; ?></div>
                  </div>                  
                </div>
              </div>
            <?php } 
            echo '</div>';
          } 
        wp_reset_postdata();  ?>  
      </div>
    </div>
  
  <?php get_footer();?>