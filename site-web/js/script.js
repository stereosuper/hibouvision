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


	function scrollToAnchor(id){
	    $('html,body').animate({scrollTop: $(id).offset().top-$("header").outerHeight()+10}, 400);
	}


	//////////////////////////////////////////////////
	////////////////////// INIT //////////////////////
	//////////////////////////////////////////////////

	if(isMobile.any){
		$('html').addClass('isMobile');
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
});
