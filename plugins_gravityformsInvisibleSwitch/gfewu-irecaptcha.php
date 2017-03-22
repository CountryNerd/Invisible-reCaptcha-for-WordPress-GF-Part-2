<?php
/**
 * Plugin Name: Gravity Form EWU Invisible Recaptcha
 * EWU Add On Invisible Recaptcha
 * Plugin URI: https://sites.ewu.edu/appdev/
 * Description: Invisible Recaptcha
 * Version: 0.2
 * Author: Danny Messina && James Reisenauer
 * License: GPLv2.
 *
 * Copyright 2016 Eastern Washington University
 *
 * @package   Members
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 *
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

define ( 'GF_EWU_ADDON_IRECAPTCHA_VERSION', '0.2' );

add_action( 'gform_loaded', array( 'GF_EWU_AddOn_Irecaptcha_Bootstrap', 'load' ), 5 );

class GF_EWU_AddOn_Irecaptcha_Bootstrap {

	public static function load() {

		if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
			return;
		}

		require_once( 'class-ewuaddonirecaptcha.php' );

		GFAddOn::register( 'GFEWUAddOnIrecaptcha' );
	}
}

function gf_ewu_addon_irecaptcha() {
	return GFEWUAddOnIrecaptcha::get_instance();
}
