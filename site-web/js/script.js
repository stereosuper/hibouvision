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
	var mobileBreakpoint = 767,
		tabletBreakpoint = 979;

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
		$('#pricer-mobile .offre-scops .mobile-toggle .categorie').first().addClass( "active-cate");
		$('#pricer-mobile .offre-asio .mobile-toggle .categorie').first().addClass( "active-cate");
		$('#pricer-mobile .offre-bubo .mobile-toggle .categorie').first().addClass( "active-cate");
		$('#pricer-mobile .offre-mighty .mobile-toggle .categorie').first().addClass( "active-cate");

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
		if($('html').hasClass('isDesk')){
			if($('body').hasClass('home')){
				
				if(myScroll > $("#pricer").offset().top+$("#pricer").outerHeight()-60){
					$("#clone-container").removeClass("active");
					$("#pricer  .title-table-pricing").removeClass("hiddden");			
				}else if(myScroll> $("#pricer").offset().top-80){
					$("#clone-container").addClass("active");
					$("#pricer .title-table-pricing").addClass("hiddden");
				}else{
					$("#clone-container").removeClass("active");
					$("#pricer .title-table-pricing").removeClass("hiddden");
				}
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

	if($('html').hasClass('isDesk')){}else{
		//nav latérale fixed
		if($("body").hasClass("has-sidebar")){	
			$(window).scroll(function() {   
				var scroll = $(window).scrollTop();
				if (scroll >=$(".wrapper-nav-left").outerHeight(true)-$("#nav-left-fixed").outerHeight()){
				    TweenMax.set($("#nav-left-fixed"), {position: "absolute", top: $("#header").outerHeight()+$(".wrapper-nav-left").outerHeight(true)-$("#nav-left-fixed").outerHeight()+"px"});
				}else if (scroll <=$(".wrapper-nav-left").outerHeight(true)-$("#nav-left-fixed").outerHeight()){
				    TweenMax.set($("#nav-left-fixed"), {position: "fixed", top: "auto"});
				}else{

				}
			});
		}
	}

	$( "button" ).click(function() {

	  //cas desktop
	  	if($('html').hasClass('isDesk')){
		  	if($(this).parent(".categorie").hasClass("active")){
		  		$(this).parent(".categorie").toggleClass("active");
		  	}else{
		  		$('#pricer .categorie.active').removeClass('active')
		  		$(this).parent(".categorie").toggleClass("active");
		  	}
		  	//scroll
		  	var posElement =$('.isDesk #pricer .categorie.active').offset().top-97;
		  	$('html,body').animate({scrollTop: posElement}, 400);
	  	}
	  	//cas mobile
	  if($('html').hasClass('isMobile')){
	  		var posElement = 0 ;

		  	//CHOIX CATEGORIE
		  	if($(this).parent().hasClass('categorie')){
			  	if($(this).parent(".categorie").hasClass("active-cate")){
			  		$(this).parent().removeClass("active-cate");
			  	}else{
			  		$(this).parent(".categorie").addClass("active-cate");
			  	}
		  		posElement =$(this).parent(".categorie").offset().top;
		 	 }
		  	//CHOIX OFFRE
		  	if($(this).hasClass('offre-btn')){
			  	if($(this).parent(".offre").hasClass("active")){
			  		$(this).parent(".offre").removeClass("active");
			  	}else{
			  		$(".offre.active").removeClass("active");
			  		$(this).parent(".offre").addClass("active");

			  	}
		  		//scroll
		  		posElement =$('.isMobile #pricer-mobile .offre.active').offset().top;
		  	}
		  	$('html,body').animate({scrollTop: posElement}, 400);

	  	}



	});


});
