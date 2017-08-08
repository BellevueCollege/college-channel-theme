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
* Registers an editor stylesheet for the theme.
*/
function collegechannel_add_editor_styles() {
	add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'collegechannel_add_editor_styles' );