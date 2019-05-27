<?php
/**
* The template for displaying archive pages
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.0
*/
get_header(); ?>
<<<<<<< HEAD



<div class="main-contents">
<div class="property-header developer-header"><h1><?php the_archive_title(); ?></h1>
		<span></span>
	</div>

=======
<div class="main-content">
	<h1>LATEST OFF PLAN PROPERTIES</h1>
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
	<ul class="width-50">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			
			<?php require ULPROURL. '/templates/content.php'; ?>


		<?php endwhile;
		
	else :
		require ULPROURL. '/templates/no-content.php';
	endif; ?>
</ul>
<div class="clearfix"></div>
</div>
<?php get_footer();