<?php 

// Set image thumb
// add_filter( 'intermediate_image_sizes_advanced','woo_set_thumbnail_size_by_post_type', 10);
// function woo_set_thumbnail_size_by_post_type( $sizes ) {
//     $post_type = get_post_type($_REQUEST['post_id']);
//     switch ($post_type) :
//         case 'product' :
//             $sizes['woothumb'] = array( 
//                 'width' => 150,
//                 'height' => 90,
//                 'crop' => true
//             );    
//         break;
//     endswitch;
//     return $sizes;
// }



/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
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
		<input style="width: 100%;" type="text" name="custom_fields_address" id="custom_fields_address" value="<?php echo ul_pro_get_meta_field( 'custom_fields_address' ); ?>">
	</p>	
	<p>
		<label for="custom_fields_price"><?php _e( 'Price', 'custom_fields' ); ?></label><br>
		<input style="width: 100%;" type="text" name="custom_fields_price" id="custom_fields_price" value="<?php echo ul_pro_get_meta_field( 'custom_fields_price' ); ?>">
	</p><?php
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



// Add Shortcode
function ul_pro_propertylisting( $atts ) {
// Attributes
	$atts = shortcode_atts(
		array(
			'posttype' => 'property',
			'postcount' => 6,
			),
		$atts
		);
	$q = new WP_Query(
		array('post_type' => array($atts['posttype']),
			'post_status' => array('publish'),
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => $atts['postcount'],
			)
		);

	$ul_prop_content = '
	<div id="wooclass">
		<div class="row">';
			while ($q->have_posts()) : $q->the_post();
			$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium_large', true);
			$ul_prop_content .='
			<div class="col-md-3">
				<img data-shadow="none" data-shadow-direction="middle" class="img-with-animation  animated-in" data-delay="0" height="201" width="359" data-animation="fade-in" src="'.$thumbnail[0].'" alt="" style="opacity: 1;">
				<h2>'.get_the_title().'</h2>
				<p>'.ul_pro_get_meta_field( 'custom_fields_address' ).'</p>
				<h3>'.ul_pro_get_meta_field( 'custom_fields_price' ).'</h3>
				<a href="'.get_the_permalink().'">Read More</a>
			</div>
			';
			endwhile;
			$ul_prop_content .= '
		</div>
	</div>
	';
	return $ul_prop_content;

}
add_shortcode( 'ultimate-property', 'ul_pro_propertylisting' );


function func_name( $atts ) {
	$atts = shortcode_atts( array(
		'default' => 'values'
	), $atts );

	$content = '
	<div>
		<h3>Search property</h3>
		<form role="search" action="'.site_url('/').'" method="get">
			<input type="text" name="s" placeholder="Search property"/>
			<input type="text" name="price" placeholder="price"/>
			<input type="text" name="address" placeholder="address"/>
			<input type="hidden" name="post_type" value="property" />
			<input type="submit" alt="Search" value="Search" />
		</form>
	</div>
	';
	return $content;
}
add_shortcode( 'ultimate-property-search','func_name' );















// if (has_post_thumbnail()):   $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
//     else:
//     endif


// Single Page Template
function ul_pro_single_page($template)
{
	global $wp_query, $post;
	if ( !$single && $post->post_type == 'property' ) {
		$template = dirname(__FILE__) . '/single-property.php';
	}
	return $template;
}
add_filter('single_template', 'ul_pro_single_page');

// Custom search page
function template_chooser($template)
{
	global $wp_query;
	if( $wp_query->is_search == '1' && $wp_query->query['post_type'] == 'property')
	{
		$template = dirname(__FILE__) . '/search-archive.php';
	}
	return $template;
}
add_filter('template_include', 'template_chooser');


function ul_pro_pagination($pages = '', $range = 4)
{  
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


/**
* Enqueue scripts
*
* @param string $handle Script name
* @param string $src Script url
* @param array $deps (optional) Array of script names on which this script depends
* @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
* @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
*/
function ul_pro_stylesheets_for_public()
{
	wp_enqueue_style( 'custom_bootstrap', WOOASSETS . 'css/ui-bootstrap.css', 100);
}
add_action( 'wp_head', 'ul_pro_stylesheets_for_public', 10 );
?>