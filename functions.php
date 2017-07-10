<?php
/**
@khai bao hang gia tri
	@ THEME_URL = lay duong dan thu muc theme 
	@ CORE = lay duong dan cua thu muc /core
**/
define('THEME_URL', get_stylesheet_directory() );
define('CORE', THEME_URL . "/core");

/**
 Nhung file /core/init.php
**/
require_once( CORE . "/init.php");

/**
 @ thiet lap chieu rong noi dung
**/
if ( !isset($content_width) ) {
	$content_width = 620 ;
}

/**
 @ khai bao chuc nang cua theme
 */
if (!function_exists('ducthinh_theme_setup')){
	function ducthinh_theme_setup(){

		/* thiet lap textdomain */
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain( 'ducthinh', $language_folder );

		/* tu dong them link rss len <head>*/
		add_theme_support('automatic-feed-links');

		/* them post thumbnail*/
		add_theme_support( 'post-thumbnails' );

		/* post format */
		add_theme_support( 'post-formats' , array(
				'image',
				'video',
				'gallery',
				'quote',
				'link'
			));

		/* them title tag */
		add_theme_support( 'title-tag');

		/* them custom background */
		$default_background = array(
			'default-color' => '#e8e8e8'
		);
		add_theme_support('custom-background', $default_background);

		/* them menu */
		register_nav_menus( array(
			'primary-menu' => __( 'Primary Menu', 'ducthinh' ),
		) );

		/* Creat sidebar */
		$sidebar = array(
			'name' => __('Main Sidebar' , 'ducthinh'),
			'id' => 'main-sidebar',
			'description' => 'Main sidebar for Duc Thinh theme',
			'class' => 'main-sidebar' ,
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		);
		register_sidebar ($sidebar);
	}	
	add_action( 'init', 'ducthinh_theme_setup');
}


/*
TEMPLATE FUNCTION
 */

/*--------*/
if (!function_exists('ducthinh_logo')) {
	function ducthinh_logo() { ?>
		<div class="site-name">
			<?php
				if ( is_home() ) {
					printf( '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>' ,
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename') );
				} else {
					printf( '<p><a href="%1$s" title="%2$s">%3$s</a></p>' ,
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename') );

				}
			?>
		</div>
		<div class="site-description"><?php bloginfo('description'); ?></div><?php 
	}
}



/*===========nhúng file style.css==========*/
function ducthinh_style(){
	wp_register_style( 'main-style', get_template_directory_uri() . "/style.css", 'all' );
	wp_enqueue_style('main-style');
	wp_register_style( 'reset-style', get_template_directory_uri() . "/reset.css", 'all' );
	wp_enqueue_style('reset-style');
	wp_register_style( 'less-style', get_template_directory_uri() . "/style.less", 'all' );
	wp_enqueue_style('less-style');
	wp_register_script('less-script', get_template_directory_uri() . "/less.min.js" , array('jquery'));
	wp_enqueue_script('less-script');

	// bootstrap
	wp_register_style( 'bootstrap-style', get_template_directory_uri() . "/bootstrap.min.css", 'all' );
	wp_enqueue_style('bootstrap-style');
	wp_register_script('bootstrap-script', get_template_directory_uri() . "/bootstrap.min.js" , array('jquery'));
	wp_enqueue_script('bootstrap-script');
	
}
add_action('wp_enqueue_scripts','ducthinh_style');