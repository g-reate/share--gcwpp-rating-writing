<?php

/******** ADMIN ********/
function gcrw_admin_enqueue_styles() {
  wp_enqueue_style( 'gcrw-admin-styles', GCRW_PLUGIN_URL . '/css/gcrw-admin.css', '', GCRW_VERSION, 'all' );
  wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', '', GCRW_VERSION, 'all' );
}
add_action( 'admin_enqueue_scripts', 'gcrw_admin_enqueue_styles' );

/*function gcrw_admin_enqueue_scripts() {
  wp_enqueue_script( 'gcrw-admin-scripts', GCRW_PLUGIN_URL . '/js/gcrw-admin.js', array('jquery'), GCRW_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'gcrw_admin_enqueue_scripts' );*/

/******** case by post-new & post
function gcrw_admin_enqueue_styles( $hook_suffix ) {
  if( $hook_suffix === "post-new.php" || $hook_suffix === "post.php" ) {
    wp_enqueue_style( 'gcrw-admin-styles', GCRW_PLUGIN_URL . '/css/gcrw-admin.css', '', GCRW_VERSION, 'all' );
  }
}
add_action( 'admin_enqueue_scripts', 'gcrw_admin_enqueue_styles' );

function gcrw_admin_enqueue_scripts( $hook_suffix ) {
  if( $hook_suffix === "post-new.php" || $hook_suffix === "post.php" ) {
    wp_enqueue_script( 'gcrw-admin-scripts', GCRW_PLUGIN_URL . '/js/gcrw-admin.js', array('jquery'), GCRW_VERSION, true );
  }
}
add_action( 'admin_enqueue_scripts', 'gcrw_admin_enqueue_scripts' );
********/


/******** WEBSITE ********/
function gcrw_enqueue_styles() {
  if( ! is_admin() ) {
    wp_enqueue_style( 'gcrw-styles', GCRW_PLUGIN_URL . '/css/gcrw.css', '', GCRW_VERSION, 'all' );
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', '', GCRW_VERSION, 'all' );
  }
}
add_action( 'wp_enqueue_scripts', 'gcrw_enqueue_styles' );

/*function gcrw_enqueue_scripts() {
  if( ! is_admin() ) {
    wp_enqueue_script( 'gcrw-scripts', GCRW_PLUGIN_URL . '/js/gcrw.js', array('jquery'), GCRW_VERSION, true );
  }
}
add_action( 'wp_enqueue_scripts', 'gcrw_enqueue_scripts' );*/

?>