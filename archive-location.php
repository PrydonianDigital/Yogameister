<?php get_header(); ?>

<div class="row">
	<div class="twelve columns">
		<div id="map"></div>
<script>
$(function() {
	jQuery("#map").gmap3({
		map:{
			options:{
				center:[51.4985931,-0.0388206],
				zoom:16,
				mapTypeId: google.maps.MapTypeId.TERRAIN,
				mapTypeControl: true,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
				},
				navigationControl: true,
				scrollwheel: true,
				streetViewControl: true
			}
		},
		marker:{
			values:[
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				{address:"<?php global $post; $street = get_post_meta( $post->ID, '_cmb_street', true ); if( $street != '' ) :  ?><?php global $post; $street = get_post_meta( $post->ID, '_cmb_street', true ); echo $street;  ?><?php endif; ?>, <?php global $post; $town = get_post_meta( $post->ID, '_cmb_town', true ); if( $town != '' ) :  ?><?php global $post; $town = get_post_meta( $post->ID, '_cmb_town', true ); echo $town;  ?><?php endif; ?>, <?php global $post; $postcode = get_post_meta( $post->ID, '_cmb_postcode', true ); if( $postcode != '' ) :  ?><?php global $post; $postcode = get_post_meta( $post->ID, '_cmb_postcode', true ); echo $postcode;  ?><?php endif; ?>", data:"<?php the_title(); ?>"},
				<?php endwhile; ?><?php endif; ?>
			],
			options:{
				draggable: false
			}
		}
	});
});
</script>
	</div>
</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('row'); ?>>

	<div class="twelve columns">

		<h3><?php the_title(); ?></h3>

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

		<?php the_content(); ?>

	</div>

</div>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>