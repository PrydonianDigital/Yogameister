<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('row'); ?>>
	<div class="twelve columns">
		<h3><?php the_title(); ?></h3>
		<?php the_content(); ?>
		<?php the_post_thumbnail('full'); ?>
	</div>
</div>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>