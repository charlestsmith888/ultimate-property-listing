<?php
// If Is admin
if (is_admin()):
// Add Menu
	function woo_add_menu_in_admin() {
		add_submenu_page(
			'edit.php?post_type=property',
			'Property Seting', /*page title*/
			'Settings', /*menu title*/
			'manage_options', /*roles and capabiliyt needed*/
			'ul_pro_setting',
			'ul_pro_setting' /*replace with your own function*/
			);
	}
	add_action('admin_menu', 'woo_add_menu_in_admin');
	//setting Page
	function ul_pro_setting()
	{
		require_once ULPROURL.'/inc/pages/settingpage.php';
	}
	// write css in admin
	function ul_pro_admnin_css() {
		echo "
		<style type='text/css'>
			.woo_fieldset {border: 1px solid #ebebeb;padding: 5px 20px;background: #fff;margin-bottom: 40px;-webkit-box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.1);-moz-box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.1);box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.1);}
			.woo_fieldset .sec-title {border: 1px solid #ebebeb;background: #fff;color: #d54e21;padding: 2px 4px;}
		</style>";
	}
	add_action( 'admin_head', 'ul_pro_admnin_css' );

	// Setting Fields
	add_action( 'admin_init', 'ul_pro_register_woo_settings' );
	function ul_pro_register_woo_settings() {
		register_setting( 'woo-settings-group', 'text-count' );
		register_setting( 'woo-settings-group', 'popupbtn' );
		register_setting( 'woo-settings-group', 'productcolm' );
	}
	
endif;	