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
  <div class="row mb-4 mb-md-5 wow fadeInDown ">
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
<?php get_footer();
