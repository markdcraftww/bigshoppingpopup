<?php get_header(); ?>

<div class="grid">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
	<?php
		if( is_page('Home') ) {
	?>	
	
	<div class="col-2-3">
		<div class="spacing">
			<?php the_content(); ?>
		</div>
	</div>
	
	<div class="col-3">
		<div class="spacing">
			<?php the_post_thumbnail('sidebar'); ?>
		</div>
	</div>
	
	<?php		
		}
	?>
		
	<?php
		if( is_page('Why Attend?') ) {
	?>	
	
	<div class="col-1">
		<div class="spacing">
			<?php the_content(); ?>
		</div>
	</div>
	
	<?php		
		}
	?>
		
	<?php
		if( is_page('Agenda') ) {
	?>	
	<div class="col-1">
		<?php
			$args = array (
				'post_type' => 'agendum',
				'posts_per_page' => '100'
			);
			$agenda = new WP_Query( $args );
			if ( $agenda->have_posts() ) {
				while ( $agenda->have_posts() ) {
					$agenda->the_post();
		?>
		<div <?php post_class('grid'); ?>>	
			<div class="col-10 time">
				<h3><?php global $post; $agendum = get_post_meta( $post->ID, '_cmb_time', true ); echo $agendum; ?></h3>
			</div>
			<div class="col-10-1">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		</div>
		<?php
				}
			} else {
		?>
		<div class="grid">
			<div class="col-1 centered">
				<h1>To be revealed soon</h1>
			</div>
		</div>
		<?php
			}
			wp_reset_postdata();
		?>		
	</div>
	<?php		
		}
	?>
		
	<?php
		if( is_page('Contributors') ) {
	?>	
	
	<div class="col-1">
		<div class="grid" id="container">
		<?php
			$args = array (
				'post_type' => 'speaker',
				'posts_per_page' => '100', 
				'orderby' => 'menu_order',
				'order' => 'ASC'
			);
			$locations = new WP_Query( $args );
			if ( $locations->have_posts() ) {
				while ( $locations->have_posts() ) {
					$locations->the_post();
		?>
			<div class="col-3 speaker">
				<div class="speakerHolder">
					<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('grid'); ?>
						<h2><?php the_title(); ?></h2>
						<p><?php global $post; $job = get_post_meta( $post->ID, '_cmb_job', true ); echo $job;  ?></p>
						<p><?php global $post; $company = get_post_meta( $post->ID, '_cmb_company', true ); echo $company;  ?></p>
					</a>
				</div>
			</div>
		<?php
				}
			} else {
		?>
			<div class="col-1 centered">
				<h1>To be revealed soon</h1>
			</div>
		<?php
			}
			wp_reset_postdata();
		?>
		</div>
	</div>
	
	<?php		
		}
	?>
		
	<?php
		if( is_page('Truth About Shopping') ) {
	?>	
	
	<div class="col-2-3">
		<div class="spacing">
			<?php the_content(); ?>
		</div>	
	</div>
	<div class="col-3">
		<div class="spacing">
			<h2>JOIN THE CONVERSATION</h2>
		<a class="twitter-timeline" href="https://twitter.com/hashtag/truthaboutshopping" data-widget-id="467225564361682945" data-dnt="true" data-theme="light" data-link-color="#c40079" data-border-color="#ededed" data-chrome="nofooter transparent noborders noheader" aria-polite="polite"  width="300" height="720"></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
	
	<?php		
		}
	?>
		
	<?php
		if( is_page('European Launch') ) {
	?>	
	
	<div class="col-2-3">
		<div class="spacing">
			<?php the_content(); ?>
		</div>	
	</div>
	<div class="col-3">
		<div class="spacing">
			<h2>JOIN THE CONVERSATION</h2>
		<a class="twitter-timeline" href="https://twitter.com/hashtag/bigshoppingpopup" data-widget-id="491946403963207681" data-dnt="true" data-theme="light" data-link-color="#c40079" data-border-color="#ededed" data-chrome="nofooter transparent noborders noheader" aria-polite="polite"  width="300" height="720"></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
	
	<?php		
		}
	?>	
		
	<?php
		if( is_page('The Big Shopping Shakeup') ) {
	?>	
	
	<div class="col-1">
		<div class="spacing">
			<?php the_content(); ?>
		</div>
	</div>
	
	<?php		
		}
	?>
		
	<?php
		if( is_page('Request Invite') ) {
	?>	
	
	<div class="col-3">
		<div class="spacing">
			&nbsp;
		</div>
	</div>
	
	<div class="col-3">
		<div class="spacing">
			<?php the_content(); ?>
		</div>
	</div>
	
	<div class="col-3">
		<div class="spacing">
			&nbsp;
		</div>
	</div>
	
	<?php		
		}
	?>
	
	<?php endwhile;  else : ?>
	<div class="col-1 centered">
		<h1>To be revealed soon</h1>
	</div>
	<?php endif; ?>

</div>

<?php get_footer(); ?>