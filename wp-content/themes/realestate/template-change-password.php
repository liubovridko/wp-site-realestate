<?php
/**
 Template Name: Template Change Password 
 */

get_header();

// Проверка доступа пользователя- только для авторизированных и не редакторов
if (!is_user_logged_in() || !current_user_can('read')) {
    echo "Access denied.";
    get_footer();
    exit;
}

// Генерация CSRF-токена
$csrf_token = wp_create_nonce('change_password');

// Обработка отправки формы
if (isset($_POST['update'])) {
    // Проверка CSRF-токена
    if (!wp_verify_nonce($_POST['csrf_token'], 'change_password')) {
        echo "Invalid CSRF token.";
        get_footer();
        exit;
    }

    // Получение данных из формы
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Валидация данных
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        echo "Please fill in all fields.";
        get_footer();
        exit;
    } elseif ($new_password !== $confirm_password) {
        echo "New password and confirm password do not match.";
        get_footer();
        exit;
    }

    // Проверка текущего пароля
    $current_user = wp_get_current_user();
    $credentials = array(
        'user_login' => $current_user->user_login,
        'user_password' => $current_password
    );
    $user = wp_authenticate($credentials['user_login'], $credentials['user_password']);

    if (is_wp_error($user)) {
        echo "Current password is incorrect.";
        get_footer();
        exit;
    }

    //более прямым способом проверки пароля пользователя

    //$is_password_correct = wp_check_password($current_password, $current_user->user_pass, $current_user->ID);

    //if (!$is_password_correct) {
    //    echo "Current password is incorrect.";
    //    get_footer();
    //    exit;
   // }

    // Хеширование нового пароля
    $new_password_hashed = wp_hash_password($new_password);

    // Изменение пароля
    wp_set_password($new_password, $user->ID);

    // Уведомление пользователя
    //wp_mail($current_user->user_email, 'Password Change Notification', 'Your password has been successfully changed.');

    echo "Password changed successfully.";
    get_footer();
    exit;
}
?>

 <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Hello : <span class="orange strong"><?php echo is_user_logged_in() ? $current_user->nickname : "" ; ?></span></h1>               
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

                        <form action="" method="">

                            <div class="profiel-header">
                                <h3>
                                    <b>UPDATE</b> YOUR PASSWORD <br>
                                    <small>All change will send to your e-mail.</small>
                                </h3>
                                <hr>
                            </div>

                            <div class="clear">

                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Current Password <small>(required)</small></label>
                                        <input name="current_password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password <small>(required)</small></label>
                                        <input name="new_password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password : <small>(required)</small></label>
                                        <input name="confirm_password" type="password" class="form-control">
                                    </div>
                                    <!-- Вставка CSRF-токена в скрытое поле -->
                                      <input type="hidden" name="csrf_token" value="<?php echo esc_attr($csrf_token); ?>"> 
                                </div>
                                <div class="col-sm-10 col-sm-offset-1">
                                    <input type='button' class='btn btn-finish btn-primary pull-right' name='update' value='Update' />
                                </div>
                                
                            </div>
           
                            
                    </form>

                </div>
            </div><!-- end row -->

        </div>
    </div>	

<?php

get_footer();