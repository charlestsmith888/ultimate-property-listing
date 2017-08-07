<?php  

// If Is admin
if (is_admin()):

// write css in admin
// function woo_admnin_css() {
// 	echo "
// 	<style type='text/css'>
// 		.woo_fieldset {border: 1px solid #ebebeb;padding: 5px 20px;background: #fff;margin-bottom: 40px;-webkit-box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.1);-moz-box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.1);box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.1);}
// 		.woo_fieldset .sec-title {border: 1px solid #ebebeb;background: #fff;color: #d54e21;padding: 2px 4px;}
// 	</style>";
// }
// add_action( 'admin_head', 'woo_admnin_css' );


// Setting Fields
// add_action( 'admin_init', 'woo_register_woo_settings' );
// function woo_register_woo_settings() {
// 	register_setting( 'woo-settings-group', 'text-count' );
// 	register_setting( 'woo-settings-group', 'popupbtn' );
// 	register_setting( 'woo-settings-group', 'productcolm' );
// }

// add_action( 'admin_init', 'woo_pop_register_woo_settings' );
// function woo_pop_register_woo_settings() {
// 	register_setting( 'woo-pop-up-settings-group', 'woo-popup' );
// }

// Add Menu
// function woo_add_menu_in_admin() {
// 	add_menu_page('Woocommerce Advanced Product Setting', 'Woocommerce Advanced Product', 'manage_options', 'woo_settingPage', 'woo_settingPage', 'dashicons-screenoptions' );
// }
// add_action('admin_menu', 'woo_add_menu_in_admin');


// setting Page
// function woo_settingPage($value='')
// {
// 	require_once 'pages/settingpage.php';
// }



// add scripts and stylesheet into admin page
// if( isset($_GET['page']) ) {
// 	if($_GET['page']=='settingPage') {
// 		add_action('admin_enqueue_scripts', 'woo_admin_enqueue' );
// 	}
// }
// function woo_admin_enqueue() {
// 	// wp_register_script('woo_js', WOOURL . 'css', array(), '1.0' );
// 	wp_register_style('Woobootrap', WOOASSETS . 'css/ui-bootstrap.css', false, '1.0');
// }



endif;
?>

