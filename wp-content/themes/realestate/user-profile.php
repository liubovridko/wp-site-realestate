<?php
/* Template Name: User Profile Template */

get_header();


 /*$password = "admin";
	        $hash = password_hash($password, PASSWORD_BCRYPT); /*хешируем пароль при регистрации*/
	        /*echo $hash . "<hr/>";*/
	        ?>


<?php if ( is_user_logged_in() ) :

// Получаем ID текущего пользователя
    $user_id = get_current_user_id();

// Проверяем, была ли отправлена форма
if (isset($_POST['update_user_profile']) && wp_verify_nonce($_POST['update_user_profile_nonce'], 'update_user_profile')) {

     // Обновляем поля профиля пользователя
    if ($user_id > 0) {
        $user_data = array(
            'ID' => $user_id,
            'first_name' => sanitize_text_field($_POST['first_name']),
            'last_name' => sanitize_text_field($_POST['last_name']),
            'user_email' => sanitize_email($_POST['user_email']),
        );
        // Обновляем пароль, если он был указан
        if (!empty($_POST['password']) && !empty($_POST['confirm_password']) && $_POST['password'] === $_POST['confirm_password']) {
            $user_data['user_pass'] = wp_hash_password($_POST['password']);
        }
        // Обновляем фото профиля, если оно было загружено
        if (!empty($_FILES['user_avatar']) && !empty($_FILES['user_avatar']['name'])) {
           
            $file_name = $_FILES['user_avatar']['name'];
            $file_size = $_FILES['user_avatar']['size'];
            $file_type = $_FILES['user_avatar']['type'];
             $file_tmp = $_FILES['user_avatar']['tmp_name'];
           

             $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
		    $file_ext = strtolower( end( explode('.', $file_name ) ) );

		    if ( in_array( $file_ext, $allowed_ext ) === false ) {
		        echo 'Расширение файла не допускается, попробуйте загрузить файлы в формате JPG, JPEG, PNG или GIF.';
		    } elseif ( $file_size > 2097152 ) {
		        echo 'Файл должен быть не больше 2МБ.';
		    } else {
		        $upload_dir = wp_upload_dir();
		        $file_path = $upload_dir['basedir'] . '/avatars/';
		        if ( ! file_exists( $file_path ) ) {
		            mkdir( $file_path );
		        }

		        $new_file_name = 'avatar_' . get_current_user_id() . '.' . $file_ext;
		        $file_dest = $file_path . $new_file_name;
               
		        move_uploaded_file( $file_tmp, $file_dest );
		        update_user_meta( get_current_user_id(), 'user_avatar', $new_file_name );
		    }
        }
        // Обновляем профиль пользователя
        wp_update_user($user_data);
    }
}

$user_avatar = get_user_meta( get_current_user_id(), 'user_avatar', true );


    $upload_dir = wp_upload_dir();
    $file_path = $upload_dir['baseurl'] . '/avatars/' . $user_avatar;


?>
  <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Hello : <span class="orange strong"><?php echo $current_user->nickname . ' !'; ?></span></h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header --> 

        <!-- property area -->
        <div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 profiel-container">

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="profiel-header">
                                <h3>
                                    <b>BUILD</b> YOUR PROFILE <br>
                                    <small>This information will let us know more about you.</small>
                                </h3>
                                <hr>
                            </div>

                            <div class="clear">
                                <div class="col-sm-3 col-sm-offset-1">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="<?php echo ! empty( $user_avatar) ? $file_path :  get_template_directory_uri().'/assets/img/avatar.png'; ?>" class="picture-src" id="wizardPicturePreview" title=""/>
                                            <input type="file" name="user_avatar"  id="wizard-picture">
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>

                                <div class="col-sm-3 padding-top-25">

                                    <div class="form-group">
                                        <label for="first_name">First Name <small>(required)</small></label>
                                        <input type="text" name="first_name" id="first_name" value="<?php echo esc_attr( $current_user->first_name ? $current_user->first_name : '' ); ?>"  class="form-control" placeholder="Andrew..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name <small>(required)</small></label>
                                        <input  class="form-control" placeholder="Smith..." type="text" name="last_name" id="last_name" value="<?php echo esc_attr( $current_user->last_name ? $current_user->last_name : ''); ?>" required>
                                    </div> 
                                    <div class="form-group">
                                        <label for="user_email">Email <small>(required)</small></label>
                                        <input class="form-control" placeholder="andrew@email@email.com.com" type="email" name="user_email" id="user_email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required>
                                    </div> 
                                </div>
                                <div class="col-sm-3 padding-top-25">
                                    <div class="form-group">
                                        <label for="password">Password <small>(required)</small></label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm password : <small>(required)</small></label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                    </div>
                                </div>  

                            </div>

                            <div class="clear">
                                <br>
                                <hr>
                                <br>
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Facebook :</label>
                                        <input name="Facebook" type="text" class="form-control" placeholder="https://facebook.com/user">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter :</label>
                                        <input name="Twitter" type="text" class="form-control" placeholder="https://Twitter.com/@user">
                                    </div>
                                    <div class="form-group">
                                        <label>Website :</label>
                                        <input name="website" type="text" class="form-control" placeholder="https://yoursite.com/">
                                    </div>
                                </div>  

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Public email :</label>
                                        <input name="p-email" type="email" class="form-control" placeholder="p-email@rmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone :</label>
                                        <input name="Phone" type="text" class="form-control" placeholder="+1 9090909090">
                                    </div>
                                    <div class="form-group">
                                        <label>FAX :</label>
                                        <input name="FAX" type="text" class="form-control" placeholder="+1 9090909090">
                                    </div>
                                </div>
 
                            </div>
                    
                            <div class="col-sm-5 col-sm-offset-1">
                                <br>
                                <?php wp_nonce_field( 'update_user_profile', 'update_user_profile_nonce' ); ?>
                                <input type="submit" name="update_user_profile" class='btn btn-finish btn-primary'  value='Finish' />
                            </div>
                            <br>
                    </form>

                </div>
            </div><!-- end row -->

        </div>
    </div>
    <?php
         else :
            wp_redirect( home_url('/login') );
            exit;
    	 
    	?>

<?php 
endif;
get_footer(); ?>