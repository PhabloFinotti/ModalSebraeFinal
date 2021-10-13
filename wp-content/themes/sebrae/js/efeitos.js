$(document).ready(function() {
	$(".menu-tabs li").click(function(){
		$(".menu-tabs li").removeClass("active");
		$(this).addClass("active");

		var selector = $(this).attr("data-filter");
		$(".grid").isotope({
		filter: selector
		});
		return false;
	});



    $('.close').click(function(){
      $(".modal-toggle").removeClass("active");
    });

    // Ao clicar nos botões iniciais faça
    $('.modal-toggle').click(function(e){
      var tab = e.target.hash;
      $('#publico-modal').modal('show');
      $('li > a[href="' + tab + '"]').tab("show");
      
      $('.tab-content .tab-pane').removeClass('active');
      
      setTimeout(function(){
        $('li[data-filter=".cat-todos"]').click().addClass('active');
      }, 200);

      if (!$('#publico-modal').hasClass("show")) {
        $(".modal-toggle").removeClass("active");
      };
    });

   

    // Ao clicar nos botões internos do modal faça
    $('ul.nav li > a').click(function(){
      $('li[data-filter="*"]').removeClass('active');
      $('.tab-content .tab-pane').removeClass('active');
      
      $("#publico-modal").animate({ scrollTop: 0 }, "slow");
      
      setTimeout(function(){
        $('li[data-filter=".cat-todos"]').click().addClass('active');
      }, 200);
    });


});