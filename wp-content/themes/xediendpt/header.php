<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="Shortcut Icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon_32x32.png" sizes="32x32" />
<link rel="icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon_192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri();?>/assets/images/favicon_180x180.png" />
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri();?>/assets/images/favicon_270x270.png" />

<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php wp_head(); 
  if (is_home() || is_front_page()) {?>
        <meta property="og:image" content="<?php echo get_template_directory_uri();?>/assets/images/banner-1.jpg"> 
    <?php } else {     
    echo '<meta property="og:image" content="'. get_the_post_thumbnail_url(get_the_ID(),'full')   .'" />';    
    }
?>

</head>
<body <?php body_class(); ?>>
  <header class="header">
    <div class="header-top-one py-2">
      <div class="container d-flex align-items-center">    
        <!-- <div class="pr-4"><i class="fa fa-envelope-o pr-2 icon" aria-hidden="true"></i><a href="mailto:service@martoyo.net" title="service@martoyo.net">service@martoyo.net</a></div> -->
        <ul class="list-inline social-icon m-0">
          <?php if(get_option('facebook_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('facebook_company').'" target="_blank" title="'.get_option('facebook_company').'"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';}?>
          <?php if(get_option('twitter_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('twitter_company').'" target="_blank" title="'.get_option('twitter_company').'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';}?>
          <?php if(get_option('youtube_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('youtube_company').'" target="_blank" title="'.get_option('youtube_company').'"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>';}?>
          <?php if(get_option('google_plus_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('google_plus_company').'" target="_blank" title="'.get_option('google_plus_company').'"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';}?>
          <?php if(get_option('instagram_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('instagram_company').'" target="_blank" title="'.get_option('instagram_company').'"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';}?>
        </ul>  
        <ul class="list-inline ml-auto mb-0">
          <li class="pl-3 d-inline-block"><a href="<?php bloginfo('url'); ?>/tin-tuc/su-kien/" title="Sự kiện" class="d-inline-block">Sự kiện</a></li>
          <li class="pl-3 d-inline-block"><a href="<?php bloginfo('url'); ?>/cau-hoi-thuong-gap/" title="Câu hỏi thường gặp" class="d-inline-block">Câu hỏi thường gặp</a></li>
          <li class="pl-3 d-inline-block"><a href="<?php bloginfo('url'); ?>/tuyen-dung/" title="Tuyển dụng" class="d-block">Tuyển dụng</a></li>
        </ul>
      </div>       
    </div>
    <div class="header-contact-right d-flex d-md-none justify-content-center pt-2 px-2">
      
      <div class="pr-3 pr-sm-4"><i class="fa fa-envelope-o pr-2 icon" aria-hidden="true"></i><a href="mailto:service@martoyo.net" title="service@martoyo.net">service@martoyo.net sss</a></div>
      <div class="pl-3 pl-sm-4 pr-3 pr-sm-4 border-l"><i class="icon fa fa-phone pr-2"></i><a class="link-phone" href="tel:18000009" title="1800 0009">1800 0009</a></div>
    </div>
    <div class="header-top py-2 py-md-4">
      <div class="container d-flex flex-wrap align-items-center">
        <a class="navbar-brand logo" href="<?php echo get_bloginfo( 'url' );?>" title="Máy rửa sóng siêu âm">
          <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="Máy rửa sóng siêu âm">
        </a>
        <button class="navbar-toggler btn-menu-top d-md-none ml-auto" type="button"><span></span><span></span><span></span></button>

        <div class="header-contact-right d-none d-md-flex align-items-center flex-wrap ml-auto">
          <div class="mr-5">
            <div class="d-flex align-items-center px-3 px-md-0">
              <div class="search-area d-inline-block">
                <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">  
                  <input id="<?php echo $unique_id; ?>" type="search" class="search-field input-searchbox" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s">
                  <div class="actions"><button class="btn btn-searchbox" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">Tìm kiếm</button></div>
                </form>    
              </div>                      
            </div>                
          </div>
          <div class="support hidden-xs">
            <div>Tổng đài tư vấn</div>
            <?php if(get_option('Hotline1') !='') {echo'<a href="tel:'.get_option('Hotline1').'" title="'.get_option('Hotline1').'">'.get_option('Hotline1').'</a>';}?>
            <span>&</span>
            <?php if(get_option('Hotline2') !='') {echo'<a href="tel:'.get_option('Hotline2').'" title="'.get_option('Hotline2').'">'.get_option('Hotline2').'</a>';}?>
          </div>
          <div class="hotline hidden-xs ml-4">
            <div>Hotline</div>
            <?php if(get_option('phone_company') !='') {echo'<a href="tel:'.get_option('phone_company').'" title="'.get_option('phone_company').'">'.get_option('phone_company').'</a>';}?>
          </div>
          
        </div>
      </div>
    </div>
    <nav class="wrap-mmenu navbar navbar-expand-lg p-0">
      <div class="container">                   
        <div class="collapse navbar-collapse">
          <div class="d-lg-flex align-items-center w-100 pb-4 pb-md-0">   
            <a class="navbar-brand logo-sticky d-none mr-3" href="<?php echo get_bloginfo( 'url' );?>">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/logo-sticky.png" alt="Máy rửa sóng siêu âm">
            </a>                          
            <?php if ( has_nav_menu( 'top' ) ) : ?>               
              <?php wp_nav_menu( array(
                'theme_location' => 'top',
                'menu_id'        => 'top-menu',
                'menu_class' => 'navbar-nav'
              ) ); ?>          
            <?php endif; ?> 
            
          </div>
        </div>
      </div>
    </nav>      
  </header><!-- /header -->
  <main class="main mh">
    



