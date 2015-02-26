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