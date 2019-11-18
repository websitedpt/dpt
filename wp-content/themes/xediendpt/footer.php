    </main>    
    <footer class="footer pt-4 pt-md-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-4 mb-3 mb-md-0 overflow-hidden ">
            <div class="pr-lg-5">
              <h2 class="title-h2 mb-4 text-uppercase"><strong>CÔNG TY TNHH <?php bloginfo('name');?></strong></h2>
              <ul class="address list-unstyled px-0">
                <?php if(get_option('address_company') !='') {echo'<li class="mb-3 address-icon">'.get_option('address_company').'</li>';}?>
                <?php if(get_option('phone_company') !='') {echo'<li class="mb-3 hotline-icon">'.get_option('phone_company').'</li>';}?>
                <?php if(get_option('fax_company') !='') {echo'<li class="mb-3 fax-icon">'.get_option('fax_company').'</li>';}?>
                <?php if(get_option('mail_company') !='') {echo'<li class="mb-3 mail-icon">'.get_option('mail_company').'</li>';}?>
              </ul>    
              <div class="wrap-fb overflow-hidden mb-3">
                <div id="fb-root"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=215651349123280&autoLogAppEvents=1"></script><div class="fb-page" data-href="https://www.facebook.com/xedienchokhachdulich/" data-tabs="timeline" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/xedienchokhachdulich/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/xedienchokhachdulich/">Xe điện Đại Phát Tín</a></blockquote></div>
              </div>

            </div>
          </div>
          <div class="col-md-8 overflow-hidden">
            <?php 
              $post_news_videos = new WP_Query(array(
                'post_type' => 'showroom',
                'post_status' => 'publish',
                'posts_per_page' => '-1',          
              ));
              if($post_news_videos->have_posts()) {
                echo '<ul class="list-showroom list-inline d-md-flex flex-md-wrap">';
                  while ($post_news_videos->have_posts()) {
                    $post_news_videos->the_post(); 
                    $post_id = get_the_ID();
                    $slug = get_post_field( 'post_name', $post_id );
                    $addres_room = get_post_meta($post_id, 'addres_room', true );
                    $mapview = get_post_meta($post_id, 'mapview', true );
                    ?>
                    <li class="mb-4 mb-md-4"><h4 class="mt-0 text-uppercase mb-2 pb-1"><strong><?php echo get_the_title();?></strong></h4><div><?php echo $addres_room; ?></div></li>     
                  <?php }
                echo '</ul>';
              } 
            wp_reset_postdata();  ?>  
          </div>                    
        </div>
      </div>  
      <div class="ft-bottom py-2 mt-3 mt-md-4">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-md-4 order-md-2 mb-2 mb-md-0">
                <?php echo newsLetter(); ?> 
            </div>
            <div class="col-12 col-md-4 order-md-2 mb-2 mb-md-0 ml-auto">
              <div class="follow d-md-flex justify-content-center">
                <div>
                  <div class="pr-4">Theo dõi chúng tôi: </div>
                  <ul class="list-inline social-icon d-inline-block mb-0">
                    <?php if(get_option('facebook_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('facebook_company').'" target="_blank" title="'.get_option('facebook_company').'"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';}?>
                    <?php if(get_option('pinterest_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('pinterest_company').'" target="_blank" title="'.get_option('pinterest_company').'"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>';}?>
                    <?php if(get_option('twitter_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('twitter_company').'" target="_blank" title="'.get_option('twitter_company').'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';}?>
                    <?php if(get_option('youtube_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('youtube_company').'" target="_blank" title="'.get_option('youtube_company').'"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>';}?>
                    
                    <?php if(get_option('instagram_company') !='') {echo'<li class="list-inline-item"><a href="'.get_option('instagram_company').'" target="_blank" title="'.get_option('instagram_company').'"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';}?>
                   </ul>                 
                </div>
              </div>
            </div>
            <?php if(get_option('copy_right') !='') {echo'<div class="col-12 col-md-4">© '.get_option('copy_right').'</div>';}?>      
          </div>  
        </div>     
      </div>    
    </footer>
    <?php if(get_option('phone_company') !='') {?>
    <div class="hotline-phone-ring-wrap">
      <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle d-flex align-items-center justify-content-center">
          <a href="tel:<?php echo get_option('phone_company');?>" class="pps-btn-img"><img class="img-fluid" src="<?php echo get_template_directory_uri();?>/assets/images/icon-phone.png" alt="Số điện thoại" width="50"></a>
        </div>
      </div>
      <div class="hotline-bar">
        <a href="tel:<?php echo get_option('phone_company');?>">
          <span class="text-hotline"><?php echo get_option('phone_company');?></span>
        </a>
      </div>
    </div>
  <?php } ?>
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
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5d9489326c1dde20ed0496e6/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.cookie.js"></script>
    <script>     
      var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
      // $('.product ')
      function allProduct() {
        $('.product .compare-prod').each(function(){
          var that = $(this);
          var compare_Id = $(this).data('compare-id');
          updateCount(); 
          for(var i = 0; i <= getCompareIds().length; i++) {
            if(compare_Id == getCompareIds()[i]) {
              var el_this =$(this);
              el_this.find('.compare-add').addClass('d-none');
              el_this.find('.compare-remove').removeClass('d-none');
            }
          }
        });
      }
      allProduct();
      $('[data-action="add-compare"]').on('click', function(event) {
        event.preventDefault();
        var that = $(this);
        var id = that.attr("data-compare-id");
        $name_ck = 'compare_ids_'+id;
        //console.log(countCompare());
        if(countCompare()<3) {
          $.cookie($name_ck, id,{path:'/'});
          that.addClass('d-none');
          parents = that.parent();
          parents.find('[data-action="remove-compare"]').removeClass('d-none');
          updateCount(); 
        } else {
          $('.compare-header').show();
          setTimeout(function(){$('.compare-header').hide();}, 5000);
        }
      });
     $('[data-action="remove-compare"]').on('click', function(event) {
        event.preventDefault();
        var that = $(this);
        var id = that.attr("data-compare-id");
        $name_ck = 'compare_ids_'+id;
        // $.removeCookie($name_ck, id);
        $.removeCookie($name_ck, { path: '/' });
        that.addClass('d-none');
        var pa = that.parent();
        pa.find('.compare-add').removeClass('d-none');
        updateCount(); 
        allProduct();
     });
      function getCompareIds() {
        let cookies = $.cookie('');
        let ids = [];
         for(let field in cookies) {
            if (field.indexOf('compare_ids') >= 0) {
              ids.push(cookies[field]);
            }
         }
         return ids;
     }
     function countCompare() {
       return getCompareIds().length;
     }
     function updateCount() {
        let count = countCompare();
        $('[data-contains="compare-count"]').text(count);

     }      
    updateCount();    
    setTimeout(function(){$('.compare-header').hide();}, 5000);    
       
    </script>
  </body>
</html>