<?php 
<<<<<<< HEAD
=======

>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
/**
 * Shortcodes 
 */
class Pro_shortcodes{
	function __construct(){
<<<<<<< HEAD
		// single page shortcodes
		add_shortcode( 'installments_shortcode', array($this, 'installments_shortcode' ) );
		add_shortcode( 'details_table_shotcode', array($this, 'details_table_shotcode' ) );

		// Listing shortcodes
		add_shortcode( 'ul_search_project', array($this, 'ul_search_project' ) );
		add_shortcode( 'ul_latest_property', array($this, 'ul_latest_property' ) );
		add_shortcode( 'ul_coming_soon_property', array($this, 'ul_coming_soon_property' ) );
		add_shortcode( 'ul_featured_property', array($this, 'ul_featured_property' ) );
		add_shortcode( 'ul_featured_development_property', array($this, 'ul_featured_development_property' ) );
		add_shortcode( 'ul_featured_developers', array($this, 'ul_featured_developers' ) );

=======
		add_shortcode( 'installments_shortcode', array($this, 'installments_shortcode' ) );
		add_shortcode( 'details_table_shotcode', array($this, 'details_table_shotcode' ) );
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
	}

	function installments_shortcode( $atts = array(), $content = '' ) {
		$atts = shortcode_atts( array(
<<<<<<< HEAD
		'title' => 'Payment Plan',
		), $atts, 'shortcode-id' );

		global $ul_fields, $post;
		$pro_payment_schedule = get_post_meta( $post->ID, 'pro_payment_schedule', true);
		$pro_payment_schedule = json_decode( $pro_payment_schedule);
		$content = '
		<div class="clearfix"></div>
		<div class="table-area">
			<h3 class="payment">'.$atts['title'].'</h3>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
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
						<td class="price-color">';
						if ($ul_fields->price_section_get_meta( 'cs_price' )) {
							$content .= ul_price($ul_fields->price_section_get_meta( 'cs_price' ));
						} else {
							$content .= '<a class="askPrice btn-modal" data-toggleModal="myModal4" href="javascript:;">Ask for Price</a>';
						}
						
						$content .= '</td>
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
							$content .= '<a href="'.site_url('/bedroom/'.$key1->slug).'">'.$key1->name.'</a> ';
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
							$content .= '<a href="'.site_url('/completion/'.$key->slug).'">'.$key->name.'</a> ';
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


	// for latest property 
	public function ul_latest_property($atts = array(), $content = ''){
			global $post, $ul_fields;
			shortcode_atts( array(
			'column' => '2',
			'count' => '2'
			), $atts);
			$args = array(
			'post_type'   => 'property',
			'post_status' => 'publish',
			'order' => 'DESC',
			'posts_per_page' => $atts['count']
			);
			if ($atts['column'] == 2) {
			$content ='<ul class="width-50">';
			}
			else{
			$content ='<ul class="width-33">';
				}
				$list_item = new WP_Query( $args );
				if($list_item->have_posts() ) :
				while( $list_item->have_posts() ) :
				$list_item->the_post();
				$location = wp_get_post_terms( $post->ID, 'location');
				$developer = wp_get_post_terms( $post->ID, 'developer');
				$is_sold = get_post_meta( $post->ID, 'is_sold_field');
				$content .= '<li id="post-'.get_the_ID().'">
					<a href="'.get_the_permalink().'">
						<div class="img-gradient">
							<img src="'.wp_get_attachment_url(get_post_thumbnail_id($post->ID)).'" alt="">
						</div>
						<div class="homebig-offers">
							<h3>'.get_the_title().'</h3>
							<div class="clearfix"></div>';
							if ($location):
							foreach ($location as $locationkey1):
							$content .= '<h5>'.$locationkey1->name.'</h5>';
							endforeach;
							endif;
							$content .= '<div class="clearfix"></div>
							<h4>Luxury Apartments with 2 Years Payment Plan</h4>
							<div class="clearfix"></div>
						<h4>Stunning Views of The Golf Course</h4></div>
						<div class="project-price">';
							if($is_sold){
							$content .= '<label class="sold">Sold</label>';
							}
							$content.= '<div class="meta-label">Starting From:</div>'.ul_price($ul_fields->price_section_get_meta( 'cs_price' )).'</div>
							<h6 class="project-comp">'.$developer[0]->name.'</h6>
						</a>
					</li>
					';
					endwhile;
					else :
					endif;
					$content .= '</ul><div class="clearfix"></div>';
					return $content;
	}


		// for featured property
		public function ul_featured_property($atts = array(), $content = ''){
			global $post, $ul_fields;
			$atts = shortcode_atts( array(
				'column' => '2',
				'count' => '2'
			), $atts);
			$args = array(
				'post_type'   => 'property',
				'post_status' => 'publish',
				'order' => 'DESC',
				'posts_per_page' => $atts['count']
			);
			$args['meta_query'] = array(
				array(
					'key' => 'is_featured_field',
					'value' => 1,
				)
			);
			if ($atts['column'] == 2) {
				$content ='<ul class="width-50">';
			}
			else{
				$content ='<ul class="width-33">';
			}
			$list_item = new WP_Query( $args );
			if($list_item->have_posts() ) :
				while( $list_item->have_posts() ) :
					$list_item->the_post();
					$location = wp_get_post_terms( $post->ID, 'location');
					$developer = wp_get_post_terms( $post->ID, 'developer');
					$is_sold = get_post_meta( $post->ID, 'is_sold_field');
					$content .= '<li id="post-'.get_the_ID().'">
					<a href="'.get_the_permalink().'">
					<div class="img-gradient">
					<img src="'.wp_get_attachment_url(get_post_thumbnail_id($post->ID)).'" alt="">
					</div>
					<div class="homebig-offers">
					<h3>'.get_the_title().'</h3>
					<div class="clearfix"></div>';
					if ($location):
						foreach ($location as $locationkey1):
							$content .= '<h5>'.$locationkey1->name.'</h5>';
						endforeach;
					endif;
					$content .= '<div class="clearfix"></div>
					<h4>Luxury Apartments with 2 Years Payment Plan</h4>
					<div class="clearfix"></div>
					<h4>Stunning Views of The Golf Course</h4></div>
					<div class="project-price">';
					if($is_sold){
						$content .= '<label class="sold">Sold</label>';
					}
					$content .='<div class="meta-label">Starting From:</div>'.ul_price($ul_fields->price_section_get_meta( 'cs_price' )).'</div>
					<h6 class="project-comp">'.$developer[0]->name.'</h6>
					</a>
					</li>
					';
				endwhile;
			else :
			endif;
			$content .= '</ul><div class="clearfix"></div>';
			return $content;
		}


		// for featured development
		public function ul_featured_development_property($atts = array(), $content = ''){
		global $post, $ul_fields;
		$atts = shortcode_atts( array(
		'column' => '2',
		'count' => '2'
		), $atts);
		$terms = get_terms( 'development' );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		$content ='<ul class="all-cities grid">';
			foreach ( $terms as $term ) {
			$featured_developer = get_term_meta( $term->term_id, 'featured_developer', true );
			$image_id = get_term_meta( $term->term_id, 'developer_image_id', true );
			$thumbnail_url = wp_get_attachment_image_src($image_id,'full', true);;
			$thumbnail_url = $thumbnail_url[0];
			$content .= '
			<li class="city-location  grid-item">
				<a href="'.get_term_link( $term ).'">
					<div class="city-content-wrapper">
						<div class="photo-overflow-wrapper">
							<div class="city-image">
								';
								
								if($image_id) {
								$content .= '
								<img width="500" height="356" src="'.$thumbnail_url.'" class="attachment-medium500 size-medium500" sizes="(max-width: 500px) 100vw, 500px">
								';
								}
								$content .= '
							</div>
						</div>
						<div class="city-info">
							<div class="city-info-wrapper">
								<h3 class="city-name">
								<span>Properties for sale in </span>'.$term->name.'</h3>
								<div class="total-count">
									<div class="count-projects"><span class="count-number">'.$term->count.'</span> projects
								</div>
							</div>
						</div>
					</div>
				</div>
			</a>
		</li>
		';
		}
		$content .='</ul>';
		}
		return $content;
		}

	// for coming soon property
		public function ul_coming_soon_property($atts = array(), $content = ''){
			global $post, $ul_fields;
			$atts = shortcode_atts( array(
				'column' => '2',
				'count' => '2'
			), $atts);
			$args = array(
				'post_type'   => 'property',
				'completion' => 'coming-soon',
				'post_status' => 'publish',
				'order' => 'DESC',
				'posts_per_page' => $atts['count']
			);
			if ($atts['column'] == 2) {
				$content ='<ul class="width-50 diff-box">';
			}
			else{
				$content ='<ul class="width-33  diff-box">';
			}
			$list_item = new WP_Query( $args );
			if($list_item->have_posts() ) :
				while( $list_item->have_posts() ) :
					$list_item->the_post();
					$location = wp_get_post_terms( $post->ID, 'location');
					$developer = wp_get_post_terms( $post->ID, 'developer');
					$is_sold = get_post_meta( $post->ID, 'is_sold_field');
					$content .= '<li id="post-'.get_the_ID().'">
					<a href="'.get_the_permalink().'">
					<div class="img-gradient">
					<img src="'.wp_get_attachment_url(get_post_thumbnail_id($post->ID)).'" alt="">
					</div>
					<div class="homebig-offers">
					<h3>'.get_the_title().'</h3>
					<div class="clearfix"></div>';
					if ($location):
						foreach ($location as $locationkey1):
							$content .= '<h5>'.$locationkey1->name.'</h5>';
						endforeach;
					endif;
					$content .= '<div class="clearfix"></div>
					<h4>Luxury Apartments with 2 Years Payment Plan</h4>
					<div class="clearfix"></div>
					<h4>Stunning Views of The Golf Course</h4></div>
					<div class="project-price">';
					if($is_sold){
						$content .= '<label class="sold">Sold</label>';
					}
					$content .='<div class="meta-label">Starting From:</div>'.ul_price($ul_fields->price_section_get_meta( 'cs_price' )).'</div>
					<h6 class="project-comp">'.$developer[0]->name.'</h6>
					</a>
					</li>
					';
				endwhile;
			else :
			endif;
			$content .= '</ul><div class="clearfix"></div>';
			return $content;
		}


		// for featured developers
		public function ul_featured_developers($atts = array(), $content = ''){
			global $post, $ul_fields;
			$atts = shortcode_atts( array(
				'column' => '2',
				'count' => '2'
			), $atts);
			$terms = get_terms( 'developer' );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
				$content ='<ul class="featured-developers">';
				foreach ( $terms as $term ) {
					$featured_developer = get_term_meta( $term->term_id, 'featured_developer', true );
					$image_id = get_term_meta( $term->term_id, 'developer_image_id', true );
					$thumbnail_url = wp_get_attachment_image_src($image_id);
					$thumbnail_url = $thumbnail_url[0];
					if (!empty($featured_developer)) {
						if($image_id) {
							$content .= '<li><a href="'.get_term_link( $term ).'"><img src="'.$thumbnail_url.'"/></a></li>';
						}
					}
				}
				$content .='</ul>';
			}
			return $content;
		}

		// homepage search
		public function ul_search_project(){
			$content = '
			<div class="hdr-frm">
			<form>
			<div class="col span_12">
			<div class="col span_6">
			<input type="text" name="s" placeholder="Project name , Development name, Developer name" autocomplete="on">
			</div>
			<div class="col span_6">
			<input type="submit" value="Search">
			</div>
			</div>
			<input type="hidden" name="post_type" value="property">
			</form>
			</div>
			';
			return $content;
		}



=======
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
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
}




<<<<<<< HEAD
new Pro_shortcodes();


=======
}
new Pro_shortcodes();



>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
