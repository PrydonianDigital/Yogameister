<?php get_header(); ?>

<div class="row" id="page">

	<?php if(is_page(array('Timetable', 'Contact', 'Privacy Policy', 'Terms & Conditions'))) { ?>

		<div class="twelve columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php endif; ?>

		</div>

	<?php } elseif(is_page('Register')) { ?>

		<div class="twelve columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php if ( is_user_logged_in() ) { ?>

			<h4>You have already registered and are logged in.</h4>

		<?php } else { ?>

			<?php the_content(); ?>

		<?php } ?>

		<?php endwhile; ?>

		<?php endif; ?>

		</div>

	<?php } elseif(is_page('myaccount')) { ?>

		<div class="twelve columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php if ( is_user_logged_in() ) { ?>

			<h4>Welcome, <?php global $current_user; get_currentuserinfo(); echo $current_user->display_name; ?> <small>(Not <?php echo $current_user->display_name; ?>? <a href="<?php echo wp_logout_url(); ?>">Logout</a>.)</h4>

			<h4>My Bookings</h4>

			<?php echo do_shortcode("[listBookedEvents type='all']"); ?>

		<?php } else { ?>

			<div class="row">
				<div class="six columns">
					<h4>Please log in</h4>

					<?php wp_login_form(); ?>
				</div>
				<div class="six columns">
					<h4>Register a new account</h4>

					<?php echo do_shortcode("[cr_custom_registration]"); ?>
				</div>
			</div>

		<?php } ?>

		<?php endwhile; ?>

		<?php endif; ?>

		</div>

	<?php } else { ?>

		<div class="nine columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php endif; ?>

		</div>

		<div class="three columns">
			<div id="cbp-qtrotator" class="cbp-qtrotator">
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

	<?php } ?>

</div>

<?php get_footer(); ?>