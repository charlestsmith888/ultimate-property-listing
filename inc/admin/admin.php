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



// taxonomy Emirates
function cs_emirate() {

	$labels = array(
		'name'                  => _x( 'Location', 'Taxonomy Location', 'text-domain' ),
		'singular_name'         => _x( 'Location', 'Taxonomy Emirate', 'text-domain' ),
		'search_items'          => __( 'Search Location', 'text-domain' ),
		'popular_items'         => __( 'Popular Location', 'text-domain' ),
		'all_items'             => __( 'All Location', 'text-domain' ),
		'parent_item'           => __( 'Parent Emirate', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent Emirate', 'text-domain' ),
		'edit_item'             => __( 'Edit Emirate', 'text-domain' ),
		'update_item'           => __( 'Update Emirate', 'text-domain' ),
		'add_new_item'          => __( 'Add New Emirate', 'text-domain' ),
		'new_item_name'         => __( 'New Emirate Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove Location', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used Location', 'text-domain' ),
		'menu_name'             => __( 'Location', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'location', array( 'property' ), $args );
}

add_action( 'init', 'cs_emirate' );


// taxonomy Types
function cs_type() {

	$labels = array(
		'name'                  => _x( 'Types', 'Taxonomy Types', 'text-domain' ),
		'singular_name'         => _x( 'Type', 'Taxonomy Type', 'text-domain' ),
		'search_items'          => __( 'Search Types', 'text-domain' ),
		'popular_items'         => __( 'Popular Types', 'text-domain' ),
		'all_items'             => __( 'All Types', 'text-domain' ),
		'parent_item'           => __( 'Parent Type', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent Type', 'text-domain' ),
		'edit_item'             => __( 'Edit Type', 'text-domain' ),
		'update_item'           => __( 'Update Type', 'text-domain' ),
		'add_new_item'          => __( 'Add New Type', 'text-domain' ),
		'new_item_name'         => __( 'New Type Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove Types', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used Types', 'text-domain' ),
		'menu_name'             => __( 'Type', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'types', array( 'property' ), $args );
}

add_action( 'init', 'cs_type' );

// taxonomy Bedrooms
function cs_bedroom() {

	$labels = array(
		'name'                  => _x( 'Bedrooms', 'Taxonomy Bedrooms', 'text-domain' ),
		'singular_name'         => _x( 'Bedroom', 'Taxonomy Bedroom', 'text-domain' ),
		'search_items'          => __( 'Search Bedrooms', 'text-domain' ),
		'popular_items'         => __( 'Popular Bedrooms', 'text-domain' ),
		'all_items'             => __( 'All Bedrooms', 'text-domain' ),
		'parent_item'           => __( 'Parent Bedroom', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent Bedroom', 'text-domain' ),
		'edit_item'             => __( 'Edit Bedroom', 'text-domain' ),
		'update_item'           => __( 'Update Bedroom', 'text-domain' ),
		'add_new_item'          => __( 'Add New Bedroom', 'text-domain' ),
		'new_item_name'         => __( 'New Bedroom Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove Bedrooms', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used Bedrooms', 'text-domain' ),
		'menu_name'             => __( 'Bedroom', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'bedroom', array( 'property' ), $args );
}

add_action( 'init', 'cs_bedroom' );


// taxonomy developers
function cs_developer() {

	$labels = array(
		'name'                  => _x( 'developers', 'Taxonomy developers', 'text-domain' ),
		'singular_name'         => _x( 'developer', 'Taxonomy developer', 'text-domain' ),
		'search_items'          => __( 'Search developers', 'text-domain' ),
		'popular_items'         => __( 'Popular developers', 'text-domain' ),
		'all_items'             => __( 'All developers', 'text-domain' ),
		'parent_item'           => __( 'Parent developer', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent developer', 'text-domain' ),
		'edit_item'             => __( 'Edit developer', 'text-domain' ),
		'update_item'           => __( 'Update developer', 'text-domain' ),
		'add_new_item'          => __( 'Add New developer', 'text-domain' ),
		'new_item_name'         => __( 'New developer Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove developers', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used developers', 'text-domain' ),
		'menu_name'             => __( 'developer', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'developer', array( 'property' ), $args );
}

add_action( 'init', 'cs_developer' );



// taxonomy development
function cs_development() {

	$labels = array(
		'name'                  => _x( 'development', 'Taxonomy development', 'text-domain' ),
		'singular_name'         => _x( 'development', 'Taxonomy development', 'text-domain' ),
		'search_items'          => __( 'Search development', 'text-domain' ),
		'popular_items'         => __( 'Popular development', 'text-domain' ),
		'all_items'             => __( 'All development', 'text-domain' ),
		'parent_item'           => __( 'Parent development', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent development', 'text-domain' ),
		'edit_item'             => __( 'Edit development', 'text-domain' ),
		'update_item'           => __( 'Update development', 'text-domain' ),
		'add_new_item'          => __( 'Add New development', 'text-domain' ),
		'new_item_name'         => __( 'New development Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove development', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used development', 'text-domain' ),
		'menu_name'             => __( 'development', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'development', array( 'property' ), $args );
}

add_action( 'init', 'cs_development' );


// taxonomy completion
function cs_completion() {

	$labels = array(
		'name'                  => _x( 'completion', 'Taxonomy completion', 'text-domain' ),
		'singular_name'         => _x( 'completion', 'Taxonomy completion', 'text-domain' ),
		'search_items'          => __( 'Search completion', 'text-domain' ),
		'popular_items'         => __( 'Popular completion', 'text-domain' ),
		'all_items'             => __( 'All completion', 'text-domain' ),
		'parent_item'           => __( 'Parent completion', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent completion', 'text-domain' ),
		'edit_item'             => __( 'Edit completion', 'text-domain' ),
		'update_item'           => __( 'Update completion', 'text-domain' ),
		'add_new_item'          => __( 'Add New completion', 'text-domain' ),
		'new_item_name'         => __( 'New completion Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove completion', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used completion', 'text-domain' ),
		'menu_name'             => __( 'completion', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'completion', array( 'property' ), $args );
}

add_action( 'init', 'cs_completion' );


//add in function in function.php
function pagination($pages = '', $range = 4){  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
        if(1 != $pages)
     {
         // echo "<div class=\"pagination\">
         // <span>Page ".$paged." of ".$pages."</span>";         
         echo "<div class=\"pagination\">";
			previous_posts_link('Prev');
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
            next_posts_link('Next');
         echo "</div>\n";
     }
}


function pr($data = array()){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
function number_series($number){
	$ends = array('th','st','nd','rd','th','th','th','th','th','th');
	if (($number %100) >= 11 && ($number%100) <= 13)
		return $abbreviation = $number. 'th';
	else
		return $abbreviation = $number. $ends[$number % 10];
}
function ul_price($price){
	return ul_pro_get_option('ul_currency').' '.$price;
}




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
		register_setting( 'ul-pro-settings-group', 'columncontent' );
		register_setting( 'ul-pro-settings-group', 'ul_currency' );
	}
	
endif;	