<?php
/**
 * @package  CSSUX
 */
/*
Plugin Name: CSS UX
Plugin URI: https://bigsheepstudio.dk
Description: An easy-to-use and beutiful WordPress Plugin to add custom CSS styles that override Plugin and Theme default styles. This plugin is designed to offer a great experience to anyone that would like to add their own CSS to their WordPress website.  Styles created with this plugin will render even if the theme is changed.
Version: 1.0.0
Author: Baldur Arge Sveinsson
Author URI: https://bigsheepstudio.dk
License: GPLv2 or later
Text Domain: bigsheep
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/


//If this file is called directly, then abort!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );


//Require once the composer autoloader
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_cssux_plugin(){
	Activate::activate();
}
register_activation_hook(__FILE__, 'activate_cssux_plugin');

/**
 * The code that runs during plugin deactivation
 */
function deactivate_cssux_plugin(){
	Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_cssux_plugin');

/**
 * Initialize all the core classes of the plugin
 */


if ( ! is_admin() ) {
	if ( class_exists( 'Inc\\Init' ) ) {
		Inc\Init::register_public_services();
	}
} else{
	if ( class_exists( 'Inc\\Init' ) ) {
		Inc\Init::register_services();
	}
}