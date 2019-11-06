<?php /*Template Name: Compare Layout*/ get_header(); $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>
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
  <div class="reset-product">   
    <div class="row align-items-center mb-5">
      <div class="col-md-3">
        <div class="line-doted mb-2"></div>
        <h3 class="title-block text-uppercase mb-3">So Sánh Xe</h3>
      </div>
      <div class="col-md-3">
        <a class="compare-col text-center text-uppercase d-block" href="<?php bloginfo('url'); ?>/san-pham">
          <div class="image d-flex align-items-center justify-content-center">
            <div>
              <i class="fa fa-plus-circle plus" aria-hidden="true"></i>
              <i class="fa fa-car car" aria-hidden="true"></i>              
            </div>
          </div>
          <h5 class="mt-3"><strong>Thêm xe</strong></h5>
        </a>      
      </div>
      <div class="col-md-3">
        <a class="compare-col text-center text-uppercase d-block" href="<?php bloginfo('url'); ?>/san-pham">
          <div class="image d-flex align-items-center justify-content-center">
            <div>
              <i class="fa fa-plus-circle plus" aria-hidden="true"></i>
              <i class="fa fa-car car" aria-hidden="true"></i>              
            </div>
          </div>
          <h5 class="mt-3"><strong>Thêm xe</strong></h5>
        </a>      
      </div>
      <div class="col-md-3">
        <a class="compare-col text-center text-uppercase d-block" href="<?php bloginfo('url'); ?>/san-pham">
          <div class="image d-flex align-items-center justify-content-center">
            <div>
              <i class="fa fa-plus-circle plus" aria-hidden="true"></i>
              <i class="fa fa-car car" aria-hidden="true"></i>              
            </div>
          </div>
          <h5 class="mt-3"><strong>Thêm xe</strong></h5>
        </a>      
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <table class="table tbl1">
          <thead>
            <tr>
              <th class="text-capitalize">MODEL</th>
            </tr>
            <tr>
              <th class="text-capitalize">TÌNH TRẠNG</th>
            </tr>
            <tr>
              <th class="text-capitalize">XUẤT XỨ</th>
            </tr>
            <tr>
              <th class="text-capitalize">PHẠM VI VẬN CHUYỂN</th>
            </tr>
            <tr>
              <th class="text-capitalize">CÔNG SUẤT ĐỘNG CƠ</th>
            </tr>
            <tr>
              <th class="text-capitalize">NĂM SẢN XUẤT</th>
            </tr>
            <tr>
              <th class="text-capitalize">SỐ CHỖ NGỒI</th>
            </tr>
            <tr>
              <th class="text-capitalize">MÀU SẮC</th>
            </tr>
            <tr>
              <th class="text-capitalize">BỘ ĐIỀU KHIỂN</th>
            </tr>
            <tr>
              <th class="text-capitalize">BÌNH ĐIỆN/HỘP ĐIỆN</th>
            </tr>
            <tr>
              <th class="text-capitalize">KÍCH THƯỚC XE (MM)</th>
            </tr>
            <tr>
              <th class="text-capitalize">TỐC ĐỘ TỐI ĐA</th>
            </tr>
            <tr>
              <th class="text-capitalize">KHẢ NĂNG LEO DỐC</th>
            </tr>
            <tr>
              <th class="text-capitalize">TẢI TRỌNG CHO PHÉP</th>
            </tr>
            <tr>
              <th class="text-capitalize">HÃNG XE</th>
            </tr>
            <tr>
              <th class="text-capitalize">LOẠI XE</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="col-md-3">
        <table class="table tbl1">
          <tbody>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="col-md-3">
        <table class="table tbl1">
          <tbody>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="col-md-3">
        <table class="table tbl1">
          <tbody>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>

<script type="text/javascript" charset="utf-8">
  var newArray = getCompareIds();
  if(countCompare()>0) {
    var data = {
          'action': 'show_compare',
          'getCpareID': newArray,
          'security': '<?php echo wp_create_nonce("none_show_compare"); ?>'
      };
      $.post(ajaxurl, data, function(response) {       
        $('.reset-product').html(response);
        $('[data-action="remove-compare"]').on('click', function(event) {
          event.preventDefault();
          var that = $(this);
          var id = that.attr("data-compare-id");
          $name_ck = 'compare_ids_'+id;
          $.removeCookie($name_ck, { path: '/' });
          updateCount(); 
          var pa = that.parents('.product-compare');
          pa.find('.compare-img').addClass('d-none');
          pa.find('.compare-col').addClass('d-block');
       });

      });

  }
</script>

