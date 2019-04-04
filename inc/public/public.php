<?php
// Add Shortcode
function ul_pro_propertylisting( $atts ) {
// Attributes
	$atts = shortcode_atts(
		array(
			'posttype' => 'property',
			'category' => '',
			'postcount' => 6,
			),
		$atts
		);
	$q = new WP_Query(
		array('post_type' => array($atts['posttype']),
			'post_status' => array('publish'),
			'orderby' => 'date',
			'order' => 'DESC',
			'property-category' => $atts['category'],
			'posts_per_page' => $atts['postcount'],
			)
		);

		$inicontent = ul_pro_get_option('columncontent');

		$ul_prop_content = '
		<div id="wooclass">
			<div class="row">';
				while ($q->have_posts()) : $q->the_post();
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium_large', true);
				$contreplace = array(
					'{$img}'  	=> $thumbnail[0],
					'{$title}'  => get_the_title(),
					'{$address}'=> ul_pro_get_meta_field( 'custom_fields_address' ),
					'{$price}' 	=> ul_pro_get_meta_field( 'custom_fields_price' ),
					'{$link}' 	=> get_the_permalink(),
					);
				$ul_prop_content .=strtr($inicontent, $contreplace);
				endwhile;
				$ul_prop_content .= '
			</div>
		</div>
		';
	return $ul_prop_content;
}
add_shortcode( 'ultimate-property', 'ul_pro_propertylisting' );


function ul_pro_func_name( $atts ) {
	$atts = shortcode_atts( array(
		'default' => 'values'
		), $atts );
	$content = '
	<div class="ul-pro-search" id="wooclass">
		<form role="search" action="'.site_url('/').'" method="get">
			<label for="s">Search Property</label>
			<input type="text" name="s" placeholder="Search property"/>
			<label for="price">Price</label>
			<input type="text" name="price" placeholder="price"/>
			<label for="custom_fields_address">Address</label>
			<input type="text" id="custom_fields_address" name="address" placeholder="address"/>
			<input type="hidden" name="post_type" value="property" />
			<input type="submit" alt="Search" value="Search" />
		</form>
	</div>
	';
	return $content;
}
add_shortcode( 'ultimate-property-search','ul_pro_func_name' );



function cs_search_form_homepage() {



$emirates = get_terms('emirates', array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));
$types = get_terms('types', array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));
$developer = get_terms('developer', array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));
$development = get_terms('development', array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));
$completion = get_terms('completion', array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));



$content = '<div class="row form_1"><form class="form-inline" id="searchPropertyForm" role="search" method="get" action="'.site_url('/').'">


<div class="col span_4"><select name="uae_state" class="js-select" id="uae_state">
	<option value="">Select Emirate</option>';
	foreach ($emirates as $pterm):
	$content .= '<option value="'.$pterm->slug.'">'.$pterm->name.'</option>';
	endforeach;
$content .= '</select></div>	';




$content .= '
<div class="col span_4">
<select name="property_type" class="js-select"><option value="">Property Type</option>';
foreach ($types as $typespterm):
$content .= '<option value="'.$typespterm->slug.'">'.$typespterm->name.'</option>';
endforeach;
$content .= '</select></div>';



// $content .= '
// <div class="col span_3"><select name="search_min_price" class="js-select">
// 	<option value="">Min price (AED)</option>
// 	<option value="300000">200,000</option><option value="300000">300,000</option><option value="400000">400,000</option><option value="500000">500,000</option><option value="600000">600,000</option><option value="700000">700,000</option><option value="800000">800,000</option><option value="900000">900,000</option><option value="1000000">1,000,000</option><option value="1200000">1,200,000</option><option value="1500000">1,500,000</option><option value="2000000">2,000,000</option><option value="3000000">3,000,000</option><option value="4000000">4,000,000</option><option value="5000000">5,000,000</option><option value="6000000">6,000,000</option><option value="7000000">7,000,000</option><option value="8000000">8,000,000</option><option value="9000000">9,000,000</option><option value="10000000">10,000,000</option><option value="11000000">11,000,000</option><option value="12000000">12,000,000</option><option value="15000000">15,000,000</option><option value="20000000">20,000,000</option><option value="30000000">30,000,000</option><option value="40000000">40,000,000</option><option value="50000000">50,000,000</option>
// </select></div>';



// $content .= '
// <div class="col span_3"><select name="search_max_price" class="js-select"><option value="">Max price (AED)</option><option value="300000">300,000</option><option value="400000">400,000</option><option value="500000">500,000</option><option value="600000">600,000</option><option value="700000">700,000</option><option value="800000">800,000</option><option value="900000">900,000</option><option value="1000000">1,000,000</option><option value="1200000">1,200,000</option><option value="1500000">1,500,000</option><option value="2000000">2,000,000</option><option value="3000000">3,000,000</option><option value="4000000">4,000,000</option><option value="5000000">5,000,000</option><option value="6000000">6,000,000</option><option value="7000000">7,000,000</option><option value="8000000">8,000,000</option><option value="9000000">9,000,000</option><option value="10000000">10,000,000</option><option value="11000000">11,000,000</option><option value="12000000">12,000,000</option><option value="15000000">15,000,000</option><option value="20000000">20,000,000</option><option value="30000000">30,000,000</option><option value="40000000">40,000,000</option><option value="50000000">50,000,000</option><option value="60000000">60,000,000</option><option value="70000000">70,000,000</option><option value="80000000">80,000,000</option><option value="90000000">90,000,000</option><option value="100000000">100,000,000</option><option value="110000000">110,000,000</option><option value="120000000">120,000,000</option><option value="130000000">130,000,000</option>
// </select></div>';




// $content .= '<div class="col span_3"><select name="search_developers" class="js-select" id="searchbar_developer"><option value="">Select Developer</option>';
// foreach ($developer as $developerterm):
// $content .= '<option value="'.$developerterm->slug.'">'.$developerterm->name.'</option>';
// endforeach;
// $content .= '</select></div>';


$content .= '<div class="col span_4"><select name="search_developments" class="js-select" id="searchbar_development"><option value="">Select Development</option>';
foreach ($development as $developmentterm):
$content .= '<option value="'.$developmentterm->slug.'">'.$developmentterm->name.'</option>';
endforeach;
$content .= '</select></div>';




$content .= '<div class="col span_4"><select name="search_handover" class="js-select"><option value="0">Completion</option>';
foreach ($completion as $completionterm):
$content .= '<option value="'.$completionterm->slug.'">'.$completionterm->name.'</option>';
endforeach;
$content .= '</select></div>';



$content .= '<div class="col span_4"><input type="text" name="s" placeholder="Keyword" autocomplete="on"></div>
<div class="col span_4"><button type="submit" id="searchPropertySubmit" class="btn btn-green">Search</button></div>
<input type="hidden" name="post_type" value="property">
</form></div>';

return $content;

}
add_shortcode( 'searchform_homepage', 'cs_search_form_homepage' );



// Single Page Template
function ul_pro_single_page($template)
{
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
    return $page_template;
}

// Custom search page
function ul_pro_template_chooser($template){
	global $wp_query;
	if( $wp_query->is_search == '1' && $wp_query->query['post_type'] == 'property'){
		$template = ULPROURL. '/templates/search-archive.php';
	}
	if (is_tax('developer')) {
		$template = ULPROURL. '/templates/developer-archive.php';
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

	return $template;
}
add_filter('template_include', 'ul_pro_template_chooser');



function ul_pro_pagination($pages = '', $range = 4){
	$showitems = ($range * 2)+1;
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	}
	if(1 != $pages){
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
function ul_pro_stylesheets_for_public(){
	echo '	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">';
	wp_enqueue_style( 'custom_bootstrap', ULPROASSETS.'css/ui-bootstrap.css', 100);
}
add_action( 'wp_head', 'ul_pro_stylesheets_for_public', 10 );


function ul_pro_theme_name_scripts() {
	echo '<script src="https://maps.googleapis.com/maps/api/js?key='.trim(ul_pro_get_option('googleapi')).'&libraries=places"></script>';
	wp_enqueue_script( 'api1', ULPROASSETS.'/vendor/geolocation/jquery.geocomplete.js', array( 'jquery' ), '1.1', true);
	wp_enqueue_script( 'api2', ULPROASSETS.'/vendor/geolocation/logger1.js', array( 'jquery' ), '1.1', true);
}
add_action( 'wp_enqueue_scripts', 'ul_pro_theme_name_scripts' );

