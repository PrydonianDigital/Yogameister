<?php get_header(); ?>

<div class="row" id="page">

		<div class="nine columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php endif; ?>

		</div>

		<div class="three columns">
			<div id="cbp-qtrotator" class="cbp-qtrotator">
				<h4>Testimonial</h4>
				<?php
				$connected = new WP_Query( array(
					'connected_type' => 'testimonials_to_pages',
					'connected_items' => get_queried_object(),
					'nopaging' => true,
				) );
				if ( $connected->have_posts() ) :
				?>
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
					<div class="cbp-qtcontent">
					<blockquote>
						<?php the_content(); ?>
						<cite><?php the_title(); ?></cite>
					</blockquote>
					</div>
					<?php endwhile; ?>
				<?php wp_reset_postdata(); endif; ?>
			</div>
		</div>

</div>

<?php get_footer(); ?>