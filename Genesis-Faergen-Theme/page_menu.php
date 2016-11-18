<?php
/**
 * This file adds the Landing template to the Christianshavns Færgecafe Theme.
 *
 * @author mono voce aps
 * @package Crone
 * @subpackage Customizations
 */

/*
Template Name: Menus
*/

//* Add custom body class to the head
add_filter( 'body_class', 'crone_add_body_class' );
function crone_add_body_class( $classes ) {

   $classes[] = 'menu';
   return $classes;
   
}

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* check if the flexible content field has rows of data
add_action( 'genesis_entry_content', 'mono_repeater_menu', 5 );
function mono_repeater_menu() {
	$menus = get_field('menus');
	
	if($menus) {
		
		foreach($menus as $menu ) {
			if( $menu['recomended']){
				echo '<div class="gridcontainer recomended">';
			}else{
				echo '<div class="gridcontainer">';
			}
					echo '<div class="coll1">';
						if( $menu['headline']){
							echo '<h2>' . $menu['headline']. '</h2>';
						}
						if( $menu['dish'] ) {
							
						foreach($menu['dish'] as $dish ) {
							if( $dish['title']){
								echo '<h3>' . $dish['title']. '</h3>';
							}
							if( $dish['text']){
								echo '' . $dish['text']. '';
							}
						}
						
						}
					echo '</div>';
			echo '</div>';
		}
		
	}
	
	$booking_text = get_field( 'booking_label' );  //Button text
	$booking_url = get_field( 'booking_url' );  //Button url
	
	if ( $booking_text || $booking_url ) {
		if ( ! wp_is_mobile() ) {
			echo '<a href="#" data-display="box-menu" class="button booking">' . $booking_text . '</a>';
		}else{
			echo '<a href="' . $booking_url . '" class="button booking" target="_blank">' . $booking_text . '</a>';
		}
		if ( ! wp_is_mobile() ) {
			echo '<span id="box-menu" class="portBox">';
			echo '<iframe  height="540" width="1080" scrolling="auto" frameborder="0" src="' . $booking_url . '"></iframe>';
			echo '</span>';
		}else{
		
		}
	}
	
}

// check if top button
add_action( 'genesis_entry_content', 'booking_menu_top_button', 1 );
function booking_menu_top_button() {
	$booking_text = get_field( 'booking_label' );  //Button text
	$booking_url = get_field( 'booking_url' );  //Button url
	$booking_top = get_field( 'top_booking_button' );
	
	if ( $booking_top ) {
		if ( ! wp_is_mobile() ) {
			echo '<a href="#" data-display="box-menu" class="button booking">' . $booking_text . '</a>';
		}else{
			echo '<a href="' . $booking_url . '" class="button booking" target="_blank">' . $booking_text . '</a>';
		}
		if ( ! wp_is_mobile() ) {
			echo '<span id="box-menu" class="portBox">';
			echo '<iframe  height="540" width="1080" scrolling="auto" frameborder="0" src="' . $booking_url . '"></iframe>';
			echo '</span>';
		}else{
		
		}
	}
	
}



//* Run the Genesis loop
genesis();
