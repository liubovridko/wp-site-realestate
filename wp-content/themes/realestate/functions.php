<?php
/**
 * RealEstate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RealEstate
 */

/*подключение стилей и скриптов*/

function realestate_enqueue_style() {
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800',  array(), '1.0.0', 'all' );

wp_enqueue_style( 'realestate-normalize', get_template_directory_uri(). '/assets/css/normalize.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-font-awesome', get_template_directory_uri(). '/assets/css/font-awesome.min.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-fontello', get_template_directory_uri(). '/assets/css/fontello.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-animate', get_template_directory_uri(). '/assets/css/animate.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-stroke', get_template_directory_uri(). '/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-helper', get_template_directory_uri(). '/assets/fonts/icon-7-stroke/css/helper.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-bootstrap-select', get_template_directory_uri(). '/assets/css/bootstrap-select.min.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-bootstrap', get_template_directory_uri(). '/assets/bootstrap/css/bootstrap.min.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-icheck', get_template_directory_uri(). '/assets/css/icheck.min_all.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-price-range', get_template_directory_uri(). '/assets/css/price-range.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-carousel', get_template_directory_uri(). '/assets/css/owl.carousel.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-owl-theme', get_template_directory_uri(). '/assets/css/owl.theme.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-owl-transitions', get_template_directory_uri(). '/assets/css/owl.transitions.css',  array(), '1.0.0', 'all' );
wp_enqueue_style( 'realestate-style', get_template_directory_uri(). '/assets/css/style.css',  array(), '1.0.0', 'all' );

wp_enqueue_style( 'realestate-responsive', get_template_directory_uri(). '/assets/css/responsive.css',  array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'realestate_enqueue_style' );

function realestate_enqueue_script() {
    wp_enqueue_script( 'modernizr-2.6.2', get_template_directory_uri(). '/assets/js/modernizr-2.6.2.min.js',  array(), '1.0.0', 'all'  );
    wp_enqueue_script( 'jquery-1.10.2', get_template_directory_uri(). '/assets/js/jquery-1.10.2.min.js',  array('modernizr-2.6.2'), '1.0.0', 'all'  );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/assets/bootstrap/js/bootstrap.min.js',  array('modernizr-2.6.2', 'jquery-1.10.2' ), '1.0.0', 'all'  );
    wp_enqueue_script( 'bootstrap-select', get_template_directory_uri(). '/assets/js/bootstrap-select.min.js',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap'), '1.0.0', 'all'  );
    wp_enqueue_script( 'bootstrap-hover-dropdown', get_template_directory_uri(). '/assets/js/bootstrap-hover-dropdown.js',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap' , 'bootstrap-select'), '1.0.0', 'all'  );
    wp_enqueue_script( 'easypiechart', get_template_directory_uri(). '/assets/js/easypiechart.min.js',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown'), '1.0.0', 'all'  );
    wp_enqueue_script( 'jquery-easypiechart', get_template_directory_uri(). '/assets/js/jquery.easypiechart.min.js',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart'), '1.0.0', 'all'  );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri(). '/assets/js/owl.carousel.min.js',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery-easypiechart'), '1.0.0', 'all'  );
     wp_enqueue_script( 'wow', get_template_directory_uri(). '/assets/js/wow.js',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery-easypiechart', 'owl-carousel'), '1.0.0', 'all'  );
     wp_enqueue_script( 'icheck', get_template_directory_uri(). '/assets/js/icheck.min.js',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery-easypiechart','owl-carousel', 'wow'), '1.0.0', 'all'  );
     wp_enqueue_script( 'price-range', get_template_directory_uri(). '/assets/js/price-range.js',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery-easypiechart', 'owl-carousel', 'wow', 'icheck'), '1.0.0', 'all'  );
     wp_enqueue_script( 'maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery-easypiechart', 'owl-carousel', 'wow', 'icheck', 'price-range'), '1.0.0', 'all'  );
    
     wp_enqueue_script( 'main', get_template_directory_uri(). '/assets/js/main.js',  array('modernizr-2.6.2','jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'jquery-easypiechart','owl-carousel', 'wow', 'icheck', 'price-range', 'maps-api'), '1.0.0', 'all'  );
     wp_localize_script('main', 'my_script_vars', array('ajaxurl' => admin_url('admin-ajax.php')));

    
}


add_action( 'wp_enqueue_scripts', 'realestate_enqueue_script' );

//подключение в хедер мета link
function realestate_enqueue_links() {
	    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
        echo '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">';
        echo '<link rel="icon" href="favicon.ico" type="image/x-icon">';
}  
add_action( 'wp_head', 'realestate_enqueue_links' );

//подключаем скрипты карты только на страницы контакты
function enqueue_gmaps_script() {
    if ( is_page( 'contact' ) ) { // Замените 'contacts' на slug (часть URL) вашей страницы контактов
         wp_enqueue_script( 'gmaps', get_template_directory_uri().'/assets/js/gmaps.js',  array(), '1.0.0', true  );
     wp_enqueue_script( 'gmaps-init', get_template_directory_uri().'/assets/js/gmaps.init.js',  array(), '1.0.0', true  );
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_gmaps_script' );

/*function realestate_add_classes($classes) {
	$classes[] = "my_class";
	$classes[] = "one";
	return $classes ;
}
add_action( 'body_class', 'realestate_add_classes' );*/

//иницилизация темы
function realestate_register_theme_init(){
	//функция регастрации меню
	register_nav_menus( array(
	    	'header_nav' => __( 'Header Menu', 'RealEstate' ),
	    	'footer_nav'  => __( 'Footer Menu', 'RealEstate' ),
	    	'links_nav'  => __( 'Quick Links Menu', 'RealEstate' ),
		) );
	//load languages directory
	load_theme_textdomain( 'realestate', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'realestate_register_theme_init');



function realestate_register_post_type_property() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => esc_html_x( 'Cities', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => esc_html_x( 'City', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => esc_html__( 'Search Cities', 'textdomain' ),
		'all_items'         => esc_html__( 'All Cities', 'textdomain' ),
		'parent_item'       => esc_html__( 'Parent City', 'textdomain' ),
		'parent_item_colon' => esc_html__( 'Parent City:', 'textdomain' ),
		'edit_item'         => esc_html__( 'Edit City', 'textdomain' ),
		'update_item'       => esc_html__( 'Update City', 'textdomain' ),
		'add_new_item'      => esc_html__( 'Add New City', 'textdomain' ),
		'new_item_name'     => esc_html__( 'New City Name', 'textdomain' ),
		'menu_name'         => esc_html__( 'City', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'cities' ),
	);
	//регистрация таксономии
	register_taxonomy('cities', array('property'), $args);
	unset($args); /*очищать массив args*/

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => esc_html_x( 'Features', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => esc_html_x( 'Feature', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => esc_html__( 'Search Features', 'textdomain' ),
		'all_items'         => esc_html__( 'All Features', 'textdomain' ),
		'parent_item'       => esc_html__( 'Parent Feature', 'textdomain' ),
		'parent_item_colon' => esc_html__( 'Parent Feature:', 'textdomain' ),
		'edit_item'         => esc_html__( 'Edit Feature', 'textdomain' ),
		'update_item'       => esc_html__( 'Update Feature', 'textdomain' ),
		'add_new_item'      => esc_html__( 'Add New Feature', 'textdomain' ),
		'new_item_name'     => esc_html__( 'New Feature Name', 'textdomain' ),
		'menu_name'         => esc_html__( 'Feature', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'features' ),
	);
	//регистрация таксономии
	register_taxonomy('Features', array('property'), $args);
	unset($args); /*очищать массив args*/

	$args =[
		'label' => esc_html__('Properties', 'realestate'), //название типа поста, отображаемое в меню
         'public' => true, // будет ли отображаться  через интерфейс администратора
         'show_in_menu' => true , //Где показать тип сообщения в меню администратора
         'has_archive' => true,
         'menu_icon' => 'dashicons-admin-home', //иконка меню
         'supports' => [              //Основные функции, которые поддерживает тип публикации
         	'title',
			'editor',
			'thumbnail',
			'excerpt'
         ],
         'rewrite'     => array( 'slug' => 'properties' ),
	];
    register_post_type('property', $args);
   unset($args); /*очищать массив args*/
    
    $args =[
    'label' => esc_html__('Testimonials', 'realestate'), //название типа поста, отображаемое в меню
         'public' => true, // будет ли отображаться  через интерфейс администратора
         'show_in_menu' => true , //Где показать тип сообщения в меню администратора
         'has_archive' => true,
         'menu_icon' => 'dashicons-format-status', //иконка меню
         'supports' => [              //Основные функции, которые поддерживает тип публикации
          'title',
      'editor',
      'thumbnail',
      'excerpt',
      'custom-fields'
         ],
         'rewrite'     => array( 'slug' => 'testimonials' ),
  ];
    register_post_type('testimonial', $args);
}
//init-функция будут запускаться при загрузке WP
add_action('init', 'realestate_register_post_type_property');

/*CUSTOM LOGIN*/

function redirect_login_page() {
    $login_url  = home_url( '/login' );
    $url = basename($_SERVER['REQUEST_URI']); // get requested URL
    isset( $_REQUEST['redirect_to'] ) ? ( $url   = "wp-login.php" ): 0; // if users ssend request to wp-admin
    if( $url  == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET')  {
        wp_redirect( $login_url );
        exit;
    }
}
add_action('init','redirect_login_page');

function login_failed() {
  $login_page  = home_url( '/login/' );
  wp_redirect( $login_page . '?login=failed' );
  exit;
}
add_action( 'wp_login_failed', 'login_failed' );
 
function verify_username_password( $user, $username, $password ) {
  $login_page  = home_url( '/login/' );
    if( $username == "" || $password == "" ) {
        wp_redirect( $login_page . "?login=empty" );
        exit;
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);
	
function logout_page() {
	ob_start();
  $login_page  = home_url( '/login/' );
  wp_redirect( $login_page . "?login=false" );
  exit;
}
add_action('wp_logout','logout_page');


function save_name_fields_on_registration( $user_id ) {
    if ( isset( $_POST['first_name'] ) )
        update_user_meta( $user_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
    if ( isset( $_POST['last_name'] ) )
        update_user_meta( $user_id, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
}

add_action( 'user_register', 'save_name_fields_on_registration', 10, 1 );

function hide_admin_bar() {
    if (is_user_logged_in() && !current_user_can('administrator')) {
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action('wp', 'hide_admin_bar');


function custom_widgets_init() {
    require get_template_directory() . '/widgets/text-widget.php';
    require get_template_directory() . '/widgets/search-widget.php';
    require get_template_directory() . '/widgets/recommended-post-widget.php';
    require get_template_directory() . '/widgets/tags.php';
    require get_template_directory() . '/widgets/about-us-widget.php';
    require get_template_directory() . '/widgets/quick-links-widget.php';
    require get_template_directory() . '/widgets/last-news-widget.php';
    require get_template_directory() . '/widgets/stay-in-touch-widget.php';
    require get_template_directory() . '/widgets/advanced-search-widget.php';
    require get_template_directory() . '/widgets/image-ads.php';
    //unregister_widget( 'WP_Widget_Text' );
    register_widget( 'RealEstate_Text_Widget' );
    register_widget( 'RealEstate_Search_Widget' );
    register_widget( 'Realestate_Recommended_Posts' );
    register_widget( 'Realestate_Tags_Cloud' );
    register_widget( 'About_Us_Text_Widget' );
    register_widget( 'WP_Quick_Links_Widget' );
    register_widget( 'Widget_Last_Posts' );
    register_widget( 'Realestate_Stay_In_Touch' );
    register_widget( 'Custom_Real_Estate_Search_Widget' );
    register_widget( 'ImageWidget' );
}
add_action( 'widgets_init', 'custom_widgets_init', 20 );


//change class for $args[before_widget]
function change_widget_class( $params ) {
    global $wp_registered_widgets;
    $widget_id = $params[0]['widget_id'];
    $widget_obj = $wp_registered_widgets[$widget_id];
    $widget_opt = get_option($widget_obj['callback'][0]->option_name);
    
    // Здесь изменяем класс для виджета с заданным ID
    if ($widget_id == 'my_widget_id') {
        $params[0]['before_widget'] = str_replace('class="', 'class="my-new-class ', $params[0]['before_widget']);
    }
    return $params;
}
add_filter('dynamic_sidebar_params', 'change_widget_class');

/*Custom form search*/

function realestate_search_form( $form ) {
      $form = '<form role="search" method="get" id="searchform" class="form-a" action="' . home_url( '/' ) . '" >
        
                                   <div class="input-group">
                                        <input  class="form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="'. __( 'Search' ) .'" type="text">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-smal" id="searchsubmit" >
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
      </form>';

      return $form;
    }
    add_filter( 'get_search_form', 'realestate_search_form', 40 );

//trim lenght exerpt
    function true_excerpt_length( $length ){
	return 4;
}
 
add_filter( 'excerpt_length', 'true_excerpt_length', 10, 1);


function true_excerpt_more(  ){

	return  '....';
}
 
add_filter( 'excerpt_more', 'true_excerpt_more', 10);


//Sort properties


function sort_properties_callback() {
  $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : 'date';
  $order = isset($_POST['order']) ? $_POST['order'] : 'ASC' ;
  $per_page= isset($_POST['posts_per_page']) ? (int)$_POST['posts_per_page'] : 6 ;
  $page = $_POST['page'];
  // Вычисляем OFFSET и LIMIT для выбранной страницы
	$offset = ($page - 1) * $per_page;
	

  $args = array(
    'post_type' => 'property',
     'post_status' => 'publish',
     's' => get_search_query(),
     'meta_key' => 'price',
     'offset' => $offset,
    'orderby' => $orderby,
    'order' => $order,
     'posts_per_page' => $per_page,
  );

  // Add category parameter to query
			
			if( ! empty( $_GET['category_name'] ) ) {
			    $args['tax_query'] =array(
					array(
					'taxonomy' => 'cities' ,
					'field' => 'slug',
					'terms' => sanitize_text_field( $_GET['category_name'] ) ,
					
					),
					) ;
			}

  $query = new WP_Query($args);
  if ($query->have_posts()) {
   
    while ($query->have_posts()) {
      $query->the_post();
                                    $price= get_post_meta(get_the_ID(), 'price', true);
                                    $area= get_post_meta(get_the_ID(), 'area', true);
                                    $rooms= get_post_meta(get_the_ID(), 'rooms', true);
                                    $bathrooms= get_post_meta(get_the_ID(), 'bathrooms', true);
                                    $cars= get_post_meta(get_the_ID(), 'cars', true);
                                    ?>
                         <div class="col-sm-6 col-md-4 p0">

                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="<?php echo esc_url(get_post_permalink()) ?>" ><img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>"></a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5><a href="<?php echo esc_url(get_post_permalink()) ?>"> <?php the_title(); ?> </a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Area :</b> <?php echo $area; ?>m </span>
                                            <span class="proerty-price pull-right"> $ <?php echo $price; ?></span>
                                            <p style="display: none;"><?php the_excerpt(); ?></p>
                                            <div class="property-icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/bed.png">(<?php echo $rooms; ?>)
                                                 <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/shawer.png">(<?php echo $bathrooms; ?>)
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/cars.png">(<?php echo $cars; ?>)  
                                            </div>
                                        </div>


                                    </div>
                                </div> 
                                <?php
    }
     wp_reset_postdata();
  } else {
    echo'No properties found';
  }
		 // Собираем HTML код пагинации
		$total_records = $query->found_posts;
		$total_pages = ceil($total_records / $per_page);

		$pagination_html = '';
		$pagination_html= '<div class="col-md-12"> 
                        <div class="pull-right">
                            <div class="pagination">';
		if ( $total_pages > 1 ) {
		    $pagination_html .= '<ul>';
		    if ( $page > 1 ) {
		        $prev_page = $page - 1;
		        $pagination_html .= '<li><a href="javascript:void(0);" class="prev_page" data-page="' . $prev_page . '">Prev</a></li>';
		    }
		    for ( $i = 1; $i <= $total_pages; $i++ ) {
		        $active_class = ( $page == $i ) ? 'active' : '';
		        $pagination_html .= '<li class="' . $active_class . '"><a href="javascript:void(0);" class="page_link " data-page="' . $i . '">' . $i . '</a></li>';
		    }
		    if ( $page < $total_pages ) {
		        $next_page = $page + 1;
		        $pagination_html .= '<li><a href="javascript:void(0);" class="next_page" data-page="' . $next_page . '">Next</a></li>';
		    }
		    $pagination_html .= '</ul>';
		    $pagination_html.='</div>
                        </div>                
                    </div>';
		}

		echo  $pagination_html;
          wp_die();
}

add_action('wp_ajax_sort_properties', 'sort_properties_callback');
add_action('wp_ajax_nopriv_sort_properties', 'sort_properties_callback');


//change shortcode from plugin Ajax load more

function ajax_load_more__properties_callback() {
	 $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : 'date';
    $order = isset($_POST['order']) ? $_POST['order'] : 'ASC' ;

 $shortcode = '[ajax_load_more id="8529698665" loading_style="infinite classic" post_type="property" posts_per_page="5" no_results_text="<div class=\'no-results\'>Sorry, nothing found in this query</div>" meta_key="price"';
    // Добавляем параметры сортировки к шорткоду
    $shortcode .= ' order_by="'. $orderby . '" order="' . $order . '"';
    $shortcode .= ']';
    echo do_shortcode($shortcode);


}

//add_action('wp_ajax_sort_properties', 'ajax_load_more__properties_callback');
//add_action('wp_ajax_nopriv_sort_properties', 'ajax_load_more__properties_callback');


/*Form contact*/

function submit_form_callback() {
  // Получение данных из AJAX запроса
  
 
  $first_name = $_POST['firstName'];
  $last_name = $_POST['lastName'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  

  // Обработка данных формы
  // Ваш код обработки данных формы здесь
  

  // Отправка данных на Mailchimp
 $api_key = 'YOUR_MAILCHIMP_API_KEY';
$list_id = 'YOUR_MAILCHIMP_LIST_ID';

  $data = array(
    'email_address' => $email,
    'status' => 'subscribed',
    'merge_fields' => array(
       'FNAME'=>  $first_name,
       'LNAME'=> $last_name,
       'MMERGE6'=> $subject,
      'MMERGE5'=> $message
    )
  );

  $url = 'https://<dc>.api.mailchimp.com/3.0/lists/' . $list_id . '/members';

  $request_args = array(
    'method' => 'POST',
    'headers' => array(
      'Content-Type' => 'application/json',
      'Authorization' => 'Basic ' . base64_encode('user:' . $api_key)
    ),
    'body' => json_encode($data)
  );

  $response = wp_remote_post($url, $request_args);
  

  if (is_wp_error($response)) {
  $error_message = $response->get_error_message();

   echo 'Ошибка при выполнении запроса к Mailchimp: ' . $error_message;
   // Отладочные сообщения
  /*error_log('Имя: ' .  $first_name);
  error_log('Имя: ' .   $last_name);
  error_log('Email: ' . $email);
  error_log('Сообщение: ' . $message);*/
}

  if (!is_wp_error($response)) {
    $response_code = wp_remote_retrieve_response_code($response);

    if ($response_code === 200) {
      // Действия при успешной отправке данных на Mailchimp
      echo 'Данные успешно отправлены на Mailchimp';
    } else {
      // Действия при ошибке отправки данных на Mailchimp
      echo 'Ошибка при отправке данных на Mailchimp';
    }
  } else {
    // Действия при ошибке выполнения запроса к Mailchimp
    echo 'Ошибка выполнения запроса к Mailchimp';
  }

  wp_die(); 
}

//add_action('wp_ajax_submit_form', 'submit_form_callback');
//add_action('wp_ajax_nopriv_submit_form', 'submit_form_callback');

//register string for plugin Polylang-translation

add_action('init', function () {

  if(! function_exists('pll_register_string')) {
    return;
  }

  if( ! function_exists( 'pll__' ) ) {
    function pll__( $string ) {
      return $string;
    }
  }
 
  if( ! function_exists( 'pll_e' ) ) {
    function pll_e( $string ) {
      echo $string;
    }
  }

  pll_register_string(
    'title_name_home_page', // название строки
    'property Searching Just Got So Easy', // сама строка
    'Slider', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

   pll_register_string(
    'title_text_home_page', // название строки
    'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!', // сама строка
    'Slider', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
   pll_register_string(
    'search_title_select_fild', // название строки
    'Select your city', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

    pll_register_string(
    'search_form_inp_value', // название строки
    'Key word', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

     pll_register_string(
    'search_form_option_value', // название строки
    'New york, CA', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

      pll_register_string(
    'search_form_option_value', // название строки
    'Paris', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

        pll_register_string(
    'search_form_option_value', // название строки
    'Casablanca', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

     pll_register_string(
    'search_form_option_value', // название строки
    'Tokyo', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

      pll_register_string(
    'search_form_option_value', // название строки
    'Marraekch', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

      pll_register_string(
    'search_form_option_value', // название строки
    'kyoto , shibua', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
       pll_register_string(
    'search_form_option_value', // название строки
    '-Status-', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
        pll_register_string(
    'search_form_option_value', // название строки
    'Rent', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

        pll_register_string(
    'search_form_option_value', // название строки
    'Buy', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

        pll_register_string(
    'search_form_option_value', // название строки
    'used', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
     pll_register_string(
    'search_form_inp_name', // название строки
    'Price range', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
      pll_register_string(
    'search_form_inp_name', // название строки
    'Property geo (m2)', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
      pll_register_string(
    'search_form_inp_name', // название строки
    'Min baths', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
       pll_register_string(
    'search_form_inp_name', // название строки
    'Min bed', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
     pll_register_string(
    'search_form_inp_checkbox', // название строки
    'Fire Place', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
     pll_register_string(
    'search_form_inp_checkbox', // название строки
    'Dual Sinks', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
      pll_register_string(
    'search_form_inp_checkbox', // название строки
    'Hurricane Shutters', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
       pll_register_string(
    'search_form_inp_checkbox', // название строки
    'Swimming Pool', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
   pll_register_string(
    'search_form_inp_checkbox', // название строки
    'Stories', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
   pll_register_string(
    'search_form_inp_checkbox', // название строки
    'Emergency Exit', // сама строка
    'Search Form', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
  pll_register_string(
      'search_form_inp_checkbox', // название строки
      'Laundry Room', // сама строка
      'Search Form', // категория для удобства
      false // будут ли тут переносы строк в тексте или нет
    );
  pll_register_string(
      'search_form_inp_checkbox', // название строки
      'Jog Path', // сама строка
      'Search Form', // категория для удобства
      false // будут ли тут переносы строк в тексте или нет
    );
  pll_register_string(
      'search_form_inp_checkbox', // название строки
      'Ceilings', // сама строка
      'Search Form', // категория для удобства
      false // будут ли тут переносы строк в тексте или нет
    );
   pll_register_string(
    'title_name_home_page', // название строки
    'Top submitted property', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
   pll_register_string(
    'title_text_home_page', // название строки
    'Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies .', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
    pll_register_string(
    'name_custom_fields', // название строки
    'Area', // сама строка
    'Properties', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
    pll_register_string(
    'title_text_home_page', // название строки
    'CAN`T DECIDE', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
    pll_register_string(
    'title_text_home_page', // название строки
    'Show all properties', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
    pll_register_string(
    'header_btn_name', // название строки
    'Submit', // сама строка
    'Header', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
    pll_register_string(
    'header_btn_name', // название строки
    'Login', // сама строка
    'Header', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
    pll_register_string(
    'btn_value', // название строки
    'All properties', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
     pll_register_string(
    'welcome_area_title', // название строки
    'Any property', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
      pll_register_string(
    'welcome_area_title', // название строки
    'More Clients', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
       pll_register_string(
    'welcome_area_title', // название строки
    'Easy to use', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
    pll_register_string(
    'welcome_area_title', // название строки
    'Any help', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
     pll_register_string(
    'testimonial_area_title', // название строки
    'Our Customers Said', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
      pll_register_string(
    'count_area_title', // название строки
    'You can trust Us', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
       pll_register_string(
    'count_area_title', // название строки
    'HAPPY CUSTOMER', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
        pll_register_string(
    'count_area_title', // название строки
    'Properties in stock', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
        pll_register_string(
    'count_area_title', // название строки
    'City registered', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
         pll_register_string(
    'count_area_title', // название строки
    'DEALER BRANCHES', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
          pll_register_string(
    'boy-sale_area_title', // название строки
    'ARE YOU LOOKING FOR A Property?', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
           pll_register_string(
    'boy-sale_area_text', // название строки
    'varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
            pll_register_string(
    'boy-sale_area_title', // название строки
    'DO YOU WANT TO SELL A Property?', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );
              pll_register_string(
    'boy-sale_area_caal_title', // название строки
    'QUESTIONS? CALL US', // сама строка
    'Home page', // категория для удобства
    false // будут ли тут переносы строк в тексте или нет
  );

});





if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function realestate_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on RealEstate, use a find and replace
		* to change 'realestate' to the name of your theme in all the template files.
		*/
	

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'realestate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'realestate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function realestate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'realestate_content_width', 640 );
}
add_action( 'after_setup_theme', 'realestate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function realestate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'realestate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'realestate' ),
			'before_widget' => ' <div id="%1$s" class="%2$s panel panel-default sidebar-menu wow fadeInRight animated" >',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="panel-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar-footer', 'realestate' ),
			'id'            => 'sidebar-footer',
			'description'   => esc_html__( 'Add widgets here.', 'realestate' ),
			'before_widget' => ' <div id="%1$s" class="%2$s col-md-3 col-sm-6 wow fadeInRight animated">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
  register_sidebar(
    array(
      'name'          => esc_html__( 'Sidebar-2', 'realestate' ),
      'id'            => 'sidebar-right-2',
      'description'   => esc_html__( 'Add widgets here.', 'realestate' ),
      'before_widget' => ' <div id="%1$s" class="%2$s panel panel-default sidebar-menu wow fadeInRight animated" >',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="panel-title">',
      'after_title'   => '</h3>',
    )
  );
  register_sidebar(
    array(
      'name'          => esc_html__( 'Sidebar-propetry', 'realestate' ),
      'id'            => 'sidebar-property',
      'description'   => esc_html__( 'Add widgets here.', 'realestate' ),
      'before_widget' => ' <div id="%1$s" class="%2$s panel panel-default sidebar-menu wow fadeInRight animated" >',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="panel-title">',
      'after_title'   => '</h3>',
    )
  );
}
add_action( 'widgets_init', 'realestate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function realestate_scripts() {
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'realestate_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

