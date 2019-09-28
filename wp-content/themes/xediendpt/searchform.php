<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Tìm kiếm cho: ', 'label', 'twentyseventeen' ); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Nhập từ khóa cần tìm kiếm &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit btn btn-default"><?php echo _x( 'Tìm Kiếm', 'submit button', 'twentyseventeen' ); ?></span></button>
</form>
