<div class="row">
	<div class="twelve columns">
		<div class="navbar" id="nav2" role="navigation">
			<div class="row">
				<a class="toggle" gumby-trigger="#nav2 ul.twelve" href="#"><i class="icon-menu"></i></a>
				<?php wp_nav_menu( array( 'theme_location' => 'footermenu', 'container' => false, 'menu_class' => 'twelve columns', 'walker' => new Walker_Page_Custom ) ); ?>
			</div>
		</div>
	</div>
</div>

<div class="row">

	<div class="twelve columns">

		<ul>
			<?php dynamic_sidebar( 'footer' ); ?>
		</ul>

	</div>

</div>

</div>
<div id="footer">
	<div class="row">
		<div class="eight columns">
			<a href="http://www.yogaalliance.co.uk/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/RYS50.png" alt="RYT" width="50" height="49" /></a> <a href="http://www.yogaalliance.co.uk/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/RYTP50.png" alt="RYTP" width="50" height="49" /></a>
			&copy <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <small>Patricia is a registered SYT teacher and Prenatal yoga teacher with the Yoga Alliance UK. This accreditation demonstrates excellent standards as set by the Yoga Alliance UK.</small>
		</div>
		<div class="four columns right">
			<p><small>Site by <a href="http://prydonian.digital/" target="_blank" rel="author" title="Prydonian Digital"><img src="<?php bloginfo('template_url'); ?>/img/pd.png" alt="pd" width="16" height="16" /> Prydonian Digital</a></small></p>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62116034-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>