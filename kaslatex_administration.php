<?php
/**
 * Kaslatex Plugin
 * 
 * FILE
 * kaslatex_administration.php
 *
 * DESCRIPTION
 * Contains base functions to admin of the plugin.
 *
 *   Copyright (C) 2010  Wladimir A. Jimenez B.
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

	// Function plugin active, set initial parameters
	function kaslatex_wp_activate() {
		if ( false === get_option('kaslatex_wp_options') )
		{
			// set default options
			$def = array( 'engine' => '0', 'background' => '2', 'foreground' => '1', 'size' => '0');
			update_option('kaslatex_wp_options', $def);
		}

	}
	// Function plugin deactive
	function kaslatex_wp_deactivate() {
		//empty
	}

	// Function plugin uninstall, clean all data of the plugin
	function kaslatex_wp_uninstall() {
		//clear options
		delete_option('kaslatex_wp_options');	   
	}

	// Home plugins menu.
	function kaslatex_wp_admin_settings() {
		kasplugins_wp_admin_home();
		echo '<script language="JavaScript">function onChangeData(){';
		echo "var back = document.getElementById('kaslatex_wp_background').value;";
		echo "var fore = document.getElementById('kaslatex_wp_foreground').value;";
		echo "var size = document.getElementById('kaslatex_wp_size').value;";
		echo "var img  = document.getElementById('kaslatex_wp_preview');";
		echo '}</script>';
		echo '<div class="wrap">';
		echo '<h2>KasLatex</h2>';
		// get options array
		$options = get_option('kaslatex_wp_options');
		// Overwrite existing options
		if ( isset( $_POST['submit'] ) ) {
			$options['engine'] = $_POST['kaslatex_wp_engine'];
			$options['background'] = $_POST['kaslatex_wp_background'];
			$options['foreground'] = $_POST['kaslatex_wp_foreground'];
			$options['size'] = $_POST['kaslatex_wp_size'];
			update_option( 'kaslatex_wp_options', $options );
		}		
		echo 'More details in homepage of the plugin in : <a href="http://www.kasbeel.cl/kas2010/kasplugins/wp-kaslatex/">Kasbeel Plugins for Wordpress - KasLatex</a>.</p>';
		echo '<form method="post" action=""><table class="widefat"><thead><tr><th colspan="4" style="text-align:center;">Customization</th></tr></thead>';
		echo '<tr valign="top"><th scope="row" colspan="4" style="text-align:center;">Latex Engine</th></tr>';
		echo '<tr valign="top"><th scope="row" colspan="4" style="text-align:center;"><select name="kaslatex_wp_engine" id="kaslatex_wp_engine" onChange="onChangeData();">';
		//engine options
		foreach (kaslatex_list_engines() as $engine) {
			echo '<option value="'.$engine['index'].'" '. ( $engine['index'] == $options['engine'] ? ' selected="selected"' : '' ) . '>' . $engine['text'] . '</option>';
		}
		echo '</select></th></tr>';
		echo '<tr valign="top"><th scope="row" colspan="2">Colors</th><th scope="row" colspan="2">Size</th></tr>';
		echo '<tr><td>Background</td><td><select name="kaslatex_wp_background" id="kaslatex_wp_background" onChange="onChangeData();">';
		//colors options
		foreach (kaslatex_list_colors() as $color) {
			echo '<option value="'.$color['index'].'" '. ( $color['index'] == $options['background'] ? ' selected="selected"' : '' ) . '>' . $color['text'] . '</option>';
		}
		echo '</select></td><td>Select</td><td><select name="kaslatex_wp_size" id="kaslatex_wp_size" onChange="onChangeData();" >';
		//sizes options
		foreach (kaslatex_list_sizes() as $size) {
			echo '<option value="'.$size['index'].'" '. ( $size['index'] == $options['size'] ? ' selected="selected"' : '' ) . '>' . $size['text'] . '</option>';
		}
		echo '</select></td></tr><tr><td>Foreground</td><td><select name="kaslatex_wp_foreground" id="kaslatex_wp_foreground" onChange="onChangeData();" >';
		//colors options
		foreach (kaslatex_list_colors() as $color) {
			echo '<option value="'.$color['index'].'" '. ( $color['index'] == $options['foreground'] ? ' selected="selected"' : '' ) . '>' . $color['text'] . '</option>';
		}
		echo '</select></td><td colspan="2"></td>';
		echo '</tr><thead><tr><th colspan="4" style="text-align:center;">Preview</th></tr></thead><tr><td colspan="4">';
		echo '<center>';
		echo kaslatex_wp_tags("","f'(x) = \lim_{h \\to 0} {f(x+h)-f(h) \over h}");
		echo '</center>';
		echo '</td></tr></table><p class="submit"><input type="submit" name="submit" class="button-secondary" value="Save changes" /></p></form>';
		echo '<table class="widefat">';
		echo '<thead>';
		echo '<tr><th colspan="2" style="text-align:center;">';
		echo 'Help';
		echo '</th></tr>';
		echo '</thead>';
		echo '<tr><td>';
		echo 'Using To:<br/>';
		echo '<br/>';
		echo '&nbsp;Latex Formula:<br/>';
		echo '<br/>';
		echo '&nbsp;[kaslatex]Latex Formula[/kaslatex]<br/>';
		echo '&nbsp;&nbsp;Latex Formula:<br/>';
		echo '&nbsp;&nbsp;&nbsp;is language using to for latex.<br/>';
		echo '&nbsp;&nbsp;&nbsp;Examples <a href="http://www.kasbeel.cl/kas2010/kasplugins/wp-kaslatex/">here</a><br/>';
		echo '<td></tr></table>';
		echo '</div>';
	}

	// Create Plugins Menu.
	function kaslatex_wp_addmenu() {
		if ( function_exists('add_submenu_page') ) {
			// General plugins settings
			add_submenu_page( KASPLUGINS.'/kasplugins_administration.php', 'KasLatex', 'KasLatex', 8, __FILE__, 'kaslatex_wp_admin_settings');
		}
	}

?>