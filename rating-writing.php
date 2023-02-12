<?php
/*
Plugin Name: Rating-Writing
Plugin URI: https://wordpress.org/plugins/rating-writing/
Description: Plugin for write in your own rating star into a WordPress blog.
Version: 1.2.4
Author: Tatsuhiro Sakata
Author URI: http://grace-create.com/
Text Domain: gcrw
Domain Path: /languages/
License: GPLv3

Copyright 2016  grace-create  (email : info@grace-create.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

// 1.2.4
// 4.5
// full path
// rating-writing/rating-writing.php
// rating-writing
// ~\wp-content\plugins\rating-writing
// http://~/wp-content/plugins/rating-writing

define( 'GCRW_VERSION', '1.2.4' );
define( 'GCRW_REQUIRED_WP_VERSION', '4.5' );
define( 'GCRW_PLUGIN', __FILE__ );
define( 'GCRW_PLUGIN_BASENAME', plugin_basename( GCRW_PLUGIN ) );
define( 'GCRW_PLUGIN_NAME', trim( dirname( GCRW_PLUGIN_BASENAME ), '/' ) );
define( 'GCRW_PLUGIN_DIR', untrailingslashit( dirname( GCRW_PLUGIN ) ) );
define( 'GCRW_PLUGIN_URL', untrailingslashit( plugins_url( '', GCRW_PLUGIN ) ) );

function gcrw_load_textdomain() {
  load_plugin_textdomain( 'gcrw', false, dirname( plugin_basename( GCRW_PLUGIN ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'gcrw_load_textdomain' );

require_once( GCRW_PLUGIN_DIR . "/classes/meta-boxes.class.php" );
require_once( GCRW_PLUGIN_DIR . "/includes/controller.php" );
require_once( GCRW_PLUGIN_DIR . "/includes/filters.php" );
require_once( GCRW_PLUGIN_DIR . "/includes/meta-boxes.php" );
require_once( GCRW_PLUGIN_DIR . "/includes/tag.php" );

?>