<?php get_header(); ?>

<div class="grid">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="col-3 speaker">
		<?php the_post_thumbnail(); ?>
		<h2><?php the_title(); ?></h2>
		<p><?php global $post; $job = get_post_meta( $post->ID, '_cmb_job', true ); echo $job;  ?></p>
		<p><?php global $post; $company = get_post_meta( $post->ID, '_cmb_company', true ); echo $company;  ?></p>
	</div>
		
	<div class="col-2-3">
		<?php the_content(); ?>
	</div>
	
	<?php endwhile;  else : ?>
	<div class="col-1 centered">
		<h1>Coming Soon</h1>
		<p>Please check back for more details</p>
	</div>
	<?php endif; ?>

</div>

<?php get_footer(); ?>