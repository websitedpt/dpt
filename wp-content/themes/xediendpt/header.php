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
<?php wp_head(); //session_start();

  if (is_home() || is_front_page()) {?>
      <meta property="og:title" content="The Crypto Sight - Your Daily Crypto Insight." />
      <meta property="og:description" content="Brings you the latest news on cryptocurrency and technology. TheCryptoSight covers all aspects of crypto asset and blockchain technology." />
      <meta property="og:image" content="<?php echo get_template_directory_uri();?>/assets/images/banner-1.jpg"> 
    <?php } else {     
    echo '<meta property="og:image" content="'. get_the_post_thumbnail_url(get_the_ID(),'full')   .'" />';    
    }
?>

</head>
<body <?php body_class(); ?>>
  <header class="header">
    <div class="header-top-one py-2 d-block">
      <div class="container d-flex align-items-center"> 
        <div class="d-flex d-md-none justify-content-center w-100">
          <div class="support hidden-xs">
            <div>Tổng đài tư vấn</div>
            <?php if(get_option('Hotline1') !='') {echo'<a href="tel:'.get_option('Hotline1').'" title="'.get_option('Hotline1').'">'.get_option('Hotline1').'</a>';}?>
            <span>&</span>
            <?php if(get_option('Hotline2') !='') {echo'<a href="tel:'.get_option('Hotline2').'" title="'.get_option('Hotline2').'">'.get_option('Hotline2').'</a>';}?>
          </div>
          <div class="hotline hidden-xs ml-2 ml-sm-3">
            <div>Hotline</div>
            <?php if(get_option('phone_company') !='') {echo'<a href="tel:'.get_option('phone_company').'" title="'.get_option('phone_company').'">'.get_option('phone_company').'</a>';}?>
          </div>             
        </div>   
        <ul class="list-inline social-icon m-0 d-none d-lg-block">
          <?php if(get_option('facebook_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('facebook_company').'" target="_blank" title="'.get_option('facebook_company').'"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';}?>
          <?php if(get_option('twitter_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('twitter_company').'" target="_blank" title="'.get_option('twitter_company').'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';}?>
          <?php if(get_option('youtube_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('youtube_company').'" target="_blank" title="'.get_option('youtube_company').'"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>';}?>
          <?php if(get_option('google_plus_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('google_plus_company').'" target="_blank" title="'.get_option('google_plus_company').'"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';}?>
          <?php if(get_option('instagram_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('instagram_company').'" target="_blank" title="'.get_option('instagram_company').'"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';}?>
        </ul>  
        <ul class="list-inline ml-auto mb-0 d-none d-lg-block">
          <li class="pl-3 d-inline-block"><a href="<?php bloginfo('url'); ?>/tin-tuc/su-kien/" title="Sự kiện" class="d-inline-block">Sự kiện</a></li>
          <li class="pl-3 d-inline-block"><a href="<?php bloginfo('url'); ?>/cau-hoi-thuong-gap/" title="Câu hỏi thường gặp" class="d-inline-block">Câu hỏi thường gặp</a></li>
          <li class="pl-3 d-inline-block"><a href="<?php bloginfo('url'); ?>/tuyen-dung/" title="Tuyển dụng" class="d-block">Tuyển dụng</a></li>
          <?php if(is_user_logged_in()){
            $current_user = wp_get_current_user();
            $user_login = $current_user->user_login;
            //$user_avatar = esc_url( get_avatar_url( $current_user->ID ) );
            //echo "<pre>", var_dump($current_user ), "</pre>";
            $avatar = get_user_meta($current_user->ID,'bdsttppic', true);
            $avatar_image =wp_get_attachment_image_src($avatar, 'medium');
          ?>
            <li class="pl-3 d-inline-block">
              <div class="user-after-login">
                <a href="#" class="profile-image" data-toggle="dropdown">
                  <div><i class="fa fa-angle-double-down" aria-hidden="true"></i><?php echo $user_login;?>
                  <div class="avarta-user">
                    <?php if($avatar_image) {?>
                      <img src="<?php echo $avatar_image[0];?>" alt="<?php echo $user_login;?>" class="img-fluid">
                    <?php } else {?>
                      <i class="fa fa-user" aria-hidden="true"></i>
                    <?php } ?>
                  </div>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php bloginfo('url'); ?>/thong-tin-ca-nhan" title="Thông tin cá nhân"><i class="fa fa-info" aria-hidden="true"></i>Thông tin cá nhân</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php bloginfo('url'); ?>/thay-doi-thong-tin" title="Quản lý thông tin"><i class="fa fa-cog"></i>Quản lý thông tin</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo bloginfo('url').'/thay-doi-mat-khau'; ?>" title="Thay đổi mật khẩu"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Thay đổi mật khẩu</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo wp_logout_url(); ?>" title="Đăng xuất"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                </ul>
              </div>
            </li>
          <?php } else {?>  
            <li class="pl-3 d-inline-block"><a href="<?php bloginfo('url'); ?>/dang-ky/" title="Đăng ký" class="d-block"><i class="fa fa-user-circle-o pr-1" aria-hidden="true"></i>Đăng ký</a></li>
            <li class="pl-3 d-inline-block"><a href="<?php bloginfo('url'); ?>/dang-nhap/" title="Đăng nhập" class="d-block"><i class="fa fa-sign-in pr-1" aria-hidden="true"></i>Đăng nhập</a></li>
          <?php } ?>
        </ul>
      </div>       
    </div>
    <div class="header-top py-2 py-md-2 py-lg-4">
      <div class="container d-flex flex-wrap align-items-center">
        <a class="navbar-brand logo mx-md-auto" href="<?php echo get_bloginfo( 'url' );?>" title="<?php echo get_bloginfo( 'name' );?>">
          <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="<?php echo get_bloginfo( 'name' );?>">
        </a>
        <button class="navbar-toggler btn-menu-top d-lg-none ml-auto" type="button"><span></span><span></span><span></span></button>

        <div class="header-contact-right d-none d-md-flex align-items-center flex-wrap ml-auto">
          <div class="mr-md-3 mr-xl-5">
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
          <div class="hotline hidden-xs ml-md-3  ml-xl-4">
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
              <img src="<?php echo get_template_directory_uri();?>/assets/images/logo-sticky.png" alt="<?php echo get_bloginfo( 'name' );?>">
            </a>                          
            <?php if ( has_nav_menu( 'top' ) ) : ?>               
              <?php wp_nav_menu( array(
                'theme_location' => 'top',
                'menu_id'        => 'top-menu',
                'menu_class' => 'navbar-nav'
              ) ); ?>          
            <?php endif; ?> 
            <ul class="list-inline ml-auto mb-0 d-lg-none list-m">
              <li class="pl-3 d-block"><a href="<?php bloginfo('url'); ?>/tin-tuc/su-kien/" title="Sự kiện" class="d-block">Sự kiện</a></li>
              <li class="pl-3 d-block"><a href="<?php bloginfo('url'); ?>/cau-hoi-thuong-gap/" title="Câu hỏi thường gặp" class="d-block">Câu hỏi thường gặp</a></li>
              <li class="pl-3 d-block"><a href="<?php bloginfo('url'); ?>/tuyen-dung/" title="Tuyển dụng" class="d-block">Tuyển dụng</a></li>
              <?php if(is_user_logged_in()){
                $current_user = wp_get_current_user();
                $user_login = $current_user->user_login;
                //$user_avatar = esc_url( get_avatar_url( $current_user->ID ) );
                //echo "<pre>", var_dump($current_user ), "</pre>";
                $avatar = get_user_meta($current_user->ID,'bdsttppic', true);
                $avatar_image =wp_get_attachment_image_src($avatar, 'medium');
              ?>
                <li class="pl-3 d-block">
                  <div class="user-after-login show">
                    <a href="#" class="profile-image" data-toggle="dropdown">
                      <div><i class="fa fa-angle-double-down" aria-hidden="true"></i><?php echo $user_login;?>
                      <div class="avarta-user">
                        <?php if($avatar_image) {?>
                          <img src="<?php echo $avatar_image[0];?>" alt="<?php echo $user_login;?>" class="img-fluid">
                        <?php } else {?>
                          <i class="fa fa-user" aria-hidden="true"></i>
                        <?php } ?>
                      </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu show">
                      <li><a href="<?php bloginfo('url'); ?>/thong-tin-ca-nhan" title="Thông tin cá nhân"><i class="fa fa-info" aria-hidden="true"></i>Thông tin cá nhân</a></li>
                      <li class="divider"></li>
                      <li><a href="<?php bloginfo('url'); ?>/thay-doi-thong-tin" title="Quản lý thông tin"><i class="fa fa-cog"></i>Quản lý thông tin</a></li>
                      <li class="divider"></li>
                      <li><a href="<?php echo bloginfo('url').'/thay-doi-mat-khau'; ?>" title="Thay đổi mật khẩu"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Thay đổi mật khẩu</a></li>
                      <li class="divider"></li>
                      <li><a href="<?php echo wp_logout_url(); ?>" title="Đăng xuất"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                    </ul>
                  </div>
                </li>
              <?php } else {?>  
                <li class="pl-3 d-block"><a href="<?php bloginfo('url'); ?>/dang-ky/" title="Đăng ký" class="d-block"><i class="fa fa-user-circle-o pr-1" aria-hidden="true"></i>Đăng ký</a></li>
                <li class="pl-3 d-block"><a href="<?php bloginfo('url'); ?>/dang-nhap/" title="Đăng nhập" class="d-block"><i class="fa fa-sign-in pr-1" aria-hidden="true"></i>Đăng nhập</a></li>
              <?php } ?>
            </ul>
            
          </div>
        </div>
      </div>
    </nav>      
  </header><!-- /header -->
  <main class="main mh">
    



