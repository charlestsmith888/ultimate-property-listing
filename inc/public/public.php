<?php


// Single Page Template
function ul_pro_single_page($template){
	global $post;
	if ($post->post_type == 'property' ) {
		$template = ULPROURL. '/templates/single-property.php';
	}
	return $template;
}
add_filter('single_template', 'ul_pro_single_page');


// Custom tmeplate
add_filter( 'page_template', 'wpa3396_page_template' );
function wpa3396_page_template( $page_template ){
    if ( is_page( 'developers' ) ) {
        $page_template = ULPROURL. '/templates/page-developers.php';
    }
    if ( is_page( 'development' ) ) {
    	$page_template = ULPROURL. '/templates/page-development.php';
    }    
    if ( is_page( 'list-of-developer' ) ) {
    	$page_template = ULPROURL. '/templates/page-listofdevelopers.php';
    }    
    
    return $page_template;
}

// Custom search page
function ul_pro_template_chooser($template){
	global $wp_query;
	// echo $template;
	if( $wp_query->is_search == '1' && $wp_query->query['post_type'] == 'property'){
		return $template = ULPROURL. '/templates/search-archive.php';
	}
	if (is_tax('development')) {
		$template = ULPROURL. '/templates/custom-archive-development.php';
	}
	if (is_tax('developer')) {
		$template = ULPROURL. '/templates/custom-archive-developers.php';
	}
	if (is_tax('completion')) {
		$template = ULPROURL. '/templates/developer-archive.php';
	}	
	if (is_tax('types')) {
		$template = ULPROURL. '/templates/developer-archive.php';
	}	
	if (is_tax('bedroom')) {
		$template = ULPROURL. '/templates/developer-archive.php';
	}	
	if (is_tax('location')) {
		$template = ULPROURL. '/templates/developer-archive.php';
	}	
	if (is_post_type_archive('property')) {
		$template = ULPROURL. '/templates/developer-archive.php';
	}
	if (is_tax('property-category')) {
		$template = ULPROURL. '/templates/developer-archive.php';
	}	
	return $template;
}
add_filter('template_include', 'ul_pro_template_chooser');




	/**
	* Enqueue scripts
	*
	* @param string $handle Script name
	* @param string $src Script url
	* @param array $deps (optional) Array of script names on which this script depends
	* @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
* @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
*/
function ul_pro_stylesheets_for_public(){
	echo '	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">';
	wp_enqueue_style( 'custom_bootstrap', ULPROASSETS.'css/ui-bootstrap.css', 100);
}
add_action( 'wp_head', 'ul_pro_stylesheets_for_public', 10 );


function ul_pro_theme_name_scripts() {
	/*echo '<script src="https://maps.googleapis.com/maps/api/js?key='.trim(ul_pro_get_option('googleapi')).'&libraries=places"></script>';
	wp_enqueue_script( 'api1', ULPROASSETS.'/vendor/geolocation/jquery.geocomplete.js', array( 'jquery' ), '1.1', true);
	wp_enqueue_script( 'api2', ULPROASSETS.'/vendor/geolocation/logger1.js', array( 'jquery' ), '1.1', true);*/
}
add_action( 'wp_enqueue_scripts', 'ul_pro_theme_name_scripts' );

