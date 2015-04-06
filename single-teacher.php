<?php get_header(); ?>

<div class="row" id="page">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="three columns">

			<?php the_post_thumbnail(); ?>

		</div>

			<div class="six columns">

				<h2><?php the_title(); ?></h2>

				<?php the_content(); ?>

		</div>

		<div class="three columns">

			<?php
				$connected = new WP_Query( array(
				  'connected_type' => 'class_teacher',
				  'connected_items' => $post,
				  'nopaging' => true,
				) );
				if ( $connected->have_posts() ) :
				?>
				<h5>Classes:</h5>
				<ul>
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				    <li><i class="icon-ticket"></i><a href="<?php the_permalink(); ?>"><?php global $post; $rooms = get_post_meta( $post->ID, '_cmb_room', true ); if( $rooms != '' ) :  ?>Room <?php global $post; $rooms = get_post_meta( $post->ID, '_cmb_room', true ); echo $rooms;  ?>, <?php endif; ?><?php the_title(); ?></a></li>
				<?php endwhile; ?>
				</ul>

				<?php
				wp_reset_postdata();
				endif;
			?>

		</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>