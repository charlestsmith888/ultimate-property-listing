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

// Single Page Template
function ul_pro_single_page($template)
{
	global $post;
	if ($post->post_type == 'property' ) {
		$template = dirname(__FILE__) . '/single-property.php';
	}
	return $template;
}
add_filter('single_template', 'ul_pro_single_page');

// Custom search page
function ul_pro_template_chooser($template)
{
	global $wp_query;
	if( $wp_query->is_search == '1' && $wp_query->query['post_type'] == 'property')
	{
		$template = dirname(__FILE__) . '/search-archive.php';
	}
	return $template;
}
add_filter('template_include', 'ul_pro_template_chooser');



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
	wp_enqueue_style( 'custom_bootstrap', ULPROASSETS.'css/ui-bootstrap.css', 100);
}
add_action( 'wp_head', 'ul_pro_stylesheets_for_public', 10 );


function ul_pro_theme_name_scripts() {
	echo '<script src="https://maps.googleapis.com/maps/api/js?key='.trim(ul_pro_get_option('googleapi')).'&libraries=places"></script>';
	wp_enqueue_script( 'api1', ULPROASSETS.'/vendor/geolocation/jquery.geocomplete.js', array( 'jquery' ), '1.1', true);
	wp_enqueue_script( 'api2', ULPROASSETS.'/vendor/geolocation/logger1.js', array( 'jquery' ), '1.1', true);
}
add_action( 'wp_enqueue_scripts', 'ul_pro_theme_name_scripts' );

