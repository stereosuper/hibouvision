$(document).ready(function() {
	//////////////////////////////////////////////////
	//////////////// REQUESTANIMFRAME ////////////////
	//////////////////////////////////////////////////
	window.requestAnimFrame = (function(){
	  return  window.requestAnimationFrame       ||
	          window.webkitRequestAnimationFrame ||
	          window.mozRequestAnimationFrame    ||
	          window.oRequestAnimationFrame      ||
	          window.msRequestAnimationFrame     ||
	          function(callback){
	            window.setTimeout(callback, 1000/60);
	          };
	})();

	var chouetteCanvas = false, menuLinks = $('#mainMenu a').not('.lang').not('.connect');

	/*function fixBloc(id_string, scrollBegin, scrollEnd) {
		var myScroll = $(document).scrollTop();
		if (myScroll>=scrollBegin && myScroll<scrollEnd) {
			$(id_string).css({"position":"fixed", "top":"0"});
		} else {
			$(id_string).css("position","absolute");
			if (myScroll<scrollBegin) {
				$(id_string).css("top",scrollBegin+"px");
			} else if (myScroll>=scrollEnd) {
				$(id_string).css("top",scrollEnd+"px");
			}
		}
	}*/

	/*function animer(){
		var myScroll = $(document).scrollTop();

		requestAnimFrame(function(){
			animer();
		});
	}*/

	function initHome(){

		$('.title-table-pricing').clone().insertAfter("#clone-offre");



	}
	function scrollToAnchor(id){
	    $('html,body').animate({scrollTop: $(id).offset().top-$("header").outerHeight()+10}, 400);
	}


	//////////////////////////////////////////////////
	////////////////////// INIT //////////////////////
	//////////////////////////////////////////////////

	if(isMobile.any){
		$('html').addClass('isMobile');
		$('#pricer-mobile .offre').first().addClass( "active");
		$('#pricer-mobile .offre .mobile-toggle .categorie').first().addClass( "active");

	}else{
		$('html').addClass('isDesk');
		$('#pricer .categorie').first().addClass( "active");

	}


	menuLinks.on('click', function(e){
		e.preventDefault();
		scrollToAnchor($(this).attr('href'));
		$(this).parents('li').addClass('active').siblings().removeClass('active');
	});

	$('.btnScroll').on('click', function(e){
		e.preventDefault();
		scrollToAnchor($(this).attr('href'));
	});

	//seeThru video
	/*if($('#hibou').length && $(window).width() > 1000){
		chouetteCanvas = seeThru.create('#hibou');
	}*/

	if($('body').hasClass('home')){
		//scrollreveal
		window.sr = ScrollReveal({
			reset       : false ,
			origin		: 'right',
			distance    : '200px',
			mobile      : false,
			useDelay    : 'once',
			viewFactor  : 0.5,

		});
		sr.reveal('.foo', { duration: 1000} , 50);
		sr.reveal('.bar', { duration: 1000, origin:'left' } , 50);
		
		initHome();
	}

	//tooltip
	if($('.tooltip').length){
		$('.tooltip').tooltipster({
			contentAsHTML: true,
			theme: 'tooltipster-shadow',
			position: 'right',
			offsetY: '70'
		});
	}


	// then immediately show the tooltip
 	//$('#tools').tooltipster('show');

	// as soon as a key is pressed on the keyboard, hide the tooltip.
	/*$(window).click(function() {
		$('#tools').tooltipster('hide');
  	});*/

	//animer();

	/*$(window).resize(function(){
		if($(window).width() > 1000){
			if(!chouetteCanvas){
				chouetteCanvas = seeThru.create('#hibou');
			}
		}
	});*/

	$(document).on('scroll', function(){
		var myScroll = $(document).scrollTop();

		//pricer - version desktop
		if($('html').hasClass('isMobile')){}else{
			
			if(myScroll > $("#pricer").offset().top+$("#pricer").outerHeight()-85){
				$("#clone-container").removeClass("active");
				$("#pricer  .title-table-pricing").removeClass("hiddden");			
			}else if(myScroll> $("#pricer").offset().top-85){
				$("#clone-container").addClass("active");
				$("#pricer .title-table-pricing").addClass("hiddden");
			}else{
				$("#clone-container").removeClass("active");
				$("#pricer .title-table-pricing").removeClass("hiddden");
			}

		}



		if(menuLinks.length){
			menuLinks.each(function(){
				var ref = $($(this).attr('href'));
				if(ref.offset().top-$("header").outerHeight() <= myScroll && ref.offset().top-$("header").outerHeight()+ref.height() > myScroll){
					$(this).parents('li').addClass('active').siblings().removeClass('active');
				}



			});
		}
	});

	$(window).on('beforeunload', function() { $("video").hide(); });

	if($("body").hasClass("has-sidebar")){
		if(myScroll>=$(".wrapper-nav-left").offset().top+$(".content-with-navbar").outerHeight()-$(".wrapper-nav-left ul").outerHeight()){
			TweenMax.set($(".wrapper-nav-left > ul"), {position: "absolute", top: $(".content-with-navbar").outerHeight()-$(".wrapper-nav-left ul").outerHeight()+$(".header").outerHeight()+"px"});
		}else{
			TweenMax.set($(".wrapper-nav-left > ul"), {position: "absolute", top: "0"});
		}
	}


	$( "button" ).click(function() {
	  //$( ".table-slide-toggle" ).slideToggle( "slow" );
	  //$(this).siblings('.table-slide-toggle').slideToggle( "slow" );
	  //cas desktop
	  	if($(this).parent(".categorie").hasClass("active")){
	  		$(this).parent(".categorie").toggleClass("active");

	  	}else{

	  		$('#pricer .categorie.active').removeClass('active')
	  		//$('#pricer-mobile .categorie.active').removeClass('active')
	  		$(this).parent(".categorie").toggleClass("active");
	  	}
	  	//$('html,body').animate({scrollTop: $('#pricer .categorie.active').top+$("#pricer").outerHeight()-85}, 400);
				//$("#pricer").offset().top+$("#pricer").outerHeight()-85
			
		///SCROLL AU CLICK
		//cas desktop
		if($('html').hasClass('isDesk')){
			var posElement =$('.isDesk #pricer .categorie.active').offset().top-175;
		  	$('html,body').animate({scrollTop: posElement}, 400);
		}else{
		//cas mobile
		}




	  	//cas mobile
	  	//var uncles = $(this).siblings().parent();
	  	//$(uncles).find(".visible-infos").removeClass("visible-infos");



	  	//CHOIX OFFRE
	  	if($(this).parent(".offre").hasClass("active")){
	  		$(this).parent().removeClass("active");
	  	}else{
	  		$('.offre.active').removeClass('active')
	  		$(this).parent().addClass("active");
	  	}


	  	//CHOIX CATEGORIE
	  	if($(this).children(".offre .mobile-toggle .categorie").hasClass("active")){
	  		$(this).children(".mobile-toggle .categorie.active").removeClass("active");
	  	}else{
	  		// $('.offre.active').removeClass('active')
	  		// $(this).parent().addClass("active");
	  	}

	});

	// if (document.documentElement.clientWidth < 1000) {

	// }

});
