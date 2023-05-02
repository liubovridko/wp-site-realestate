<?php
/**
 * Plugin Name: RealEstate Registration Form
 * Description: RealEstate user registration form for WordPress.
 * Version: 1.0
 * Author: Liubov Ridkokasha
 
 */

	function realestate_registration_form_shortcode() {
	    ob_start();
	    realestate_registration_form(); // Функция вывода формы регистрации
	    return ob_get_clean();
	}

	add_shortcode( 'realestate_registration_form', 'realestate_registration_form_shortcode' );

	function realestate_registration_form() {
    // Код для формы регистрации

    ?>
    <form action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>" method="post">
        <div class="form-group">
            <label for="username"><?php _e( 'Username:', 'realestate' ); ?></label>
            <input type="text" class="form-control" name="username" value="" required />
        </div>
        <div class="form-group">
            <label for="email"><?php _e( 'Email:', 'realestate' ); ?></label>
            <input type="email" class="form-control" name="email" value="" required />
        </div>
        <div class="form-group">
            <label for="password"><?php _e( 'Password:', 'realestate' ); ?></label>
            <input type="password" class="form-control" name="password" value="" required />
        </div>
        <?php do_action( 'register_form' ); ?>
        <div class="text-center">
            <input type="submit" class="btn btn-default" name="submit" value="<?php _e( 'Register', 'mydomain' ); ?>" />
        </div>
        
    </form>
    <?php

    
}

function realestate_user_registration($user_id) {

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
    
}


add_action( 'user_register', 'realestate_user_registration', 10, 1  );