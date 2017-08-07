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


<div id="wooclass">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_title(); ?>

				<?php endwhile; ?>
				
			</div>
		</div>
	</div>
</div>

<?php get_footer();