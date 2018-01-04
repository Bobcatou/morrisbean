<?php
/**
 * Executive Pro.
 *
 * This file adds the front page to the Executive Pro Theme.
 *
 * @package Executive
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/executive/
 */

add_action( 'genesis_meta', 'executive_home_genesis_meta' );
/**
 * Add widget support for the front page. If no widgets active, display the default loop.
 *
 * @since 3.0.0
 */
function executive_home_genesis_meta() {

	if ( is_active_sidebar( 'home-slider' ) || is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-cta' ) || is_active_sidebar( 'home-middle' ) ) {

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'executive_home_sections' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		add_filter( 'body_class', 'executive_add_home_body_class' );

	}

}

// Widget areas to output on the front page.
function executive_home_sections() {

	echo '<h2 class="screen-reader-text">' . __( 'Main Content', 'executive-pro' ) . '</h2>';


genesis_widget_area( 'under-header-top', array(
	'before' => '<div class="home-under-header-wrapper"><div class="home-under-header-top widget-area">',
	'after'  => '</div>',
) );

genesis_widget_area( 'under-header-bottom', array(
	'before' => '<div class="under-header-bottom widget-area">',
	'after'  => '</div></div>',
) );


	echo '<h2 class= "cap-head">Capabilities</h2>';

	genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top widget-area">',
		'after'  => '</div>',
	) );


	genesis_widget_area( 'home-additional-services', array(
		'before' => '<div class="home-additional-services widget-area">',
		'after'  => '</div>',
	) );


	genesis_widget_area( 'home-cta', array(
		'before' => '<div class="home-cta widget-area">',
		'after'  => '</div>',
	) );

genesis_widget_area( 'home-middle-left', array(
	'before' => '<div class="home-middle-wrapper"><div class="home-top-left widget-area one-half first">',
	'after'  => '</div>',
) );

genesis_widget_area( 'home-middle-right', array(
	'before' => '<div class="home-middle-right widget-area one-half">',
	'after'  => '</div></div>',
) );
}

// Add body class to home page.
function executive_add_home_body_class( $classes ) {

	$classes[] = 'executive-pro-home';
	
	return $classes;

}

// Run the Genesis loop.
genesis();
