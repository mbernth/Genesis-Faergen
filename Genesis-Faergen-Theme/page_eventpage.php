<?php
/**
 * This file adds the Landing template to the Christianshavns Færgecafe Theme.
 *
 * @author mono voce aps
 * @package Crone
 * @subpackage Customizations
 */

/*
Template Name: Event page
*/

//* Add custom body class to the head
add_filter( 'body_class', 'crone_add_body_class' );
function crone_add_body_class( $classes ) {

   $classes[] = 'event';
   return $classes;
   
}

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// check if the flexible content field has rows of data
add_action( 'genesis_entry_content', 'event_booking_button_top', 1 );
function event_booking_button_top() {
	$text = get_field('book_event_text');
	$url = get_field('book_event_url');
	$top = get_field('top_button');
	
	if($top) {
		echo '<div class="top"><a href="' . $url . '" class="button booking" target="_blank">' . $text . '</a></div>';
	}
}

// check if the flexible content field has rows of data
add_action( 'genesis_entry_content', 'event_booking_button_last', 15 );
function event_booking_button_last() {
	$text = get_field('book_event_text');
	$url = get_field('book_event_url');
	
	if($text || $url) {
		echo '<div class="last"><a href="' . $url . '" class="button booking" target="_blank">' . $text . '</a></div>';
	}
}



//* Run the Genesis loop
genesis();
