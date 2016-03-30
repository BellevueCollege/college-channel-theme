<?php
/**
 * Enqueue Parent stylesheet
 *
 */

add_action( 'wp_enqueue_scripts', 'collegechannel_enqueue_styles' );
function collegechannel_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/**
 * Hide default credit text (sorry!)
 */
function collegechannel_credits_text( $text ) {
	return false;
}

add_filter( 'tinyframework_credits_text', 'collegechannel_credits_text' );

/**
 * Add logo
 *
 * This should be able to be replaced by default logo system in WP 4.5
 */
function collegechannel_logo() {
	$output  = '<div id="collegechannel-logo"><a href="';
	$output .= get_home_url();
	$output .= '"><img src="';
	$output .= get_stylesheet_directory_uri ();
	$output .= '/img/college-channel-logo-246x75.png" alt="';
	$output .= get_bloginfo( 'name' );
	$output .= ' logo with link to home page" ></a></div>';
	echo $output;
}
add_action( 'tha_header_top', 'collegechannel_logo' );

/**
 * Add search (example from default child theme)
 *
 */
function collegechannel_add_search_to_wp_menu ( $items, $args ) {
	if( 'primary' === $args -> theme_location ) {
	$items .= '<li class="menu-item menu-item-search">' . get_search_form(false) . '</li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items','collegechannel_add_search_to_wp_menu',10,2 );


/* Enable shortcodes in widget text */
add_filter('widget_text', 'do_shortcode');
