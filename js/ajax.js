$(document).ready(function() {
	
	// toggle menu
	$('.menu-items').hide();
	$('.combos').on('click', function(e){
		e.preventDefault();
		$('.combos .menu-items').fadeToggle("slow");
	});
	$('.sushi').on('click', function(e){
		e.preventDefault();
		$('.sushi .menu-items').fadeToggle("slow");
	});
	$('.hibachi').on('click', function(e){
		e.preventDefault();
		$('.hibachi .menu-items').fadeToggle("slow");
	});
	$('.drinks-sides').on('click', function(e){
		e.preventDefault();
		$('.drinks-sides .menu-items').fadeToggle("slow");
	});

});