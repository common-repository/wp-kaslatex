<?php
/**
 * Kaslatex Plugin
 * 
 * FILE
 * kaslatex_functions.php
 *
 * DESCRIPTION
 * Contains base functions of the plugin.
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
 
	// Shortcode function for kaslatex tag; sample [kaslatex  ....]
	function kaslatex_wp_tags($atts, $content = null) {
		// get options array
		$options = get_option('kaslatex_wp_options');
		$bgcolor = $options['background'];
		$fgcolor = $options['foreground'];
		$size	 = $options['size'];
		$engine	 = $options['engine'];
		$engines = kaslatex_list_engines();
		$colors = kaslatex_list_colors();
		$sizes	= kaslatex_list_sizes();
		switch($engine){
			case '0':
				$url = kaslatex_wp_parsing_wordpress($content, $engines[$engine]['URL'], $colors[$bgcolor]['value'], $colors[$fgcolor]['value'], $size);
				break;
			case '1':
				$url = kaslatex_wp_parsing_codecogs($content, $engines[$engine]['URL'], $colors[$bgcolor]['const'], $colors[$fgcolor]['const'], $sizes[$size]['const']);
				break;
		}
		return '<a href="http://www.kasbeel.cl/kas2008" alt="'.$content.'"><img src="'.$url.'"/> </a>';
	}
	// Fix and translate special chars to correct use in latex formula.
	function kaslatex_wp_replace($content) {
		$content = str_replace("&#8211;","-",$content);
		$content = str_replace("&#8217;","'",$content);
		return $content;
	}
	// Parsing to Wordpress Latex
	function kaslatex_wp_parsing_wordpress($formula, $url, $bgcolor, $fgcolor, $size){
		//Replace special characters Fixes
		$urlfor = kaslatex_wp_replace($formula);
		//Encode Formula to URL
		$urlfor = urlencode($urlfor);
		return $url.$urlfor.'&bg='.$bgcolor.'&fg='.$fgcolor.'&s='.$size;
	}
	// Parsing to Codecogs Latex
	function kaslatex_wp_parsing_codecogs($formula, $url, $bgcolor, $fgcolor, $size){
		return $url.'\\bg_'.$bgcolor.' \\'.$size.' \color{'.$fgcolor.'} '.$formula;
	}
	// add settings link on plugins list
    function kaslatex_wp_plugin_action($links, $file) {
		if ($file == plugin_basename(dirname(__FILE__).'/kaslatex.php')){
			$settings_link = '<a href="admin.php?page=wp-kaslatex/kaslatex_administration.php">Settings</a>';
			return array_merge(array($settings_link), $links);
		}
		return $links;
    }	
?>