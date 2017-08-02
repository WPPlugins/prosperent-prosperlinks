<?php
/*
Plugin Name: ProsperLinks
Description: Contains a link-optimizer and link-affiliator to easily monetize links already in your blog.
Version: 1.4
Author: Prosperent Brandon
Author URI: http://prosperent.com
Plugin URI: http://community.prosperent.com/forumdisplay.php?35-Wordpress-Plugin-Suite
License: GPLv3

    Copyright 2012  Prosperent Brandon  (email : brandon@prosperent.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Default caching time for products (in seconds)
if (!defined( 'PROSPERLINKS_CACHE_PRODS'))
    define( 'PROSPERLINKS_CACHE_PRODS', 604800 );
// Default caching time for trends and coupons (in seconds)
if (!defined( 'PROSPERLINKS_CACHE_COUPS'))
    define( 'PROSPERLINKS_CACHE_COUPS', 3600 );

if (!defined( 'WP_CONTENT_DIR'))
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if (!defined('PROSPERLINKS_URL'))
    define('PROSPERLINKS_URL', plugin_dir_url(__FILE__));
if (!defined('PROSPERLINKS_PATH'))
    define('PROSPERLINKS_PATH', plugin_dir_path(__FILE__));
if (!defined('PROSPERLINKS_BASENAME'))
    define('PROSPERLINKS_BASENAME', plugin_basename(__FILE__));
if (!defined('PROSPERLINKS_FOLDER'))
    define('PROSPERLINKS_FOLDER', plugin_basename(dirname(__FILE__)));
if (!defined('PROSPERLINKS_FILE'))
    define('PROSPERLINKS_FILE', basename((__FILE__)));
if (!defined('PROSPERLINKS_INCLUDE'))
	define('PROSPERLINKS_INCLUDE', PROSPERLINKS_PATH . 'includes');
if (!defined('PROSPERLINKS_MODEL'))
	define('PROSPERLINKS_MODEL', PROSPERLINKS_INCLUDE . '/models');
if (!defined('PROSPERLINKS_WIDGET'))
	define('PROSPERLINKS_WIDGET', PROSPERLINKS_INCLUDE . '/widgets');
if (!defined('PROSPERLINKS_VIEW'))
	define('PROSPERLINKS_VIEW', PROSPERLINKS_INCLUDE . '/views');
if (!defined('PROSPERLINKS_IMG'))
	define('PROSPERLINKS_IMG', PROSPERLINKS_URL . 'includes/img');
if (!defined('PROSPERLINKS_JS'))
	define('PROSPERLINKS_JS', PROSPERLINKS_URL . 'includes/js');
if (!defined('PROSPERLINKS_CSS'))
	define('PROSPERLINKS_CSS', PROSPERLINKS_URL . 'includes/css');
if (!defined('PROSPERLINKS_THEME'))
	define('PROSPERLINKS_THEME', WP_CONTENT_DIR . '/prosperent-themes');

error_reporting(0);   
	
require_once(PROSPERLINKS_INCLUDE . '/ProsperIndexController.php');

if(is_admin())
{
	require_once(PROSPERLINKS_INCLUDE . '/ProsperAdminController.php');
}

