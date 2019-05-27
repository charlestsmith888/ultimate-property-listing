<?php  
$location = wp_get_post_terms( $post->ID, 'location');
$developer = wp_get_post_terms( $post->ID, 'developer');
$is_sold = get_post_meta( $post->ID, 'is_sold_field');

$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'portfolio-thumb', true); 

?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>">
		<div class="img-gradient">



			<img src="<?php echo $thumbnail[0];  ?>" alt="">
		</div>
		<div class="homebig-offers">
			<?php the_title( '<h3>', '</h3>' ); ?>

			   <?php if ($is_sold): ?>
        <label class="sold">Sold</label>
      <?php endif; ?>

			<div class="clearfix"></div>


			<?php if ($location): ?>
				<?php foreach ($location as $locationkey1): ?>
					<h5><?php echo $locationkey1->name; ?></h5>
				<?php endforeach; ?>
			<?php endif; ?>



			<div class="clearfix"></div>
			<h4>Luxury Apartments with 2 Years Payment Plan</h4>
			<div class="clearfix"></div>
			<h4>Stunning Views of The Golf Course</h4></div>
			<div class="project-price"><div class="meta-label">Starting From:</div><?php echo ul_price($ul_fields->price_section_get_meta( 'cs_price' )); ?></div>
			<h6 class="project-comp"><?php echo $developer[0]->name; ?></h6>
		</a>
	</li>
