<?php 
	/*Template Name: Change Password Template*/
	get_header();	
	//session_start();
	$page_slug = get_post_field( 'post_name');

	if(is_user_logged_in()){		
		$current_user = wp_get_current_user();
		global $wp_roles;
		$user_login = $current_user->user_login;		
		$avatar = get_user_meta($current_user->ID,'bdsttppic', true);
		$avatar_image =wp_get_attachment_image_src($avatar, 'medium');
		$error = array();  
		$money_post = $current_user->money_post;
		$money_pb_post = $current_user->money_pb_post; 
		
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
		    /* Update user password. */
		    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
		        if ( $_POST['pass1'] == $_POST['pass2'] )
		        	//wp_set_password( $pass1, $current_user->ID );
		            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
		        else
		            $error[] = __('Mật mã bạn nhập không khớp. Mật khẩu của bạn không được cập nhật.', 'profile');
		    }
		    
		    /* Redirect so the page will show updated info.*/
		  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
		    if ( count($error) == 0 ) {
		        //action hook for plugins and extra fields saving
		        do_action('edit_user_profile_update', $current_user->ID);
		        wp_redirect( get_permalink() );
		        //exit;
		    }
		}
	?>
		<div class="wrap-content my-5">
			<div class="container">
				<div class="row">
					<div class="col-md-9 mb-4 mb-md-0">
						<div class="content-list">
							<h2><?php echo get_the_title();?></h2> 
							<p>&nbsp;</p>                
			                <form method="post" id="adduser" action="<?php the_permalink(); ?>">
			                	<div class="row form-group">
			                		<div class="col-sm-4">
			                			<label class="color-primary">Mật khẩu mới:</label>
			                		</div>
			                		<div class="col-sm-8">
			                			<input class="form-control" name="pass1" type="password" />
			                		</div>
			                	</div>
			                	<div class="row form-group">
			                		<div class="col-sm-4">
			                			<label class="color-primary">Nhập lại mật khẩu mới:</label>
			                		</div>
			                		<div class="col-sm-8">
			                			<input class="form-control" name="pass2" type="password" />
			                		</div>
			                	</div>

			                    
			                    <p class="form-submit text-center mt-4">
			                        <?php //echo $referer; ?>
			                        <input name="updateuser" type="submit" id="updateuser" class="btn btn-send" value="<?php _e('Thay đổi mật khẩu', 'profile'); ?>" />
			                        <?php wp_nonce_field( 'update-user' ) ?>
			                        <input name="action" type="hidden" id="action" value="update-user" />
			                    </p><!-- .form-submit -->
			                </form>

			                <?php if ( count($error) > 0 ) echo '<p class="text-danger">' . implode("<br />", $error) . '</p>'; ?>
			            
			        	</div>
					</div>
					<div class="col-md-3">
						<div class="slide-bar"> 
							<div class="block-bar"> 
								<h3>Trang Cá Nhân</h3> 
								<div class="profesional-img p-2">
									<?php if($avatar_image) { ?>
										<img src="<?php echo $avatar_image[0];?>" alt="<?php echo $user_login;?>" class="d-block mx-auto img-fluid">  
									<?php } else {?>
										<i class="fa fa-user" aria-hidden="true"></i>
									<?php } ?>
								</div>
								<div class="full-name"><?php echo $current_user->display_name; ?></div>
							</div>                       
							<div class="block-bar">
								<h3>Quản Lý Thông cá nhân</h3>
								<ul class="list-unstyled">
									<li class="<?php if($page_slug==='thong-tin-ca-nhan') echo"active"?>">
										<a href="<?php echo bloginfo('url').'/thong-tin-ca-nhan'; ?>" title="Thông tin cá nhân" >Thông tin cá nhân</a>
									</li>
									<li class="<?php if($page_slug==='thay-doi-thong-tin') echo"active"?>">
										<a href="<?php echo bloginfo('url').'/thay-doi-thong-tin'; ?>" title="Thay đổi thông tin cá nhân">Thay đổi thông tin cá nhân</a>
									</li>
									<li class="<?php if($page_slug==='thay-doi-mat-khau') echo"active"?>">
										<a href="<?php echo bloginfo('url').'/thay-doi-mat-khau'; ?>" title="Thay đổi mật khẩu">Thay đổi mật khẩu</a>
									</li>
									<li class="<?php if($page_slug==='dang-xuat') echo"active"?>">
										<a href="<?php echo bloginfo('url').'/dang-xuat'; ?>" title="Đăng Xuất">Đăng Xuất</a>
									</li>
								</ul>
							</div>    
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<?php } else {
		echo '<script>window.location = "'.get_bloginfo( 'url' ).'/dang-nhap"</script>';
	} get_footer(); ?>
<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/uploadavatar.js"></script>