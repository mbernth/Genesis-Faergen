<?php
/**
 * This file adds the Landing template to the Christianshavns Færgecafe Theme.
 *
 * @author mono voce aps
 * @package Crone
 * @subpackage Customizations
 */

/*
Template Name: Home
*/

//* Add custom body class to the head
add_filter( 'body_class', 'crone_add_body_class' );
function crone_add_body_class( $classes ) {

   $classes[] = 'featured-image';
   return $classes;
   
}

//* Remove the entry title
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

add_action( 'wp_enqueue_scripts', 'top_mage_scripts' );
function top_mage_scripts() {
		wp_enqueue_script( 'mono-jquery', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'mono-featured-height', get_bloginfo( 'stylesheet_directory' ) . '/js/home.image.height.js', array( 'jquery' ), '1.0.0', true );
}

// Top image and text
add_action( 'genesis_after_header', 'top_image', 1 );
function top_image() {
	$image = get_field( 'top_image' );  //top image
	$headline = get_field( 'headline' );  //top headline
	$text = get_field( 'top_text' );  //top text
	$button_text = get_field( 'button_text' );  //Button text
	$button_url = get_field( 'button_url' );  //Button url
	
	if ( $image || $headline || $text || $button_text || $button_url ) {
		echo '<div class="image-section home-image" style="background-image:url(' . $image . ');">';
		echo '<div class="gradient"><div class="wrap">';
		echo '<h1>' . $headline . '</h1>';
		echo '' . $text . '';
		if ( ! wp_is_mobile() ) {
			echo '<a href="#" data-display="box-top" class="button">' . $button_text . '</a>';
		}else{
			echo '<a href="' . $button_url . '" class="button" target="_blank">' . $button_text . '</a>';
		}
		echo '</div></div></div>';
		if ( ! wp_is_mobile() ) {
			echo '<span id="box-top" class="portBox">';
			echo '<iframe  height="540" width="1080" scrolling="auto" frameborder="0" src="' . $button_url . '"></iframe>';
			echo '</span>';
		}else{
		
		}
	}
	
}

// Events and featured event
add_action( 'genesis_entry_content', 'cafe_events', 1 );
function cafe_events() {
	$f_headline = get_field( 'headline', 'option' );  //featured headline
	$f_image = get_field( 'udvalgt_event_billede', 'option' );  //featured image
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
				echo '<td>';
					if( have_rows('sold_out') ){
					echo '<span class="button sold_out">' . __( 'Sold out', 'mono' ) . '</span>';
						}else{
					echo '<a href="';
					the_sub_field('billet');
					echo '" class="button" target="_blank">';
					echo '' . __( 'Buy ticket', 'mono' ) . '';
					echo '</a>';
					}
				echo '</td>';
			echo '</tr>';
			}
		endwhile;
		
		echo '</table></tbody>';
	}
	echo '</div>';
	echo '<div class="event-featured">';
	if ( $f_image || $f_text || $f_url ) {
		echo '<a href="' . $f_url . '">';
		echo '<img src="' . $f_image . '">';
		echo '</a>';
		echo '<p>' . $f_text . '</p>';
	}
	echo '</div>';
}

// check if the flexible content field has rows of data
add_action( 'genesis_after_entry_content', 'mono_flexible_gridset', 1 );
function mono_flexible_gridset() {
	
	if( have_rows('content_rows') ):

		// loop through the rows of data
    	while ( have_rows('content_rows') ) : the_row();

        	if( get_row_layout() == 'full_width_column' ):
				
				if (get_sub_field('hide')){
					}else{
					
				if (get_sub_field('dark_background')){
				echo '<div class="gridcontainer dark_background">';
					}else{
				echo '<div class="gridcontainer">';
				}
				
				echo '<div class="wrap">';
					echo '<div class="coll1">';
						if ( get_sub_field('headline') ){
							echo '<h2 class="entry-title">';
        					the_sub_field('headline');
							echo '</h2>';
						}else{
						}
						the_sub_field('content');
					echo '</div>';
				echo '</div>';
				echo '</div>';
				
				}
				
        	elseif( get_row_layout() == 'two_columns' ):
			
				if (get_sub_field('hide')){
					}else{
						
				if (get_sub_field('dark_background')){
				echo '<div class="gridcontainer dark_background">';
					}else{
				echo '<div class="gridcontainer">';
				}
				
				echo '<div class="wrap">';
					echo '<div class="coll2">';
						if ( get_sub_field('headline_left') ){
							echo '<h2 class="entry-title">';
        					the_sub_field('headline_left');
							echo '</h2>';
						}else{
						}
						if ( get_sub_field('image_left') ){
							echo '<img src="';
        					the_sub_field('image_left');
							echo '">';
						}else{
						}
						the_sub_field('content_left');
					echo '</div>';
					echo '<div class="coll2">';
						if ( get_sub_field('headline_right') ){
							echo '<h2 class="entry-title">';
        					the_sub_field('headline_right');
							echo '</h2>';
						}else{
						}
						if ( get_sub_field('image_right') ){
							echo '<img src="';
        					the_sub_field('image_right');
							echo '">';
						}else{
						}
						the_sub_field('content_right');
					echo '</div>';
				echo '</div>';
				echo '</div>';
				
				}
				
			elseif( get_row_layout() == 'three_columns' ):
				
				if (get_sub_field('hide')){
					}else{
						
				if (get_sub_field('dark_background')){
				echo '<div class="gridcontainer dark_background">';
					}else{
				echo '<div class="gridcontainer">';
				}
				
				echo '<div class="wrap">';
					echo '<div class="coll3">';
        				the_sub_field('headline_left_3');
					echo '</div>';
					echo '<div class="coll3">';
						the_sub_field('headline_center');
					echo '</div>';
					echo '<div class="coll3">';
						the_sub_field('headline_right_3');
					echo '</div>';
				echo '</div>';
				echo '</div>';
				
				}
				
			elseif( get_row_layout() == 'four_columns' ):
			
				if (get_sub_field('hide')){
					}else{
						
				if (get_sub_field('dark_background')){
				echo '<div class="gridcontainer dark_background">';
					}else{
				echo '<div class="gridcontainer">';
				}

				echo '<div class="wrap">';
					echo '<div class="coll4">';
        				the_sub_field('gridset_4_1');
					echo '</div>';
					echo '<div class="coll4">';
						the_sub_field('gridset_4_2');
					echo '</div>';
					echo '<div class="coll4">';
						the_sub_field('gridset_4_3');
					echo '</div>';
					echo '<div class="coll4">';
						the_sub_field('gridset_4_4');
					echo '</div>';
				echo '</div>';
				echo '</div>';
				}
				
			elseif( get_row_layout() == 'full_width_area' ):
				
				if (get_sub_field('hide')){
					}else{
				echo '<div class="gridcontainer">';
				}
					echo '<div class="coll1">';
						the_sub_field('full_width');
					echo '</div>';
				echo '</div>';
				
				
        	endif;

    	endwhile;

	else :

    // no layouts found

	endif;

}



//* Run the Genesis loop
genesis();
