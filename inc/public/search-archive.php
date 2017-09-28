<?php
get_header();
		// Get data from URL into variables
		$s = @$_GET['s'] != '' ? @$_GET['s'] : '';
		$addrss = @$_GET['address'] != '' ? @$_GET['address'] : '';
		$price = @$_GET['price'] != '' ? @$_GET['price'] : '';
		$post_type = @$_GET['post_type'] != '' ? @$_GET['post_type'] : '';
		// Start the Query
		$v_args = array(
			'post_type'     =>  $post_type,
		's'             =>  $s, // looks into everything with the keyword from your 'name field'
		'meta_query'    =>  array(
			array(
		'key'     => 'custom_fields_address', // assumed your meta_key is 'car_model'
		'value'   => $addrss,
		'compare' => 'LIKE', // finds models that matches 'model' from the select field
		),
			array(
		'key'     => 'custom_fields_price', // assumed your meta_key is 'car_model'
		'value'   => $price,
		'compare' => 'LIKE', // finds models that matches 'model' from the select field
		),
			)
		);
$vehicleSearchQuery = new WP_Query( $v_args );
// print_r($vehicleSearchQuery);
?>


<div id="wooclass" class="defaultbg">
	<div class="container">
		<div class="row">


			<?php
			if ($vehicleSearchQuery->have_posts() ) :
				$inicontent = ul_pro_get_option('columncontent');
			while ($vehicleSearchQuery->have_posts() ) : $vehicleSearchQuery->the_post(); 


			$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium_large', true);
			$contreplace = array(
				'{$img}'  	=> $thumbnail[0],
				'{$title}'  => get_the_title(),
				'{$address}'=> ul_pro_get_meta_field( 'custom_fields_address' ),
				'{$price}' 	=> ul_pro_get_meta_field( 'custom_fields_price' ),
				'{$link}' 	=> get_the_permalink(),
				);

			echo strtr($inicontent, $contreplace);
			?>












		<?php endwhile; ?>


	<?php else: ?>
		<h2>No result found</h2>
	<?php endif; ?>

		</div>
	</div>
</div>



<?php get_footer();