<?php
/**
* Template Name:  Login 

*/


$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;

get_header();

if ( ! is_user_logged_in() ) {



   /* $args = array
        'redirect' => admin_url(), // redirect to admin dashboard.
        'form_id' => 'custom_loginform',
        'label_username' => __( 'Username:' ),
        'label_password' => __( 'Password:' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log Me In' ),
         'remember' => true
    );
wp_login_form( $args );*/

?>
<div class="container">
	<div class="row justify-content-center">

		<div class="col-md-6 contents">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="form-block">
						<div class="mb-4">
						<h3><?= __('Sign In to <strong>RealEstate</strong>'); ?></h3>

						</div>

                          <form action="<?php echo esc_url( home_url( '/wp-login.php' ) ); ?>" method="post">

                      <?php
							if ( $login === "failed" ) {
							  echo '<div class="alert alert-danger" role="alert">' . __("<strong>ERROR:</strong> Invalid username and/or password.") . '</div>';
							} elseif ( $login === "empty" ) {
							  echo '<div class="alert alert-danger" role="alert">' . __("<strong>ERROR:</strong> Username and/or Password is empty.") . '</div>';
							} elseif ( $login === "false" ) {
							  echo '<div class="alert alert-success" role="alert">' . __("<strong>INFO:</strong> You are logged out.") . '</div>';
							}
							?>
        
        
                               <div class="form-group first">
									
									<label for="user_login"><?php esc_html_e( 'Username', 'realestate' ); ?></label>
                                     <input class="form-control" type="text" name="log" id="<?= __('user_login') ; ?>" placeholder="<?= __('Username or Email Address') ?>">
								</div>
								<div class="form-group last mb-4">
									
									<label for="user_pass"><?php esc_html_e( 'Password', 'realestate' ); ?></label>
                                    <input class="form-control" type="password" name="pwd" id="<?= __('user_pass'); ?>" placeholder="<?= __('Password'); ?>">
								</div>
								<div class="d-flex mb-5 align-items-center">
									<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
									<input type="checkbox" checked="checked">
									<div class="control__indicator"></div>
									</label>
								    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
								</div>
								 
								  <input type="submit" id="<?= esc_attr(__('wp-submit')); ?>" name="wp-submit" value="<?php esc_attr_e( 'Log In' ); ?>" class="btn btn-pill text-white btn-block btn-primary">
                                   <input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url() ); ?>">
								 <span class="d-block text-center my-4 text-muted"> or sign in with</span>
								<div class="social text-center">
									<ul>
                                        
                                        <li><a class="wow fadeInUp animated" href="https://www.facebook.com/kimarotec" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://plus.google.com/kimarotec" data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec" data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>
                                        
                                    </ul> 
								</div>
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
} else {

	wp_logout();
    // Display a message for logged-in users
   

   }


get_footer();
?>
    
    <!-- <p>
    <?php //esc_html_e( 'You are log out.', 'RealEstate' ); ?>
</p> -->
    




								