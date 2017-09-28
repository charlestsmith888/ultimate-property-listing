<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.0
*/
get_header(); ?>
<div id="wooclass" class="single-page-property">
	<div class="clearfix"></div>
	<div class="container">
		<div class="row">


			<div class="col-md-9">
				<?php while ( have_posts() ) : the_post(); $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium_large', true); ?>
					<h1 class="property_title"><?php the_title(); ?>
						<span class="property_address"><?php echo ul_pro_get_meta_field( 'custom_fields_address' ); ?></span>
					</h1>
					<div class="property_price">
						<strong>
							<?php echo ul_pro_get_meta_field( 'custom_fields_price' ); ?>
						</strong>
					</div>
					<div class="clearfix"></div>
					<div class="images">
						<img src="<?php echo $thumbnail[0]; ?>" alt="" class="img-responsive">
					</div>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>

			<div class="col-md-3">
				
				<div class="property-search">
					<form role="search" action="<?php echo site_url('/'); ?>" method="get">
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






			</div>


		</div>
	</div>
</div>
<?php get_footer();