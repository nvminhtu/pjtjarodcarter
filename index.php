<?php
//echo strpos($_SERVER['REQUEST_URI'], 'physical1/index.html', 0);
if( strpos( $_SERVER['REQUEST_URI'], 'physical1/index.html', 0) > 0 || strpos( $_SERVER['REQUEST_URI'], 'physical2/index.html', 0) > 0 ){
	header('location: /e-book/');	
	exit();
}
//print_r( $_REQUEST ); //exit();
global $post;
if( $post->ID == 5 )
{
	header('location: /e-book/');	
	exit();
}
/**
 * Cue the star of the show...
 *
 * @package Thesis
 */
thesis_html_framework();
?>