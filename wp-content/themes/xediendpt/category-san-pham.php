<?php
get_header();   $Catalog = get_category( get_query_var( 'cat' ) );$nameCatalog = $Catalog->slug;$postNo = $wp_query->found_posts;
?> 
<div class="banner-feature"><img src="<?php echo get_template_directory_uri();?>/assets/images/bg-blog.jpg" class="img-responsive center-block" alt=""></div>
<div class="container"><?php if(function_exists('breadcrumb')){breadcrumb();} ?></div>
<div class="container product">
  <?php if ($postNo<=1) {?>
    <div class="row">
      <div class="col-sm-8 col-md-9">
      <?php
          /* Start the Loop */
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/post/content', get_post_format() );
          // If comments are open or we have at least one comment, load up the comment template.
          /*if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;*/
        endwhile; // End of the loop. 
        ?>
      </div>
      <div class="col-sm-4 col-md-3 hidden-xs">
        <?php get_sidebar(); ?>
      </div>
    </div>
  <?php   
  } else {
    $cat_id = $Catalog->cat_ID;
    $child_categories=get_categories(array( 'parent' => $cat_id ));
    if(count($child_categories) > 0 ) { ?>
      <div class="row">
        <?php foreach ( $child_categories as $child ) { //var_dump($child_categories);?> 
          <div class="col-sm-4 col-md-3">
            <div class="item-2">
              <div class="post-media">
                <a href="<?php echo site_url();?>/<?php echo $nameCatalog?>/<?php echo $child ->slug; ?>" title="<?php echo $child ->name; ?>">
                  <div class="table">
                    <div class="table-cell"><?php echo $child ->description; ?> </div>
                  </div>
                </a>
              </div>
              <div class="post-content">
                <h3><a href="<?php echo site_url();?>/<?php echo $nameCatalog?>/<?php echo $child ->slug; ?>" title="<?php echo $child ->name; ?>"><?php echo $child ->name; ?></a></h3>
              </div>
            </div>  
          </div>         
        <?php  } ?>
      </div>
    <?php } 
  } ?>
</div>
<?php get_footer();
