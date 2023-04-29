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
    
}


add_action( 'user_register', 'realestate_user_registration', 10, 1  );