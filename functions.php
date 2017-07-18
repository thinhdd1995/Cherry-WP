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
		add_theme_support( 'customize-selective-refresh-widgets' );
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
// add tag support to pages
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');

/*
TEMPLATE FUNCTION
 */




/*--------*/
if (!function_exists('ducthinh_logo')) {
	function ducthinh_logo() { ?>
		<div class="site-name">
			<?php
				
					printf( '<a href="%1$s" title="%2$s">%3$s</a>' ,
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename') );
				
			?>
		</div>
		<?php 
	}
}

if (!function_exists('ducthinh_logo_homepage')) {
	function ducthinh_logo_homepage() { ?>
		<div class="page-name">
			<?php
				if ( is_home() ) {
					printf( '<h1><a href="%1$s" title="Our Stories">Our Stories</a></h1>' ,
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('homepagename') );
				}
			?>
		</div>
		<div class="site-description"><?php 
			if ( is_home() ) {
					printf(get_bloginfo('description'));
				}
		?></div><?php 
	}
}
/**
 * Ham tao phan trang
 */
if ( !function_exists('ducthinh_pagination')){
	function ducthinh_pagination(){
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return '';
		} ?>
		<nav class="pagination" role="navigation">
			<?php if (get_next_posts_link() ) : ?>
				<div class="prev"><?php next_posts_link( __('Older Posts', 'ducthinh')); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
				<div class="next"><?php previous_posts_link( __('Newest Posts' ,'ducthinh')); ?></div>
			<?php endif; ?>
		</nav>
	<?php }
}


/**
 * Ham hien thi thumbnail
 */
if ( !function_exists('ducthinh_thumbnail')){
	function ducthinh_thumbnail($size){
		if( !is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image') ) : ?>
		<figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure>
	<?php endif; ?>
	<?php }
}

/**
 * ducthinh_entry_header = hien thi tieu de post
 */
if ( !function_exists('ducthinh_entry_header')){
	function ducthinh_entry_header(){ ?>
		<?php if ( !is_single()) : ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php else : ?>
			<h2 class="entry-title-single"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title();  ?></a></h2>
		<?php endif ; ?>
	<?php }
}



/**
 * ducthinh_entry_meta = lay du lieu post
 */
if ( !function_exists('ducthinh_entry_meta')) {
	function ducthinh_entry_meta() { ?>
		<?php if ( is_home()) : ?>
			<div class="entry-meta">
				<?php printf( __('<span class="date-published"><i class="fa fa-calendar" aria-hidden="true"></i> %1$s', 'ducthinh'), get_the_date() ); ?>
				<?php echo postview_get(get_the_ID()); ?>
			</div> 
		<?php endif; ?>
		<?php if (is_single()) :?>
			<div class="entry-meta">
				<?php printf( __('<span class="date-published"><i class="fa fa-calendar" aria-hidden="true"></i> %1$s', 'ducthinh'), get_the_date() ); ?>
				<?php echo postview_get(get_the_ID()); ?>
				<?php printf( __('<span class="author"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> %1$s', 'ducthinh'), get_the_author_meta( 'display_name', 1 ) ); ?>
			</div>
		<?php endif; ?>
	<?php }
}

/**
 * ducthinh_entry_contetnt= hien thi noi dung post/page
 */
 if ( !function_exists('ducthinh_entry_content')) {
 	function ducthinh_entry_content(){
 		if( !is_single() && !is_page()) {
 			the_excerpt();
		} else {
 			the_content();

 			/* phan trang trong single */
 			$link_pages = array(
 				'before' => __('<p>Page: ','ducthinh'),
 				'after' => '</p>',
				'nextpagelink' => __('Next Page','ducthinh'),
 				'previouspagelink' => __('Previous Page','ducthinh')
 			);
 			wp_link_pages($link_pages);
 		}
 	}
 }
/**
 * ducthinh_entry_tag = hien thi tag
  */
 if ( !function_exists('ducthinh_entry_tag')){
 	function ducthinh_entry_tag(){
 		if ( has_tag()) :
			echo '<div class="entry-footer">';	
 			printf( __('<div class="entry-tag col-md-6">Tags:  %1$s', 'ducthinh'), get_the_tag_list( '', ','));
 			printf(__('</div>'));
 			printf( __('<div class="entry-social cold-md-2 text-right">
				<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-print" aria-hidden="true"></i></a>
 				', 'ducthinh'), get_the_tag_list( '', ','));
 			printf(__('</div>'));
 		endif;
 	}
 }
/*--------Display views---------*/
function postview_set($postID) {
    $count_key = 'postview_number';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function postview_get($postID){
    $count_key = 'postview_number';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return " <?php echo '<i class='fa fa-eye' aria-hidden='true'></i>' ?> 0";
    }
    return '<i class="fa fa-eye" aria-hidden="true"></i> '.	
'&nbsp'.$count;
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Tạo một section mới trong Customizer */
function customizer_footer( $wp_customize ) {
 
        // Tạo section
    $wp_customize->add_section (
        'section_a',
        array(
            'title' => 'Pre-footer',
            'description' => 'Edit Pre-footer part',
            'priority' => 25
        )
    );
 
    // Tạo setting
    $wp_customize->add_setting (
            'Texts',
            array(
                'default' => ''
            )
        );
 
        // Tạo coltrol
        $wp_customize->add_control (
            'control_Texts',
            array(
                'label' => 'Texts',
                'section' => 'section_a',
                'type' => 'textarea',
                'settings' => 'Texts'
            )
        );

        /* Image Upload */
		$wp_customize->add_setting( 'img-upload' );
		 
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'img-upload',
		        array(
		            'label' => 'logo footer',
		            'section' => 'section_a',
		            'settings' => 'img-upload'
		        )
		    )
		);
}
add_action( 'customize_register', 'customizer_footer' );


/*===========nhúng file style.css==========*/
function ducthinh_style(){
	wp_register_style( 'main-style', get_template_directory_uri() . "/style.css", 'all' );
	wp_enqueue_style('main-style');

	//font-awsome
	wp_register_script('font-awsome-script', get_template_directory_uri() . "/font-awsome.js" , array('jquery'));
	wp_enqueue_script('font-awsome-script');

	// bootstrap
	wp_register_style( 'bootstrap-style', get_template_directory_uri() . "/bootstrap.min.css", 'all' );
	wp_enqueue_style('bootstrap-style');
	wp_register_script('bootstrap-script', get_template_directory_uri() . "/bootstrap.min.js" , array('jquery'));
	wp_enqueue_script('bootstrap-script');
	
}
add_action('wp_enqueue_scripts','ducthinh_style');


function wpb_add_google_fonts() {

	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Droid+Serif|Kaushan+Script', false );
}
 
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );