$(function() {
	$(".menu-tabs li").click(function(){
		$(".menu-tabs li").removeClass("active");
		$(this).addClass("active");

		var selector = $(this).attr("data-filter");
		$(".grid").isotope({
		filter: selector
		});
		return false;
	});

	AOS.init();

    $('.grid').isotope({
      itemSelector: '.grid-item',
      layoutMode: 'fitRows'
    });
    
    $(".menu-tabs li").click(function(){
      $(".menu-tabs li").removeClass("active");
      $(this).addClass("active");
  
      var selector = $(this).attr("data-filter");
      $(".grid").isotope({
        filter: selector
      });
      return false;
    });

});