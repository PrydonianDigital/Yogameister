<?php get_header(); ?>

<div class="row" id="page">
	
		<div class="nine columns">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<?php the_content(); ?>
		
		<?php endwhile; ?>
		
		<?php endif; ?>
	
		</div>
	
		<div class="three columns">
			<ul>
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</ul>
		</div>

</div>

<?php get_footer(); ?>