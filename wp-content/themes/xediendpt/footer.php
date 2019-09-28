    </main>
    
    <footer class="footer pt-4 pt-md-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-4 mb-3 mb-md-0 overflow-hidden ">
            <div class="pr-lg-5 wow fadeInRight">
              <h2 class="title-h2 mb-4 text-uppercase"><strong>CÔNG TY TNHH <?php bloginfo('name');?></strong></h2>
              <ul class="address list-unstyled px-0">
                <?php if(get_option('address_company') !='') {echo'<li class="mb-3 address-icon">'.get_option('address_company').'</li>';}?>
                <?php if(get_option('phone_company') !='') {echo'<li class="mb-3 hotline-icon">'.get_option('phone_company').'</li>';}?>
                <?php if(get_option('fax_company') !='') {echo'<li class="mb-3 fax-icon">'.get_option('fax_company').'</li>';}?>
                <?php if(get_option('mail_company') !='') {echo'<li class="mb-3 mail-icon">'.get_option('mail_company').'</li>';}?>
              </ul>              
            </div>
          </div>
          <div class="col-md-8 overflow-hidden">
            <div class="row wow fadeInDown">
              <div class="col-6 col-md-4">
                <h4 class="title-h4 pb-2 mb-3 text-capitalize">Sản Phẩm</h4>
                <?php
                  $taxonomy = 'danh-muc-san-pham';
                  $terms = get_terms($taxonomy);
                  if ( $terms && !is_wp_error( $terms ) ) : 
                    echo '<ul class="list-unstyled list-i">';
                    foreach ( $terms as $term ) {
                      if($term->parent == 0) { ?>                         
                        <li class="mb-2"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a></li>
                      <?php } 
                    }
                  echo '</ul>'; endif;
                ?>                 
              </div>
              <div class="col-6 col-md-4">
                 <h4 class="title-h4 pb-2 mb-3 text-capitalize">Liên Kết nhanh</h4>
                 <ul class="list-unstyled list-i">
                   <li class="mb-2"><a href="<?php bloginfo('url'); ?>/gioi-thieu" title="Giới thiệu">Giới thiệu</a></li>
                   <li class="mb-2"><a href="<?php bloginfo('url'); ?>/tin-tuc" title="Tin tức">Tin tức</a></li>
                   <li class="mb-2"><a href="<?php bloginfo('url'); ?>/lien-he" title="Liên hệ">Liên hệ</a></li>
                   <li class="mb-2"><a href="<?php bloginfo('url'); ?>/tuyen-dung" title="Tuyển dụng">Tuyển dụng</a></li>
                   <li class="mb-2"><a href="<?php bloginfo('url'); ?>/tin-tuc/su-kien" title="Sự kiện">Sự kiện</a></li>
                   <li class="mb-2"><a href="<?php bloginfo('url'); ?>/cau-hoi-thuong-gap" title="Câu hỏi thường gặp">Câu hỏi thường gặp</a></li>
                 </ul>
              </div>
              <div class="col-sm-12 col-md-4">
                <div class=" wow fadeInLeft">
                  <div class="wrap-fb overflow-hidden mb-4">
                    <div id="fb-root"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=215651349123280&autoLogAppEvents=1"></script><div class="fb-page" data-href="https://www.facebook.com/xedienchokhachdulich/" data-tabs="timeline" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/xedienchokhachdulich/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/xedienchokhachdulich/">Xe điện Đại Phát Tín</a></blockquote></div>
                  </div>
                  <?php echo newsLetter(); ?>                  
                </div>
              </div>
            </div>
          </div>          
        </div>
      </div>  
      <div class="ft-bottom py-3 mt-3 mt-md-4">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-md-5 order-md-1 text-md-right mb-2 mb-md-0">
              <div class="follow">
                <span class="pr-4">Follow Us: </span>
                <ul class="list-inline social-icon d-inline-block mb-0">
                  <?php if(get_option('facebook_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('facebook_company').'" target="_blank" title="'.get_option('facebook_company').'"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';}?>
                  <?php if(get_option('twitter_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('twitter_company').'" target="_blank" title="'.get_option('twitter_company').'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';}?>
                  <?php if(get_option('youtube_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('youtube_company').'" target="_blank" title="'.get_option('youtube_company').'"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>';}?>
                  <?php if(get_option('google_plus_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('google_plus_company').'" target="_blank" title="'.get_option('google_plus_company').'"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';}?>
                  <?php if(get_option('instagram_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('instagram_company').'" target="_blank" title="'.get_option('instagram_company').'"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';}?>
                 </ul>
              </div>
            </div>
            <?php if(get_option('copy_right') !='') {echo'<div class="col-12 col-md-7">© '.get_option('copy_right').'</div>';}?>      
          </div>  
        </div>     
      </div>    
    </footer>
    <a id="totop" class="totop" href="#" title="To top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
    <?php wp_footer(); ?>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/script.js"></script>
    <script type="text/javascript">
      $("#subscribe-form").on("click","#btn-subscribe",function(){
        // var dataForm = $('#subscribe-form').serialize();
        var email_sub = $('#subscribe-form .mail_subscribe').val();
        $(".new-letter .error-sub-mail").text('');
        $(".new-letter .success-sub-mail").remove();    
        if(email_sub != 0){
          if(isValidEmailAddress(email_sub)){
            $.ajax({
                type : "post", //Phương thức truyền post hoặc get
                dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
                url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data : {
                    action: "thongbao", //Tên action
                    email_sub : email_sub,//Biến truyền vào xử lý. $_POST['website']
                },
                context: this,
                // beforeSend: function(){
                //   //$(".new-letter").append('<div class="loading">Loading&#8230;</div>')
                // },
                success: function(response) {
                  if(response.success) {
                      //alert('email trùng lặp');
                      window.alert('Cảm ơn bạn đã đăng ký nhận bản tin của chúng tôi!.');
                    }                   
                    else {
                      $(".new-letter .error-sub-mail").text('Địa chỉ Email của bạn đã đăng ký');
                      //$(".new-letter").append('<div class="success-sub-mail"><div class="inner-success-mail">Subscribe email success</div></div>');
                    }
                  //$("body").find(".loading").remove();
                    //Làm gì đó khi dữ liệu đã được xử lý
                    /*if(response.success) {
                        alert(response.data);
                    }
                    else {
                        alert('Đã có lỗi xảy ra');
                    }*/
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    //Làm gì đó khi có lỗi xảy ra
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            })
          } else {
            $(".new-letter .error-sub-mail").text('Địa chỉ Email của bạn không đúng!.');
          }
        } else {
          $(".new-letter .error-sub-mail").text('Địa chỉ Email của bạn không đúng!.');
        }    
        return false;  
      });
      function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
      }

      function pauseAllVideos() { 
        var iframe = document.getElementById('iframe-video');
            iframe.src = iframe.src;
      }
      function getId(url) {
          var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
          var match = url.match(regExp);

          if (match && match[2].length == 11) {
              return match[2];
          } else {
              return 'error';
          }
      }
    </script>
  </body>
</html>