<?php 

/**
 * Shortcodes 
 */
class Pro_shortcodes{
	function __construct(){
		add_shortcode( 'installments_shortcode', array($this, 'installments_shortcode' ) );
		add_shortcode( 'details_table_shotcode', array($this, 'details_table_shotcode' ) );
	}

	function installments_shortcode( $atts = array(), $content = '' ) {
		$atts = shortcode_atts( array(
			'title' => 'Payment Plan',
		), $atts, 'shortcode-id' );

		global $ul_fields, $post; 
		$pro_payment_schedule = get_post_meta( $post->ID, 'pro_payment_schedule', true);
		$pro_payment_schedule = json_decode( $pro_payment_schedule);

		$content = '
		<div class="clearfix"></div>
		<div class="table-area">
		<h3>'.$atts['title'].'</h3>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
		<tr>
		<td colspan="3"><span>New Payment Plan (4 Years From Sale Date)</span></td>
		</tr>
		<tr>
		<td><strong>Installment</strong></td>
		<td><strong>Milestone</strong></td>
		<td><strong>Payment (%)</strong></td>
		</tr>
		';
		if ($pro_payment_schedule):
			$i = 1; foreach ($pro_payment_schedule as $key):
			$content .= '
			<tr>
			<td>'.number_series($i).' Installment</td>
			<td>'.$key[0].'</td>
			<td>'.$key[1].'</td>
			</tr>
			';
			$i++;
		endforeach;
	endif;
	$content .= '
	</tbody>
	</table>
	</div>';
	return $content;
}


function details_table_shotcode( $atts = array(), $content = '' ){
	$atts = shortcode_atts( array(
		'title' => 'Payment Plan',
	), $atts, 'shortcode-id' );
	global $ul_fields, $post;

	$completion = wp_get_post_terms( $post->ID, 'completion');
	$types = wp_get_post_terms( $post->ID, 'types');
	$location = wp_get_post_terms( $post->ID, 'location');
	$bedroom = wp_get_post_terms( $post->ID, 'bedroom');
	$developer = wp_get_post_terms( $post->ID, 'developer');


	$image_id = get_term_meta( $developer[0]->term_id, 'developer_image_id', true );

	$developer_phone = get_term_meta( $developer[0]->term_id, 'developer_phone', true );
	$developer_email = get_term_meta( $developer[0]->term_id, 'developer_email', true );
	$developer_Whatsapp = get_term_meta( $developer[0]->term_id, 'developer_Whatsapp', true );

	$content = '';
	$content .= '
	<div class="project-metas">
	<table class="project-table">
	<tbody>
	<tr class="meta-property-price">
	<th>Starting Price</th>
	<td class="price-color">'.ul_price($ul_fields->price_section_get_meta( 'cs_price' )).'</td>
	</tr>
	<tr class="meta-property-sqft">
	<th>Price Per Sqft from</th>
	<td>'.ul_price($ul_fields->price_section_get_meta( 'Price_Per_Sqft' )).'</td>
	</tr>
	<tr class="meta-property-area">
	<th>Area from</th>
	<td>'.$ul_fields->price_section_get_meta( 'Area_from' ).'</td>
	</tr>
	<tr class="meta-property-type">
	<th>Type</th>
	<td class="project-typess">';

	if ($types):
		foreach ($types as $typeskey):
			$content .= '<a href="'.site_url('/types/'.$typeskey->slug).'">'.$typeskey->name.'</a>';
		endforeach;
	endif;
	$content .= '</td>
	</tr>
	<tr class="meta-property-units">
	<th class="table-beds-h">Bedrooms</th>
	<td class="table-beds">';
	if ($bedroom):
		foreach ($bedroom as $key1):

			$content .= '<a href="'.site_url('/bedroom/'.$key1->slug).'">'.$key1->name.'</a>';

		endforeach;
	endif;
	
	$content .= '</td>
	</tr>
	<tr class="meta-property-location">
	<th>Location</th>
	<td>';
	
	if ($location):
		foreach ($location as $locationkey1):
			$content .= '<a href="'.site_url('/location/'.$locationkey1->slug).'">'.$locationkey1->name.'</a>';
		endforeach;
	endif;
	$content .= '</td>
	</tr>
	<tr class="meta-property-developer">
	<th>Developer</th>
	<td><a href="'.site_url('/developer/'.$developer[0]->slug).'">'.$developer[0]->name.'</a></td>
	</tr>
	<tr class="meta-property-count">
	<th>Developer Projects</th>
	<td><a href="'.site_url('/developer/'.$developer[0]->slug).'">'.$developer[0]->count.'</a></td>
	</tr>
	<tr class="meta-property-completion">
	<th>Est. Completion</th>
	<td>';
	if ($completion):
		foreach ($completion as $key):
			$content .= '<a href="'.site_url('/completion/'.$key->slug).'">'.$key->name.'</a>';
		endforeach;
	endif;

	$content .= '</td>
	</tr>
	<tr class="meta-property-views">
	<th>Views</th>
	<td>153</td>
	</tr>
	</tbody>
	</table>
	</div>
	';
	return $content;
}




}
new Pro_shortcodes();



