<?php
/*
Plugin Name: KasLatex
Plugin URI: http://www.kasbeel.cl/kas2010/kasplugins/wp-kaslatex/
Description: Add latex language in your post and page.
Version: 1.0
Author: Wladimir A. Jimenez B.
Author URI: http://www.kasbeel.cl/kas2008

*/
/**
 * KasLatex Plugin
 * 
 * FILE
 * kaslatex.php
 *
 * DESCRIPTION
 * Contains hooks of the plugins
 *
 *   Copyright (C) 2010  Wladimir A. Jiménez B.
 *   E-mail: wjimenez@kasbeel.cl
 *   Home site: www.kasbeel.cl
 *
 *   This file is part of wp-kaslatex.
 *
 *   wp-kaslatex is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 **/

 /**
 * Inclusion of administration,  and general functions.
 */

   if(!defined('KASPLUGINS'))	
	include( 'kasplugins_administration.php' );
   include( 'kaslatex_const.php' );
   include( 'kaslatex_administration.php' );
   include( 'kaslatex_functions.php' );
 
 /**
 * Addition functions to hooks.
 */

if (is_admin()) {
   // Create administration menu 
   add_action( 'admin_menu', 'kaslatex_wp_addmenu' );
}


// Shortcode for [kaslatex  ....]
add_shortcode('kaslatex', 'kaslatex_wp_tags' );

// Activation of plugin
register_activation_hook( __FILE__, 'kaslatex_wp_activate' );

// Deactivation of plugin 
register_deactivation_hook( __FILE__, 'kaslatex_wp_deactivate' );

// Add link settings 
add_filter('plugin_action_links', 'kaslatex_wp_plugin_action', 10, 2);

