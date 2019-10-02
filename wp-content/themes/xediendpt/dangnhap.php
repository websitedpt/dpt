<?php
/*
Template Name: DangNhap
*/
get_header();
?>

  <div class="container mt-md-5">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="block-2">
          <h3>Đăng nhập</h3>
          <div class="content-block">
            <form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
              <?php
                $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
                if ( $login === "failed" ) {  
                  echo '<p class="error text-center">Tên đăng nhập hoặc mật khẩu không đúng !</p>';  
                } elseif ( $login === "empty" ) {  
                  echo '<p class="error text-center">Tên đăng nhập hoặc mật khẩu không được để trống !</p>';  
                } elseif ( $login === "false" ) {  
                  echo '<p class="error text-center">Bạn đã đăng xuất !</p>';  
                }
                $redirect_to= site_url( $_SERVER['REQUEST_URI']);
              ?>
              <div class="form-group">
                 <input id="user_login" class="form-control" type="text" value="" name="log" placeholder="Tên Đăng Nhập*">
              </div>
              <div class="form-group">
                <input id="user_pass" type="password" value="" name="pwd" placeholder="Mật khẩu *" class="form-control">
              </div>
              <div class="form-group text-right">
                <a href="<?php bloginfo('url'); ?>/lost-password.php" title="Quên mật khẩu?" style="font-weight: bold;">Quên mật khẩu?</a>
              </div>
              <div class="wrap-btn text-center">
                <input type="submit" name="wp-submit" id="wp-submit" class="btn read-more px-4" value="Đăng Nhập">
                <input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
                <input type="hidden" value="1" name="testcookie">
              </div>
            </form>               

          </div>
        </div>
      </div>
    </div>
  </div>
<?php get_footer() ?>
