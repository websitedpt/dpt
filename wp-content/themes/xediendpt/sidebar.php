<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$taxonomy = 'danh-muc-san-pham';
$terms = get_terms($taxonomy);

?>

<div class="slider-bar">
  <div class="line-doted mb-2"></div>
  <h3 class="title-block text-capitalize mb-3">Sản phẩm</h3>
    <?php 
    if ( $terms && !is_wp_error( $terms ) ) : 
      echo '<ul class="list-menu list-inline px-3 box-2">';
      foreach ( $terms as $term ) {
        if($term->parent == 0) { ?> 
          <li class="menu-item-has-children"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>" title="<?php echo $term->name; ?>" class="menu-item-has-children"><?php echo $term->name; ?></a>
            <?php $term_children = get_term_children($term->term_id,$taxonomy);?>
              <ul class="menu-list list-inline pl-3">
                <?php  
                  foreach($term_children as $child){
                    $chTerm = get_term_by( 'id', $child, $taxonomy);
                    $termLink = get_term_link( $chTerm );
                    echo "<li><a href='$termLink' title='$chTerm->name'>".$chTerm->name."</a></li>";
                  }
                ?>
              </ul>
          </li>
        <?php } 
      } ?>
    <?php echo '</ul>'; endif; ?>
  <div class="line-doted mb-2 mt-5"></div>
  <h3 class="title-block text-capitalize mb-3">Tin tức</h3>
  <?php
    $args_news = array(
    'category_name' => 'tin-tuc',
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => '7', 
    );
    $query_news = new WP_Query($args_news);
    if ($query_news->have_posts() ) {
      echo '<ul class="list-menu list-inline px-2 box-2">';  
      while ($query_news->have_posts() ) {
        $query_news->the_post();        
        if ( has_post_thumbnail() ) { 
          echo'<li><a href="' . get_the_permalink() .'"  title="' . get_the_title() .'">
              <div class="media">
                  ' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid') ).'                     
                <div class="media-body pl-2">
                  <h5 class="mt-0">' . get_the_title() .'</h5>
                </div>
              </div>
            </a>
          </li>';
        }
      }
      echo '</ul>';
    }
    wp_reset_query();
  ?>
</div>


                