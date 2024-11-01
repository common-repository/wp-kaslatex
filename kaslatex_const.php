<?php
/**
 * Kaslatex Plugin
 * 
 * FILE
 * kaslatex_const.php
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
 
 /**
 * General Consts
 */
	function kaslatex_list_engines(){
		return 	array(
				0 => array("index" => 0, "text" => "Wordpress", "URL" => "http://l.wordpress.com/latex.php?latex="),
				1 => array("index" => 1, "text" => "Codecogs", "URL" => "http://latex.codecogs.com/png.latex?")
				);
	}
	
	function kaslatex_list_colors(){
		return	array(
				0 => array("index" => 0, "text" => "0 - Transparent", "value" => "FFFFFF", "const" => "transparent"),
				1 => array("index" => 1, "text" => "1 - Black", "value" => "000000", "const" => "black"),
				2 => array("index" => 2, "text" => "2 - White", "value" => "FFFFFF", "const" => "white"),
				3 => array("index" => 3, "text" => "3 - Red", "value" => "FF0000", "const" => "red"),
				4 => array("index" => 4, "text" => "4 - Green", "value" => "00FF00", "const" => "green"),
				5 => array("index" => 5, "text" => "5 - Blue", "value" => "0000FF", "const" => "blue")
				);
	}
	
	function kaslatex_list_sizes(){
		return array(
				0 => array("index" => 0, "text" => "0 - Small", "const" => "tiny"),
				1 => array("index" => 1, "text" => "1 - Medium", "const" => "small"),
				2 => array("index" => 2, "text" => "2 - Large", "const" => "normal"),
				3 => array("index" => 3, "text" => "3 - X Large", "const" => "large"),
				4 => array("index" => 4, "text" => "4 - XX Large", "const" => "LARGE")
				);
	}
 ?>