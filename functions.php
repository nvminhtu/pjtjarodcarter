<?php
/**
 * Defines the necessary constants and includes the necessary files for Thesis’ operation.
 *
 * Many WordPress customization tutorials suggest editing a theme’s functions.php file. With 
 * Thesis, you should edit the included custom/custom_functions.php file if you wish
 * to make modifications.
 *
 * @package Thesis
 */

// Define directory constants
define('THESIS_LIB', TEMPLATEPATH . '/lib');
define('THESIS_ADMIN', THESIS_LIB . '/admin');
define('THESIS_CLASSES', THESIS_LIB . '/classes');
define('THESIS_FUNCTIONS', THESIS_LIB . '/functions');
define('THESIS_CSS', THESIS_LIB . '/css');
define('THESIS_HTML', THESIS_LIB . '/html');
define('THESIS_SCRIPTS', THESIS_LIB . '/scripts');
define('THESIS_IMAGES', THESIS_LIB . '/images');
define('THESIS_CUSTOM', STYLESHEETPATH . '/custom');

// Define folder constants
define('THESIS_CSS_FOLDER', get_bloginfo('template_url') . '/lib/css'); #wp
define('THESIS_SCRIPTS_FOLDER', get_bloginfo('template_url') . '/lib/scripts'); #wp
define('THESIS_IMAGES_FOLDER', get_bloginfo('template_url') . '/lib/images'); #wp

if (file_exists(THESIS_CUSTOM)) {
	define('THESIS_CUSTOM_FOLDER', get_bloginfo('stylesheet_directory') . '/custom'); #wp
	define('THESIS_LAYOUT_CSS', THESIS_CUSTOM . '/layout.css');
	define('THESIS_ROTATOR', THESIS_CUSTOM . '/rotator');
	define('THESIS_ROTATOR_FOLDER', THESIS_CUSTOM_FOLDER . '/rotator');
}
elseif (file_exists(TEMPLATEPATH . '/custom-sample')) {
	define('THESIS_SAMPLE_FOLDER', get_bloginfo('stylesheet_directory') . '/custom-sample'); #wp
	define('THESIS_LAYOUT_CSS', TEMPLATEPATH . '/custom-sample/layout.css');
	define('THESIS_ROTATOR', TEMPLATEPATH . '/custom-sample/rotator');
	define('THESIS_ROTATOR_FOLDER', THESIS_SAMPLE_FOLDER . '/rotator');
}

// Load classes
require_once(THESIS_CLASSES . '/comments.php');
require_once(THESIS_CLASSES . '/css.php');
require_once(THESIS_CLASSES . '/data.php');
require_once(THESIS_CLASSES . '/favicon.php');
require_once(THESIS_CLASSES . '/head.php');
require_once(THESIS_CLASSES . '/javascript.php');
require_once(THESIS_CLASSES . '/loop.php');
require_once(THESIS_CLASSES . '/options_design.php');
require_once(THESIS_CLASSES . '/options_page.php');
require_once(THESIS_CLASSES . '/options_site.php');
require_once(THESIS_CLASSES . '/options_terms.php');

// Admin stuff
if (is_admin()) { #wp
	require_once(THESIS_ADMIN . '/file_editor.php');
	require_once(THESIS_ADMIN . '/fonts.php');
	require_once(THESIS_ADMIN . '/header_image.php');
	require_once(THESIS_ADMIN . '/options_manager.php');
	require_once(THESIS_ADMIN . '/options_post.php');
	require_once(THESIS_ADMIN . '/admin.php');
}

// Load template-based function files
require_once(THESIS_FUNCTIONS . '/comments.php');
require_once(THESIS_FUNCTIONS . '/compatibility.php');
require_once(THESIS_FUNCTIONS . '/content.php');
require_once(THESIS_FUNCTIONS . '/document.php');
require_once(THESIS_FUNCTIONS . '/feature_box.php');
require_once(THESIS_FUNCTIONS . '/helpers.php');
require_once(THESIS_FUNCTIONS . '/multimedia_box.php');
require_once(THESIS_FUNCTIONS . '/nav_menu.php');
require_once(THESIS_FUNCTIONS . '/post_images.php');
require_once(THESIS_FUNCTIONS . '/teasers.php');
require_once(THESIS_FUNCTIONS . '/version.php');
require_once(THESIS_FUNCTIONS . '/widgets.php');

// Load HTML frameworks
require_once(THESIS_HTML . '/content_box.php');
require_once(THESIS_HTML . '/footer.php');
require_once(THESIS_HTML . '/frameworks.php');
require_once(THESIS_HTML . '/header.php');
require_once(THESIS_HTML . '/hooks.php');
require_once(THESIS_HTML . '/sidebars.php');
require_once(THESIS_HTML . '/templates.php');

// Launch Thesis within WordPress
require_once(THESIS_FUNCTIONS . '/launch.php');

// Include the user's custom_functions file, but only if it exists
if (file_exists(THESIS_CUSTOM . '/custom_functions.php'))
	include_once(THESIS_CUSTOM . '/custom_functions.php');
	
	
	
register_nav_menus(array(
	'sales_page_footer_menu' => 'Sales Page Footer Menu'
));

add_action('wp_head', 'initiate_custom_footer_links_removal');

function initiate_custom_footer_links_removal() {
	if(is_page_template('custom_sales_page_template.php')) {
		global $wp_custom_headers_and_footers;

		if(class_exists('CustomHeadersAndFooters')) {
			remove_action('wp_footer', array($wp_custom_headers_and_footers, 'wp_footer'));
		}
	}
}
	
add_filter('addthis_post_exclude', 'addthis_post_exclude');
function addthis_post_exclude($display) {

	if(is_page_template('custom_sales_page_template.php')) {
		$display = false;
	}
	
	return $display;
}

/**Custom post thumbnail**/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 500, 400 );
add_image_size( 'teaser-image', 100, 100, true);

// add_action('thesis_hook_before_post','add_thumbnail');
// function add_thumbnail() {
// 	if(has_post_thumbnail() && is_single()):
// 		echo '<p>'.get_the_post_thumbnail().'</p>';
// 		elseif(has_post_thumbnail()):
// 		echo '<p><a href="'.get_permalink().'">'.get_the_post_thumbnail().'</a></p>';
// 	endif;
// }

add_action('thesis_hook_before_teaser','teaser_thumbnail');
function teaser_thumbnail() {
	if(has_post_thumbnail()):
	echo '<p class="custom-teaser"><a href="'.get_permalink().'">';	
		the_post_thumbnail('teaser-image',array( 'class' => 'thumb alignleft' ));
	echo '</a></p>';
	endif;
}


add_action('thesis_hook_post_box_bottom','social_share');
function social_share() {
	if ( is_singular() ) {
		echo do_shortcode("[wp_social_sharing social_options='facebook,twitter,googleplus' twitter_username='arjun077' facebook_text='Share on Facebook' twitter_text='Share on Twitter' googleplus_text='Share on Google+' icon_order='f,t,g,l,p,x' show_icons='0' before_button_text='' text_position='' social_image='']");

    echo do_shortcode('[wpdevart_facebook_comment curent_url="'.get_permalink().'" order_type="social" title_text="Facebook Comment" title_text_color="#000000" title_text_font_size="22" title_text_font_famely="monospace" title_text_position="left" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" ]');
	}	
}