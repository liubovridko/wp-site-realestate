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
    wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/assets/bootstrap/js/bootstrap.min.js',  array('jquery-1.10.2' , 'modernizr-2.6.2'), '1.0.0', 'all'  );
    wp_enqueue_script( 'bootstrap-select', get_template_directory_uri(). '/assets/js/bootstrap-select.min.js',  array('jquery-1.10.2' , 'bootstrap'), '1.0.0', 'all'  );
    wp_enqueue_script( 'bootstrap-hover-dropdown', get_template_directory_uri(). '/assets/js/bootstrap-hover-dropdown.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select'), '1.0.0', 'all'  );
    wp_enqueue_script( 'easypiechart', get_template_directory_uri(). '/assets/js/easypiechart.min.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown'), '1.0.0', 'all'  );
    wp_enqueue_script( 'jquery-easypiechart', get_template_directory_uri(). '/assets/js/jquery.easypiechart.min.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart'), '1.0.0', 'all'  );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri(). '/assets/js/owl.carousel.min.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart'), '1.0.0', 'all'  );
     wp_enqueue_script( 'wow', get_template_directory_uri(). '/assets/js/wow.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'owl-carousel'), '1.0.0', 'all'  );
     wp_enqueue_script( 'icheck', get_template_directory_uri(). '/assets/js/icheck.min.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'owl-carousel', 'wow'), '1.0.0', 'all'  );
     wp_enqueue_script( 'price-range', get_template_directory_uri(). '/assets/js/price-range.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'owl-carousel', 'wow', 'icheck'), '1.0.0', 'all'  );
     wp_enqueue_script( 'maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'owl-carousel', 'wow', 'icheck', 'price-range'), '1.0.0', 'all'  );
     wp_enqueue_script( 'gmaps', get_template_directory_uri().'/assets/js/gmaps.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'owl-carousel', 'wow', 'icheck', 'price-range',  'maps-api'), '1.0.0', 'all'  );
     wp_enqueue_script( 'gmaps-init', get_template_directory_uri().'/assets/js/gmaps.init.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'owl-carousel', 'wow', 'icheck', 'price-range',  'maps-api', 'gmaps'), '1.0.0', 'all'  );
     wp_enqueue_script( 'main', get_template_directory_uri(). '/assets/js/main.js',  array('jquery-1.10.2' , 'bootstrap' , 'bootstrap-select', 'bootstrap-hover-dropdown', 'easypiechart', 'owl-carousel', 'wow', 'icheck', 'price-range'), '1.0.0', 'all'  );
}


add_action( 'wp_enqueue_scripts', 'realestate_enqueue_script' );

//подключение в хедер мета link
function realestate_enqueue_links() {
	    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
        echo '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">';
        echo '<link rel="icon" href="favicon.ico" type="image/x-icon">';
}  
add_action( 'wp_head', 'realestate_enqueue_links' );

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
    //unregister_widget( 'WP_Widget_Text' );
    register_widget( 'RealEstate_Text_Widget' );
    register_widget( 'RealEstate_Search_Widget' );
    register_widget( 'Realestate_Recommended_Posts' );
    register_widget( 'Realestate_Tags_Cloud' );
    register_widget( 'About_Us_Text_Widget' );
    register_widget( 'WP_Quick_Links_Widget' );
    register_widget( 'Widget_Last_Posts' );
    register_widget( 'Realestate_Stay_In_Touch' );
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

