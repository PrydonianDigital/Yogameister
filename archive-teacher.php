<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('row'); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
	<div class="three columns">
		<a href="<?php the_permalink(); ?>" rel="permalink" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
	</div>
	<div class="six columns">
		<h3><a href="<?php the_permalink(); ?>" rel="permalink" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
	</div>
	<div class="three columns">
		<?php
			$connected = new WP_Query( array(
			  'connected_type' => 'class_location',
			  'connected_items' => $post,
			  'nopaging' => true,
			) );		
			if ( $connected->have_posts() ) :
			?>
			<h5>Locations:</h5>
			<ul>
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
			    <li><a href="<?php the_permalink(); ?>"><?php global $post; $rooms = get_post_meta( $post->ID, '_cmb_room', true ); if( $rooms != '' ) :  ?>Room <?php global $post; $rooms = get_post_meta( $post->ID, '_cmb_room', true ); echo $rooms;  ?>, <?php endif; ?><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
			
			<?php 
			wp_reset_postdata();		
			endif;
		?>
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
	<?php } else { ?>
	<div class="nine columns">
		<h3><a href="<?php the_permalink(); ?>" rel="permalink" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
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
		<?php
			$connected = new WP_Query( array(
			  'connected_type' => 'class_teacher',
			  'connected_items' => $post,
			  'nopaging' => true,
			) );		
			if ( $connected->have_posts() ) :
			?>
			<h5>Teacher:</h5>
			<ul>
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
			    <li><a href="<?php the_permalink(); ?>"><?php global $post; $rooms = get_post_meta( $post->ID, '_cmb_room', true ); if( $rooms != '' ) :  ?>Room <?php global $post; $rooms = get_post_meta( $post->ID, '_cmb_room', true ); echo $rooms;  ?>, <?php endif; ?><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
			
			<?php 
			wp_reset_postdata();		
			endif;
		?>
	</div>
	<?php } ?>

</div>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>