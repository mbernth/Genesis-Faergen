<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'faergecafe', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'faergecafe' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Mono Basics' );
define( 'CHILD_THEME_URL', 'http://www.monovoce.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Remove the edit link
add_filter ( 'genesis_edit_post_link' , '__return_false' );	

//* Header settings
//* ==============================================================================================================================


//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'mono_basic_scripts' );
function mono_basic_scripts() {

	wp_enqueue_script( 'mono-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_style( 'dashicons' );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

/** Conditional html element classes */
remove_action( 'genesis_doctype', 'genesis_do_doctype' );
add_action( 'genesis_doctype', 'child_do_doctype' );
function child_do_doctype() {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]> <html class="ie6" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <?php
}

//* Add custom meta tag for mobile browsers
add_action( 'genesis_meta', 'mono_viewport_meta_tag' );
function mono_viewport_meta_tag() {
	echo '<meta name="HandheldFriendly" content="True">';
	echo '<meta name="MobileOptimized" content="320">';
}
// Change favicon location and add touch icons
add_filter( 'genesis_pre_load_favicon', 'mono_favicon_filter' );
function mono_favicon_filter( $favicon ) {
	echo '<link rel="shortcut icon" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon.ico" type="image/x-icon" />';
	echo '<link rel="apple-touch-icon" sizes="57x57" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-57x57.png">';
	echo '<link rel="apple-touch-icon" sizes="60x60" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-60x60.png">';
	echo '<link rel="apple-touch-icon" sizes="72x72" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-72x72.png">';
	echo '<link rel="apple-touch-icon" sizes="76x76" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-76x76.png">';
	echo '<link rel="apple-touch-icon" sizes="114x114" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-114x114.png">';
	echo '<link rel="apple-touch-icon" sizes="120x120" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-120x120.png">';
	echo '<link rel="apple-touch-icon" sizes="144x144" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-144x144.png">';
	echo '<link rel="apple-touch-icon" sizes="152x152" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-152x152.png">';
	echo '<link rel="apple-touch-icon" sizes="180x180" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-180x180.png">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-16x16.png" sizes="16x16">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-32x32.png" sizes="32x32">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-96x96.png" sizes="96x96">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/android-chrome-192x192.png" sizes="192x192">';
	echo '<meta name="msapplication-square70x70logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//smalltile.png" />';
	echo '<meta name="msapplication-square150x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//mediumtile.png" />';
	echo '<meta name="msapplication-wide310x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//widetile.png" />';
	echo '<meta name="msapplication-square310x310logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//largetile.png" />';

}



//* Content settings
//* ==============================================================================================================================


//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Unregister secondary sidebar 
add_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_header', 'genesis_do_subnav', 15 );

//* Hook before header widget area above header
add_action( 'genesis_before_header', 'mono_before_header' );
function mono_before_header() {

	genesis_widget_area( 'before-header', array(
		'before' => '<div class="before-header" class="widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'before-header',
	'name'        => __( 'Before Header', 'mono' ),
	'description' => __( 'This is the before header widget area.', 'mono' ),
) );

//* Display featured image on page and posts
add_action ( 'genesis_after_header', 'single_post_featured_image', 15 );
function single_post_featured_image() {
	if ( (is_single() || is_page()) && has_post_thumbnail() ) :
		
		$img = genesis_get_image( array( 'format' => 'src' ) );
		printf( '<div class="image-section" style="background-image:url(%s);"><div class="gradient"></div></div>', $img );
		
	endif;
	
}
//* Add body class for featured image
add_filter( 'body_class', 'sp_body_class' );
function sp_body_class( $classes ) {
	if ( (is_single() || is_page()) && has_post_thumbnail() )
		$classes[] = 'featured-image';
		return $classes;
}
add_action( 'wp_enqueue_scripts', 'featured_height' );
function featured_height() {
	if ( (is_single() || is_page()) && has_post_thumbnail() ){
		wp_enqueue_script( 'mono-jquery', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'mono-featured-height', get_bloginfo( 'stylesheet_directory' ) . '/js/image.height.js', array( 'jquery' ), '1.0.0', true );
	}
}


//* Add Booking widget for ACF
if ( ! class_exists( 'Example_Widget' ) ) {
	class Example_Widget extends WP_Widget
	{
		function Example_Widget() 
		{
			parent::WP_Widget(false, "Booking Widget");
		}
 
		function update($new_instance, $old_instance) 
		{  
			return $new_instance;  
		}  
 
		function form($instance)
		{  
			$title = esc_attr($instance["title"]);  
			echo "<br />";
		}
 
		function widget($args, $instance) 
		{
			$widget_id = "widget_" . $args["widget_id"];
 
			// I like to put the HTML output for the actual widget in a seperate file
			include(realpath(dirname(__FILE__)) . "/example_widget.php");
		}
	}
}
register_widget("Example_Widget");

//* Add tripadvisor widget for ACF
if ( ! class_exists( 'Tripadvisor_Widget' ) ) {
	class Tripadvisor_Widget extends WP_Widget
	{
		function Tripadvisor_Widget() 
		{
			parent::WP_Widget(false, "Tripadvisor Widget");
		}
 
		function update($new_instance, $old_instance) 
		{  
			return $new_instance;  
		}  
 
		function form($instance)
		{  
			$title = esc_attr($instance["title"]);  
			echo "<br />";
		}
 
		function widget($args, $instance) 
		{
			$widget_id = "widget_" . $args["widget_id"];
 
			// I like to put the HTML output for the actual widget in a seperate file
			include(realpath(dirname(__FILE__)) . "/tripadvisor_widget.php");
		}
	}
}
register_widget("Tripadvisor_Widget");

// Add events option page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Arrangementer',
		'menu_title'	=> 'Arrangementers'
	));
}

//* Add events to sidebar
add_action( 'genesis_before_sidebar_widget_area', 'mono_sidebar_event' );
function mono_sidebar_event() {
	$f_headline = get_field( 'headline', 'option' );  //featured headline
	$f_text = get_field( 'udvalgt_event_text', 'option' );  //featured text
	$f_url = get_field( 'udvalgt_event_link', 'option' );  //Featured url
	$hide = get_field( 'skjul_event', 'option' );  //featured headline
	
	echo '<div class="event-table">';
	if ( $f_headline ) {
		echo '<h2>' . $f_headline . '</h2>';
	}
	if( have_rows('event', 'option') ) {
		echo '<table><tbody>';
		
		while( have_rows('event', 'option') ): the_row();
			if( have_rows('skjul_event') ){
			}else{
			echo '<tr>';
				echo '<td><time itemprop="date" datetime="';
						the_sub_field('dato');
					echo '">';
					the_sub_field('dato');
					echo '</time>';
				echo '</td>';
				echo '<td>';
					echo '<span itemprop="name"><a href="';
					the_sub_field('event_link');
					echo '">';
					the_sub_field('event_navn');
					echo '</a></span>';
				echo '</td>';
			echo '</tr>';
			}
		endwhile;
		
		echo '</table></tbody>';
	}
	echo '</div>';
	
}

//* Script for pop up booking box
add_action( 'wp_enqueue_scripts', 'portbox_enqueue_scripts_styles' );
function portbox_enqueue_scripts_styles() {
	
	wp_enqueue_script( 'parallax-portbox-jquery', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery-1.10.2.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'parallax-portbox-ui', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery-ui-1.10.3.custom.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'parallax-portbox-slimscroll', get_bloginfo( 'stylesheet_directory' ) . '/js/portBox.slimscroll.min.js', array( 'jquery' ), '1.0.0' );

}

// Add sounds to footer
add_action( 'wp_enqueue_scripts', 'faergecafeen_scripts' );
function faergecafeen_scripts() {
	
	wp_enqueue_script( 'sounds', get_bloginfo( 'stylesheet_directory' ) . '/js/sounds.js', array( 'jquery' ), '1.0.0' );
	
	$jsLocalized = array(
		'audioPlay'        => __( 'Hear the sound of Færgecaféen', 'faergecafeen' ),
		'audioPause'       => __( 'Turn sound off', 'faergecafeen' ),
		'adudioFade'       => __( 'Fading . . .', 'faergecafeen' )
	);
	wp_localize_script( 'sounds', 'jsLocalized', $jsLocalized );
	
	
}


// check if the flexible content field has rows of data
add_action( 'genesis_entry_content', 'mono_default_gridset', 15 );
function mono_default_gridset() {
	if ( is_single() || is_page() ) {
		
	if( have_rows('extra_content') ):

		// loop through the rows of data
    	while ( have_rows('extra_content') ) : the_row();

        	if( get_row_layout() == 'full_width_column' ):
				
				if (get_sub_field('hide')){
					}else{
				echo '<div class="gridcontainer">';
					echo '<div class="coll1">';
						the_sub_field('content');
					echo '</div>';
				echo '</div>';
				
				}
				
        	elseif( get_row_layout() == 'two_columns' ):
			
				if (get_sub_field('hide')){
					}else{
				echo '<div class="gridcontainer">';
					echo '<div class="coll2">';
						the_sub_field('content_left');
					echo '</div>';
					echo '<div class="coll2">';
						the_sub_field('content_right');
					echo '</div>';
				echo '</div>';
				
				}
				
			elseif( get_row_layout() == 'content_and_sidebar' ):
			
				if (get_sub_field('hide')){
					}else{
						
				if (get_sub_field('float_right')){
					echo '<div class="gridcontainer sidebar_content">';
					}else{
					echo '<div class="gridcontainer content_sidebar">';
				}
				
					echo '<article class="coll_content">';
						the_sub_field('content');
					echo '</article>';
					echo '<aside class="coll_sidebar">';
						the_sub_field('sidebar');
					echo '</aside>';
				echo '</div>';
				
				}
				
			elseif( get_row_layout() == 'three_columns' ):
				
				if (get_sub_field('hide')){
					}else{
				echo '<div class="gridcontainer">';
					echo '<div class="coll3">';
        				the_sub_field('content_left');
					echo '</div>';
					echo '<div class="coll3">';
						the_sub_field('content_center');
					echo '</div>';
					echo '<div class="coll3">';
						the_sub_field('content_right');
					echo '</div>';
				echo '</div>';
				
				}
				
			elseif( get_row_layout() == 'booking_button' ):
			
				if (get_sub_field('hide')){
					}else{
				echo '<div class="gridcontainer booking_area">';
					echo '<div class="coll1">';
						if ( ! wp_is_mobile() ) {
							echo '<a href="#" data-display="box-menu" class="button booking">';
								the_sub_field('booking_label'); 
							echo '</a>';
						}else{
							echo '<a href="';
								the_sub_field('booking_url'); 
							echo '" class="button booking" target="_blank">';
								the_sub_field('booking_label'); 
							echo '</a>';
						}
						if ( ! wp_is_mobile() ) {
							echo '<span id="box-menu" class="portBox">';
							echo '<iframe  height="540" width="1080" scrolling="auto" frameborder="0" src="';
								the_sub_field('booking_url');
							echo '"></iframe>';
							echo '</span>';
						}else{
		
						}
					echo '</div>';
				echo '</div>';
				
				}
				
				
        	endif;

    	endwhile;

	else :

    // no layouts found

	endif;
	}
}

// check if top button
add_action( 'genesis_entry_content', 'booking_top_button', 1 );
function booking_top_button() {
	if ( is_single() || is_page() ) {
		
	if( have_rows('extra_content') ):

		// loop through the rows of data
    	while ( have_rows('extra_content') ) : the_row();
				
				if( get_row_layout() == 'booking_button' ):
			
					if (get_sub_field('top_booking_button')){
						
					echo '<div class="gridcontainer booking_area_top">';
						echo '<div class="coll1">';
							if ( ! wp_is_mobile() ) {
								echo '<a href="#" data-display="box-menu" class="button booking">';
									the_sub_field('booking_label'); 
								echo '</a>';
							}else{
								echo '<a href="';
									the_sub_field('booking_url'); 
								echo '" class="button booking" target="_blank">';
									the_sub_field('booking_label'); 
								echo '</a>';
							}
							if ( ! wp_is_mobile() ) {
								echo '<span id="box-menu" class="portBox">';
								echo '<iframe  height="540" width="1080" scrolling="auto" frameborder="0" src="';
									the_sub_field('booking_url');
								echo '"></iframe>';
								echo '</span>';
							}else{
		
							}
						echo '</div>';
					echo '</div>';
					
					}else{
						
					}
				
        	endif;

    	endwhile;

	else :

    // no layouts found

	endif;
	}
}