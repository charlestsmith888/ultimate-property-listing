<?php
/**
 * @package w_a_p_l
 * @version 1.0
 */
/*
Plugin Name: Ultimate Property lisitng
Plugin URI: #
Description: Ultimate property listing
Version: 1.0
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: Woo_shortcode
Author URI: #
*/
/*
    Copyright (C) Year  Author  Email : charlestsmith888@gmail.com
    Woocommerce Advanced plugin layout is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    Woocommerce Advanced plugin layout is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Woocommerce Advanced plugin layout; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


define(WOOURL, plugins_url('/ultimate-property-listing/'));

define(WOOASSETS, plugins_url('/ultimate-property-listing/assets/'));

// Shortcode
// require_once 'shortcode.php';

// Admin Code
require_once 'inc/admin/admin.php';

// Public Code
require_once 'inc/public/public.php';


// get options custom
if (!function_exists('ul_pro_get_option')) {
	function ul_pro_get_option($key='') {
		if ($key == '') {
			return;
		}
		$woo_settings = array(
			'text-count' => 75,
			'productcolm' => 'col-md-6',
			'popupbtn' => '[...]',
			'woo-popup' => 'red'
			);
		if ( get_option($key) != '' ) {
			return get_option($key);
		} else {
			return $woo_settings[$key];
		}
	}
}

