<?php
/**
* Template Name:  Login 

*/
 // Код для обработки данных формы
if ( isset( $_POST['submit'] ) ) {
        $username = sanitize_user( $_POST['username'] );
        $email = sanitize_email( $_POST['email'] );
        $password = esc_attr( $_POST['password'] );

        $new_user = array(
            'user_login' => $username,
            'user_email' => $email,
            'user_pass' => $password,
            'role' => 'subscriber',
            'show_admin_bar_front' => false // display the Admin Bar for the user 'true' or 'false'
        );
        
        $user_id = wp_insert_user( $new_user );
        //$user_id = wp_create_user( $username, $password, $email );
        
        if ( is_wp_error( $user_id ) ) {
            $error_message = $user_id->get_error_message();
            wp_die( $error_message );
        } else {
        	$user = get_user_by( 'login', $username );
            wp_set_password( $password, $user->ID );
            $creds = array(
                'user_login'    => $username,
                'user_password' => $password,
                'remember'      => true
            );
            $user = wp_signon( $creds, false );
            wp_redirect( home_url() );
            exit;
        }
    }

$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;

get_header();

if ( is_user_logged_in() ) {


   wp_logout();
    // Display a message for logged-in users
   

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
} else {


?>
 <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title"><?= __('Home New account / Sign in ', 'realestate'); ?></h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->
 

        <!-- register-area -->
        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">

                <div class="col-md-6">
                    <div class="box-for overflow">
                        <div class="col-md-12 col-xs-12 register-blocks">
                            <h2><?php _e('New account', 'realestate'); ?> : </h2> 

			           

                      <?php echo do_shortcode( '[realestate_registration_form]' ); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-for overflow">                         
                        <div class="col-md-12 col-xs-12 login-blocks">
                            <h2>Login : </h2> 
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
                                <div class="form-group">
                                    <label for="user_login"><?php esc_html_e( 'Email', 'realestate' ); ?></label>
                                    <input type="text" class="form-control" name="log" id="<?= __('user_login') ; ?>" placeholder="<?= __('Username or Email Address') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="user_pass"><?php esc_html_e( 'Password', 'realestate' ); ?></label>
                                    <input type="password" class="form-control" name="pwd" id="<?= __('user_pass'); ?>" placeholder="<?= __('Password'); ?>">
                                </div>
                                <div class="text-center">
                                	 <input type="submit" id="<?= esc_attr__('wp-submit'); ?>" name="wp-submit" value="<?php esc_attr_e( 'Log In' ); ?>" class="btn btn-default">
                                   <input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url() ); ?>">
                                    
                                </div>
                            </form>
                            <br>
                            
                            <h2>Social login :  </h2> 
                            
                            <p>
                            <a class="login-social" href="#"><i class="fa fa-facebook"></i>&nbsp;Facebook</a> 
                            <a class="login-social" href="#"><i class="fa fa-google-plus"></i>&nbsp;Gmail</a> 
                            <a class="login-social" href="#"><i class="fa fa-twitter"></i>&nbsp;Twitter</a>  
                            </p> 
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>      



<?php

	

   }


get_footer();
?>
    
    <!-- <p>
    <?php //esc_html_e( 'You are log out.', 'RealEstate' ); ?>
</p> -->
    




								