<?php
function property() {
	$labels = array(
		'name'                => __( 'Properties', 'text-domain' ),
		'singular_name'       => __( 'Property', 'text-domain' ),
		'add_new'             => _x( 'Add New Property', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Property', 'text-domain' ),
		'edit_item'           => __( 'Edit Property', 'text-domain' ),
		'new_item'            => __( 'New Property', 'text-domain' ),
		'view_item'           => __( 'View Property', 'text-domain' ),
		'search_items'        => __( 'Search Properties', 'text-domain' ),
		'not_found'           => __( 'No Properties found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Properties found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Property:', 'text-domain' ),
		'menu_name'           => __( 'Properties', 'text-domain' ),
		);
	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'author', 'thumbnail',
			'excerpt',
			)
		);
	register_post_type( 'property', $args );
}
add_action( 'init', 'property' );

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function UL_taxonomy() {

	$labels = array(
		'name'                  => _x( 'Categories', 'Taxonomy Categories', 'text-domain' ),
		'singular_name'         => _x( 'Category', 'Taxonomy Category', 'text-domain' ),
		'search_items'          => __( 'Search Categories', 'text-domain' ),
		'popular_items'         => __( 'Popular Categories', 'text-domain' ),
		'all_items'             => __( 'All Categories', 'text-domain' ),
		'parent_item'           => __( 'Parent Category', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent Category', 'text-domain' ),
		'edit_item'             => __( 'Edit Category', 'text-domain' ),
		'update_item'           => __( 'Update Category', 'text-domain' ),
		'add_new_item'          => __( 'Add New Category', 'text-domain' ),
		'new_item_name'         => __( 'New Category Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove Categories', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used Categories', 'text-domain' ),
		'menu_name'             => __( 'Category', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'property-category', array( 'property' ), $args );
}

add_action( 'init', 'UL_taxonomy' );

// Custom fields
function ul_pro_get_meta_field( $value ) {
	global $post;
	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}
function ul_pro_custom_fields_add_meta_box() {
	add_meta_box(
		'custom_fields-custom-fields',
		__( 'Custom Fields', 'custom_fields' ),
		'ul_pro_custom_fields_html',
		'property',
		'advanced',
		'high'
		);
}
add_action( 'add_meta_boxes', 'ul_pro_custom_fields_add_meta_box' );
function ul_pro_custom_fields_html( $post) {
	wp_nonce_field( '_custom_fields_nonce', 'custom_fields_nonce' ); ?>
	<p>
		<label for="custom_fields_address"><?php _e( 'Address', 'custom_fields' ); ?></label><br>
		<input style="width: 100%;" type="text" name="custom_fields_address" size="90"  id="custom_fields_address" value="<?php echo ul_pro_get_meta_field( 'custom_fields_address' ); ?>">
	</p>
	<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo trim(ul_pro_get_option('googleapi')); ?>&libraries=places"></script>
	<!-- <script src="<?php //echo ULPROASSETS; ?>/vendor/geolocation/jquery.min.js"></script> -->
	<script src="<?php echo ULPROASSETS; ?>/vendor/geolocation/jquery.geocomplete.js?ver=4.8.1"></script>
	<script src="<?php echo ULPROASSETS; ?>/vendor/geolocation/logger1.js?ver=4.8.1"></script>
	<p>
		<label for="custom_fields_price"><?php _e( 'Price', 'custom_fields' ); ?></label><br>
		<input style="width: 100%;" type="text" name="custom_fields_price" id="custom_fields_price" value="<?php echo ul_pro_get_meta_field( 'custom_fields_price' ); ?>">
	</p>
	<?php
}
function ul_pro_custom_fields_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['custom_fields_nonce'] ) || ! wp_verify_nonce( $_POST['custom_fields_nonce'], '_custom_fields_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_POST['custom_fields_address'] ) )
		update_post_meta( $post_id, 'custom_fields_address', esc_attr( $_POST['custom_fields_address'] ) );
	if ( isset( $_POST['custom_fields_price'] ) )
		update_post_meta( $post_id, 'custom_fields_price', esc_attr( $_POST['custom_fields_price'] ) );
}
add_action( 'save_post', 'ul_pro_custom_fields_save' );
/*
Usage: ul_pro_get_meta_field( 'custom_fields_address' )
Usage: ul_pro_get_meta_field( 'custom_fields_price' )
*/

















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
		register_setting( 'ul-pro-settings-group', 'googleapi' );
		// register_setting( 'ul-pro-settings-group', 'text-count' );
		// register_setting( 'ul-pro-settings-group', 'productcolm' );
		register_setting( 'ul-pro-settings-group', 'columncontent' );
	}
	
endif;	