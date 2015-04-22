<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('row'); ?>>
	<div class="twelve columns">
		<h3><?php the_title(); ?></h3>
		<?php the_content(); ?>
		<?php the_post_thumbnail('full'); ?>
			<div id="cbp-qtrotator" class="cbp-qtrotator">
<?php
// Find connected pages (for all posts)
p2p_type( 'testimonials_to_teacher' )->each_connected( $wp_query );
?>

<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

    <?php the_title(); ?>

    <?php
    // Display connected pages
    echo '<p>Related pages:</p>';

    foreach ( $post->connected as $post ) : setup_postdata( $post );
        the_title();

        echo '<p>Connection ID: ' . $post->p2p_id . '</p>';

    endforeach;

    wp_reset_postdata(); // set $post back to original post
    ?>

<?php endwhile; ?>
			</div>
	</div>
</div>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>