<?php
/**
 * This file adds the Home Page to the genesis_theme_demo_1 Theme.
 *
 * @author StudioPress
 * @package genesis_theme_demo_1
 * @subpackage Customizations
 */
 
add_action( 'genesis_meta', 'genesis_theme_demo_1_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function genesis_theme_demo_1_home_genesis_meta() {

	if ( is_active_sidebar( 'home-widgets-1' ) || is_active_sidebar( 'home-widgets-2' ) || is_active_sidebar( 'home-widgets-3' ) || is_active_sidebar( 'home-widgets-4' ) || is_active_sidebar( 'home-widgets-5' ) || is_active_sidebar( 'home-widgets-6' ) ) {

		//* Force full width content layout
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		//* Add genesis_theme_demo_1-pro-home body class
		add_filter( 'body_class', 'genesis_theme_demo_1_body_class' );
		
		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		
		//* Add home featured widget
		add_action( 'genesis_after_header', 'genesis_theme_demo_1_home_featured_widget', 1 );
		
		//* Add home widgets
		add_action( 'genesis_before_footer', 'genesis_theme_demo_1_home_widgets', 5 );
		
	}
}

function genesis_theme_demo_1_body_class( $classes ) {

	$classes[] = 'genesis_theme_demo_1-pro-home';
	return $classes;
	
}

function genesis_theme_demo_1_home_featured_widget() {

	genesis_widget_area( 'home-widgets-1', array(
		'before' => '<div class="home-featured"><div class="wrap"><div class="home-widgets-1 color-section widget-area">',
		'after'  => '</div></div></div>',
	) );
	
}

function genesis_theme_demo_1_home_widgets() {

	echo '<div id="home-widgets" class="home-widgets">';
	
	genesis_widget_area( 'home-widgets-2', array(
		'before' => '<div class="home-widgets-2 widget-area">',
		'after'  => '</div>',
	) );
	
	genesis_widget_area( 'home-widgets-3', array(
		'before' => '<div class="home-widgets-3 color-section widget-area">',
		'after'  => '</div>',
	) );
	
	genesis_widget_area( 'home-widgets-4', array(
		'before' => '<div class="home-widgets-4 dark-section widget-area">',
		'after'  => '</div>',
	) );
	
	genesis_widget_area( 'home-widgets-5', array(
		'before' => '<div class="home-widgets-5 widget-area">',
		'after'  => '</div>',
	) );
	
	genesis_widget_area( 'home-widgets-6', array(
		'before' => '<div class="home-widgets-6 color-section widget-area">',
		'after'  => '</div>',
	) );
	
	echo '</div>';

}

genesis();
