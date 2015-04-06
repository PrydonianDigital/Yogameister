Gumby.init();

var $j = jQuery.noConflict();

$j(function() {

	$j('#setdate').on('click', function(e){
		e.preventDefault();
		$j('.picker').datepicker( 'setDate', '01/09/2015' );
	})
		//var bookDate = getUrlVars()['date'];
		//$j('.picker').datepicker( 'setDate', bookDate ).datepicker( 'refresh' );
	//}

	$j("#ch-carousel").owlCarousel({
		items: 1,
		lazyLoad : true,
		navigation : true,
		slideSpeed : 2000,
		paginationSpeed : 800,
		navigationText: ["",""],
		autoPlay: true,
		itemsDesktop: false,
		itemsDesktopSmall: false,
		itemsTablet: false,
		itemsTabletSmall: false,
		itemsMobile: false,
		stopOnHover: true
	});

	$j('.checkout p').addClass('field');

	$j('.checkout input').addClass('input');

	$j('.checkout textarea').addClass('input textarea');

	var divs = $j('.cbp-qtcontent');

			function fade() {
				var current = $j('.current');
				var currentIndex = divs.index(current),
					nextIndex = currentIndex + 1;

				if (nextIndex >= divs.length) {
					nextIndex = 0;
				}

				var next = divs.eq(nextIndex);

				next.stop().fadeIn(1500, function() {
					$j(this).addClass('current');
				});

				current.stop().fadeOut(1500, function() {
					$j(this).removeClass('current');
					_startProgress()
					setTimeout(fade, 8000);
				});
			}

			function _startProgress(){
				$j(".cbp-qtprogress").removeAttr('style');
				$j(".cbp-qtprogress").animate({
					width:"800px",
				} , 8000);
			}

			_startProgress()
			setTimeout(fade, 8000);

});

function getUrlVars() {
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++) {
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}

function element_exists(id){
	if($j(id).length > 0){
		return true;
	}
	return false;
}
