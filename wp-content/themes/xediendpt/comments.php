<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="wrap-conment-fb">	
	<div class="fb-comments" data-href="https://www.facebook.com/Ng%C3%B4i-Nh%C3%A0-H%E1%BA%A1nh-Ph%C3%BAc-NNHP-1819350291656874/" data-numposts="2" width="100%"></div>
</div>