<?php
/**
 * This file adds the Landing template to the Christianshavns Færgecafe Theme.
 *
 * @author mono voce aps
 * @package Crone
 * @subpackage Customizations
 */

/*
Template Name: Selskabsmenu
*/

//* Add custom body class to the head
add_filter( 'body_class', 'home_add_body_class' );
function home_add_body_class( $classes ) {

   $classes[] = 'selskabsmenu';
   return $classes;
   
}

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Force full width content
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


//* Selvskabsmenu content grid
// =====================================================================================================================

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_selskabsmenu' );
function enqueue_scripts_selskabsmenu() {
	wp_enqueue_script( 'gallery-jq', get_stylesheet_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'gallery-boot', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'gallery-page', get_stylesheet_directory_uri() . '/js/jquery.gridder.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'galler-init', get_stylesheet_directory_uri() . '/js/gallery.js', array( 'jquery' ), '1.0.0', true );
	
}

// check if the flexible content field has rows of data
add_action( 'genesis_after_entry', 'mono_selskabsmenu_grids', 15 );
function mono_selskabsmenu_grids() {
	$rows = get_field( 'selskabsmenu' );
	$i = 0;  //this is a variable which sets up the counter starting at 0
	$loopCount = 0;
	$loopCounter = 0;
	
	if ($rows){
		echo '<ul class="gridder">';

			foreach($rows as $row) {
				echo '<li class="gridder-list" data-griddercontent="#gridder-content-'.$loopCount.'">';
				echo '<div class="image" style="background-image:url(' . $row['image'] .');">';
					echo '<div class="gallery_overlay">';
						echo '<h2>' . $row['titel'] .'</h2>';
					echo '</div>';
				echo '</div>';
				echo '</li>';
				$loopCount ++;
			}
		
		echo '</ul>';
			
			foreach($rows as $row) {
				echo '<div id="gridder-content-'.$loopCounter.'" class="gridder-content">';
				echo '<img src="' . $row['image'] . '">';
					echo '<div class="gallery_description">';
						echo '<h2>' . $row['titel'] .'</h2>';
						echo '' . $row['tekst'] .'';
					echo '</div>';
				echo '</div>';
				echo '</li>';
				$loopCounter ++;
			}
		
	}
}



//* Run the Genesis loop
genesis();
