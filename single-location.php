<?php get_header(); ?>

<div class="row" id="page">

		<div class="twelve columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h2><?php the_title(); ?></h2>

			<?php global $post; $street = get_post_meta( $post->ID, '_cmb_street', true ); if( $street != '' ) :  ?>
				<p><?php global $post; $street = get_post_meta( $post->ID, '_cmb_street', true ); echo $street;  ?></p>
			<?php endif; ?>

			<?php global $post; $street2 = get_post_meta( $post->ID, '_cmb_street2', true ); if( $street2 != '' ) :  ?>
				<p><?php global $post; $street2 = get_post_meta( $post->ID, '_cmb_street2', true ); echo $street2;  ?></p>
			<?php endif; ?>

			<p><?php global $post; $town = get_post_meta( $post->ID, '_cmb_town', true ); if( $street != '' ) :  ?>
				<p><?php global $post; $town = get_post_meta( $post->ID, '_cmb_town', true ); echo $town;  ?></p>
			<?php endif; ?>

			<?php global $post; $postcode = get_post_meta( $post->ID, '_cmb_postcode', true ); if( $postcode != '' ) :  ?>
				<p><?php global $post; $postcode = get_post_meta( $post->ID, '_cmb_postcode', true ); echo $postcode;  ?></p>
			<?php endif; ?>

			<?php global $post; $tel = get_post_meta( $post->ID, '_cmb_tel', true ); if( $tel != '' ) :  ?>
				<p><i class="icon-phone"></i> <a href="tel:<?php global $post; $tel = get_post_meta( $post->ID, '_cmb_tel', true ); echo $tel;  ?>"><?php global $post; $tel = get_post_meta( $post->ID, '_cmb_tel', true ); echo $tel;  ?></a></p>
			<?php endif; ?>

			<?php global $post; $web = get_post_meta( $post->ID, '_cmb_text_url', true ); if( $web != '' ) :  ?>
				<p><i class="icon-monitor"></i> <a href="<?php global $post; $web = get_post_meta( $post->ID, '_cmb_text_url', true ); echo $web;  ?>" rel="nofollow" target="_blank"><?php global $post; $web = get_post_meta( $post->ID, '_cmb_text_url', true ); echo $web;  ?></a></p>
			<?php endif; ?>

			<?php global $post; $gmi = get_post_meta( $post->ID, '_cmb_gmi', true ); if( $gmi != '' ) :  ?>
				<p><iframe id="gmap" src="<?php global $post; $gmi = get_post_meta( $post->ID, '_cmb_gmi', true ); echo $gmi;  ?>" frameborder="0" width="600" height="400"></iframe></p>
			<?php endif; ?>

		<?php endwhile; ?>

		<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>