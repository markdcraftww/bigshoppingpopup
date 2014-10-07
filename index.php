<?php get_header(); ?>

<div class="grid">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
	<div class="col-1">
		<?php the_content(); ?>
	</div>
	
	<!--div class="col-3"-->
	<?php
		//if( is_page('Home') ) {
	?>
		<?php //the_post_thumbnail(); ?>
		<?php dynamic_sidebar(); ?>
	<?php		
		//}
	?>
	<!--/div-->
	
	<?php endwhile;  else : ?>
	<div class="col-1 centered">
		<h1>Coming Soon</h1>
		<p>Please check back for more details</p>
	</div>
	<?php endif; ?>

</div>

<?php get_footer(); ?>