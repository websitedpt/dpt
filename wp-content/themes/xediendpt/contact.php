<?php /*Template Name: Contact Layout*/ get_header(); $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>
<div class="banner banner-general d-flex flex-wrap align-items-end position-relative" style="background-image: url('<?php if($thumb) {
  echo $thumb['0'];
} else {
  echo get_template_directory_uri()."/assets/images/bg_contact.jpg";
} ?>')">
  <div class="container">
      <h1 class="text-uppercase page-title mb-3 d-block w-100"><?php echo get_the_title();?></h1>      
  </div>
</div>

<div class="container py-5 contact-form overflow-hidden"> 
  <?php if(function_exists('breadcrumb')){  echo '<div class="mb-4 mb-md-5">'; breadcrumb();  echo '</div>';  } ?>  
  <div class="row wow fadeInDown ">
    <div class="col-md-4 mb-3 mb-md-0">
      <div class="box-contacts-icon d-flex align-items-center justify-content-center p-4">
        <div class="text-center">
          <i class="fa fa-mobile icon-3 icon-mobile" aria-hidden="true"></i>                  
          <div class="line-2"></div>
          <div>
            <?php if(get_option('phone_company') !='') {?>
            <a class="d-block" href="tel:<?php echo get_option('phone_company'); ?>" title="<?php echo get_option('phone_company'); ?>"><?php echo get_option('phone_company'); ?></a>
            <?php } ?>            
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3 mb-md-0">
      <div class="box-contacts-icon d-flex align-items-center justify-content-center p-4">
        <div class="text-center">
          <i class="fa fa-building-o icon-3" aria-hidden="true"></i>                
          <div class="line-2"></div>
         <?php if(get_option('address_company') !='') {echo '<div>'.get_option('address_company').'</div>';} ?>
        </div> 
      </div>
    </div>
    <div class="col-md-4 mb-3 mb-md-0">
      <div class="box-contacts-icon d-flex align-items-center justify-content-center p-4">
        <div class="text-center">
          <i class="fa fa-comments-o icon-3" aria-hidden="true"></i>                
          <div class="line-2"></div>
        <div>
          <?php if(get_option('mail_company') !='') {?>
          <a class="d-block" href="<?php echo get_option('mail_company'); ?>" title="<?php echo get_option('mail_company'); ?>"><?php echo get_option('mail_company'); ?></a>
          <?php } ?>
        </div>  

        </div>
      </div>
    </div>
  </div>
</div>
<div class="bg-gray">
  <div class="container py-5">
    <div class="row pt-md-3">           
      <div class="col-md-6 mb-4 mb-md-0 wow fadeInLeft">
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.341896410303!2d106.6665240151754!3d10.8615791922638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529c6ac840f33%3A0x283aac56dc986446!2zWGUgxJBp4buHbiDEkOG6oWkgUGjDoXQgVMOtbjogeGUgxJFp4buHbiBzw6JuIGdvbGYsIHJlc29ydCwgY2jhu58ga2jDoWNoLCB4ZSDEkWnhu4duIGNo4bufIGLhu4duaCBuaMOibiwgY2jhu58gaMOgbmc!5e0!3m2!1svi!2s!4v1569339122392!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>   
      </div>
      <div class="col-md-6 wow fadeInRight">
        <div>
          <?php echo contactForm(); ?>        
        </div>
      </div>
    </div>
  </div>  
</div>
<div class="show-room py-4 py-md-5">
    <div class="container py-3 overflow-hidden">
      <h3 class="title-block position-relative line-bg-2 text-uppercase mt-0 mb-4 pb-4 text-center">Hệ thống showroom</h3>
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
<?php get_footer();
