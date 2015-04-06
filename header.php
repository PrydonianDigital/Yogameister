<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title('¦', true, 'right'); ?><?php bloginfo('name'); ?> ¦ <?php bloginfo('description'); ?></title>
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
</head>

<body <?php body_class(); ?>>

<div class="navbar" id="ymnav" role="navigation">
	<div class="row">
		<a class="toggle" gumby-trigger="#ymnav ul.nine" href="#"><i class="icon-menu"></i></a>
		<h1 class="three columns logo">
			<a href="<?php bloginfo('url'); ?>">
				<img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="<?php bloginfo('title'); ?>" title="<?php bloginfo('title'); ?>" gumby-retina />
			</a>
		</h1>
		<?php wp_nav_menu( array( 'theme_location' => 'ymmenu', 'container' => false, 'menu_class' => 'nine columns', 'walker' => new Walker_Page_Custom ) ); ?>
	</div>
</div>
