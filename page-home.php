<?php get_header(); ?>

<div class="row" id="page">

		<div class="twelve columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

			<?php
			$connected = new WP_Query( array(
				'connected_type' => 'testimonials_to_pages',
				'connected_items' => get_queried_object(),
				'nopaging' => true,
			) );
			if ( $connected->have_posts() ) :
			?>
			<h4>Testimonial</h4>
			<blockquote>
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				<?php the_content(); ?>
				<cite><?php the_title(); ?></cite>
			<?php endwhile; ?>
			</blockquote>
			<?php wp_reset_postdata(); endif; ?>

		<?php endwhile; ?>

		<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>