$(document).ready(function(){

	$(".left-nav").on("click",".nav-toggle",function(event){
		var $subNav = $(this).parent().children(".sub-nav");
		$subNav.slideToggle();
		$(this).parent().toggleClass('subnav-open');
		event.stopPropagation();
	});

});