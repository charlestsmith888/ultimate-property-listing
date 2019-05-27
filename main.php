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
Text Domain: ul_pro
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
define('ULPROURL', dirname(__FILE__));
define('ULPROASSETS', plugins_url('/ultimate-property-listing/assets/'));

<<<<<<< HEAD
$plugin = plugin_basename(__FILE__);
define('ULMAINPATH', $dir = plugin_dir_path( __FILE__ ));
define('ULMAINURL', plugin_dir_url($plugin));


=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
// Admin Code
require_once ULPROURL.'/inc/admin/admin.php';
require ULPROURL.'/inc/admin/ul_custom_taxonomy.php';
require ULPROURL.'/inc/admin/ul_custom_fiels.php';
require ULPROURL.'/inc/admin/ul_shortcodes.php';
<<<<<<< HEAD
require ULPROURL.'/inc/admin/ul_ajax.php';

=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e


// Public Code
require_once ULPROURL.'/inc/public/public.php';



// get options custom
if (!function_exists('ul_pro_get_option')) {
	function ul_pro_get_option($key='') {
		if ($key == '') {
			return;
		}
		$woo_settings = array(
			// 'text-count' => 75,
			// 'productcolm' => 'col-md-6',
			// 'popupbtn' => '[...]',
			// 'woo-popup' => 'red',
			'ul_currency' => 'AED',
			'googleapi' => 'AIzaSyDDJS7wVeKbFe74xYOd4dd0MrfyMEFjo6A',
			'columncontent' => '
					<div class="col-md-3 style1">
						<div class="propertythumb"><a href="{$link}"><img src="{$img}" alt=""></a></div>
						<div class="properties_info">
							<h2>{$title}</h2>
							<p>{$address}</p>
							<h3>${$price}</h3>
							<a href="{$link}">Read More</a>
						</div>
					</div>	
			'
			);
		if ( get_option($key) != '' ) {
			return get_option($key);
		} else {
			return $woo_settings[$key];
		}
	}
}

<<<<<<< HEAD
add_post_type_support( 'page', 'excerpt' );
=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e

