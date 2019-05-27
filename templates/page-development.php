<?php get_header(); 
global $wpdb;
?>

<div class="main-contents  diff">
	<?php 
	if(have_posts()) : 
		while(have_posts()) : the_post();
			the_content();
		endwhile; 
	endif;
	?>
</div>





<div class="main-contents development-mainn">
<?php  $development = get_terms('development'); 

// echo "<pre>";
// print_r($development);
// echo "</pre>";	


?>

<table id="tablesort" class="hideContent">
	<thead>
		<tr>
			<th class="sitemap-development-name header">Developments</th>
			<th class="sitemap-development-price header">Min Price</th>
			<th class="sitemap-development-count header">Projects</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($development as $key):

			$prices = $wpdb->get_row('
				SELECT 
				a.object_id,a.term_taxonomy_id,
				MIN(b.meta_value) as minprice,
				MAX(b.meta_value) as maxprice,
				AVG(b.meta_value) as avgprice
				FROM '.$wpdb->prefix.'term_relationships AS a
				INNER JOIN '.$wpdb->prefix.'postmeta as b ON a.object_id = b.post_id
				WHERE a.term_taxonomy_id = '.$key->term_id.' AND b.meta_key = "cs_price"
				');

		 ?>
		<tr>
			<td class="sitemap-development-name"><a href=""><?php echo $key->name; ?></a></td>
			<td class="sitemap-development-price"><?php echo $prices->minprice; ?></td>
			<td class="sitemap-development-count"><?php echo $key->count; ?></td>
		</tr>
		 <?php endforeach; ?>
</tbody>
</table>
</div>







<div class="main-contents  all-citiess">
<?php 

	$terms = get_terms( 'development' );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		$content ='<ul class="all-cities">';
		foreach ( $terms as $term ) {
			$featured_developer = get_term_meta( $term->term_id, 'featured_developer', true );
			$image_id = get_term_meta( $term->term_id, 'developer_image_id', true );
			$thumbnail_url = wp_get_attachment_image_src($image_id,'full', true);
			$thumnail = wp_get_attachment_image_src($image_id,'thumbnail', true);

			$prices = $wpdb->get_row('
            	SELECT 
            	a.object_id,a.term_taxonomy_id,
            	MIN(b.meta_value) as minprice,
            	MAX(b.meta_value) as maxprice,
            	AVG(b.meta_value) as avgprice
            	FROM '.$wpdb->prefix.'term_relationships AS a
            	INNER JOIN '.$wpdb->prefix.'postmeta as b ON a.object_id = b.post_id
            	WHERE a.term_taxonomy_id = '.$term->term_id.' AND b.meta_key = "cs_price"
            	');

			$thumbnail_url = $thumbnail_url[0];
			$content .= '


	
		<li class="city-location">
			<a href="'.get_term_link( $term ).'">
				<div class="city-content-wrapper">
					<div class="photo-overflow-wrapper">
						<div class="city-image">';
						
						if($image_id) {
							$content .= '<img width="344" height="225" src="'.$thumbnail_url.'" class="attachment-developmentPhoto size-developmentPhoto">';
							
						}
							

			$content .= '<span class="incmplete"></span> <span style="display:none;">419</span></div>
						</div>
						<div class="city-overlay"></div>
						<div class="city-info">
							<div class="city-info-wrapper">
								<span class="project-footer"><div class="total-count"><div class="count-projects"><span class="count-number">'.$term->count.'</span> projects
								</div>
							</div>
							<div class="developer-logo">
								<img src="'.$thumnail[0].'" alt="Palm Jumeirah"></div>
							</span>
							<h3 class="city-name">'.$term->name.'</h3>
							<div class="city-price"> from <span class="price-symbol">$</span>
								<span class="price-amount"> '.$prices->minprice.' </span></div>
								<div class="split-avg-price-wrapper">
									<span class="avg-price-wrap"><div class="avg-price">
										<span class="avg-price-type">
										min price</span>
										<span class="price-currency-amount"> AED '.$prices->minprice.' </span></div>
									</span>
									<span class="avg-price-wrap"><div class="avg-price">
										<span class="avg-price-type">
										max price</span>
										<span class="price-currency-amount">
										AED '.$prices->maxprice.'</span></div>
									</span>
								</div>
							</div>
						</div>
					</div>
				</a>
		</li>




			';
		}
		echo $content .='</ul>';
	}

?>
</div>



<div class="main-contents container">
	<?php 
	if(have_posts()) : 
		while(have_posts()) : the_post();
			the_excerpt();
		endwhile; 
	endif;
	?>
</div>






<?php get_footer(); ?>


<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
	jQuery(document).ready(function() {
    		jQuery('#tablesort').DataTable( {
        "paging":   false,
    } );
	});

</script>