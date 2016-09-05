/**
 *  Scroll Motion Library
 */
 
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

/**
 * Basic Element structure
 */
function Elem(myElem,xpA,ypA,xpB,ypB,opacitypA,opacitypB,scrollTop,scrollBottom,moveDown,moveUp){
	this.elem=myElem;
	this.xA=xpA;
	this.yA=ypA;
	this.xB=xpB;
	this.yB=ypB;
	this.opacityA=opacitypA;
	this.opacityB=opacitypB;
	this.scrollStart=scrollTop;
	this.scrollEnd=scrollBottom;
	this.motionDown=moveDown;
	this.motionUp=moveUp;
	this.etat="down";
}

 
 /*
 Builder
 */
 function ScrollMotion(){
 	this.tabElem=[];	
 	this.addElem = function(myElem){
 		if(this.verifyElem(myElem)){
 			this.tabElem.push(myElem);
 		}
 		else {
 			alert(myElem.elem+" : Bad element ...");
 		}
 	}
 	this.verifyElem = function(myElem){
 		if(myElem.scrollStart<myElem.scrollEnd){
 			return true;
 		}
 		else return false;
 	}
 }
 
 
 /*
 Init
*/
function init(myScroll){
	animer(myScroll);
}


function calculerMvt(myScroll){
/*regarde où en est le scroll
	Si on se trouve dans une zone scrollable, on applique la fonction correspondant
*/	
	if(myScroll instanceof ScrollMotion){
		var scrollY=$(document).scrollTop();
		for (var i = 0; i < myScroll.tabElem.length; i++) {//On effectue l'opération pour toute les div du tableau
			if((scrollY>=myScroll.tabElem[i].scrollStart)&&(scrollY<myScroll.tabElem[i].scrollEnd)){//Si on se trouve dans la zone scrollable
				percentDone = (scrollY-myScroll.tabElem[i].scrollStart)/((myScroll.tabElem[i].scrollEnd)-(myScroll.tabElem[i].scrollStart));
				if(myScroll.tabElem[i].etat=="down"){
					//On applique motionDown(div,xA,yA,xB,yB,percentDone);
					myScroll.tabElem[i].motionDown(myScroll.tabElem[i].elem,myScroll.tabElem[i].xA,myScroll.tabElem[i].yA,myScroll.tabElem[i].xB,myScroll.tabElem[i].yB,percentDone);
					//On applique l'opacité en fonction du %.
					if (!(Math.abs(myScroll.tabElem[i].opacityA) == 1 && Math.abs(myScroll.tabElem[i].opacityB) == 1)) {
						$(""+myScroll.tabElem[i].elem+"").css({"opacity":(Math.abs(myScroll.tabElem[i].opacityA+percentDone*(myScroll.tabElem[i].opacityB - myScroll.tabElem[i].opacityA)))});
					}
				}
				else {
					//On applique motionUp(div,xA,yA,xB,yB,(1-percentDone));
					if (myScroll.tabElem[i].motionUp != false) { 
					myScroll.tabElem[i].motionUp(myScroll.tabElem[i].elem,myScroll.tabElem[i].xA,myScroll.tabElem[i].yA,myScroll.tabElem[i].xB,myScroll.tabElem[i].yB,percentDone);
						//On applique l'opacité en fonction du %.
						if (!(Math.abs(myScroll.tabElem[i].opacityA) == 1 && Math.abs(myScroll.tabElem[i].opacityB) == 1)) {
							$(""+myScroll.tabElem[i].elem+"").css({"opacity":(Math.abs(myScroll.tabElem[i].opacityA+percentDone*(myScroll.tabElem[i].opacityB - myScroll.tabElem[i].opacityA)))});
						}
					}
				}
			}
			else if (scrollY<myScroll.tabElem[i].scrollStart) {
				//position : point A
				//$(""+myScroll.tabElem[i].elem+"").css({"top":(myScroll.tabElem[i].yA)+"px", "left":(myScroll.tabElem[i].xA)+"px"});
				myScroll.tabElem[i].motionDown(myScroll.tabElem[i].elem,myScroll.tabElem[i].xA,myScroll.tabElem[i].yA,myScroll.tabElem[i].xB,myScroll.tabElem[i].yB,0);
				if (!(Math.abs(myScroll.tabElem[i].opacityA) == 1 && Math.abs(myScroll.tabElem[i].opacityB) == 1)) {
					$(""+myScroll.tabElem[i].elem+"").css({"opacity":(myScroll.tabElem[i].opacityA)});
				}
				myScroll.tabElem[i].etat = "down";
			}
			else {
				//position : point B
				//$(""+myScroll.tabElem[i].elem+"").css({"top":(myScroll.tabElem[i].yB)+"px", "left":(myScroll.tabElem[i].xB)+"px"});
				myScroll.tabElem[i].motionDown(myScroll.tabElem[i].elem,myScroll.tabElem[i].xA,myScroll.tabElem[i].yA,myScroll.tabElem[i].xB,myScroll.tabElem[i].yB,1);
				if (!(Math.abs(myScroll.tabElem[i].opacityA) == 1 && Math.abs(myScroll.tabElem[i].opacityB) == 1)) {
					$(""+myScroll.tabElem[i].elem+"").css({"opacity":(myScroll.tabElem[i].opacityB)});
				}
				myScroll.tabElem[i].etat = "up";
			}
		}
	}
	else {
		alert("doesn't work ...");
	}
}

function animer(myScroll){
	calculerMvt(myScroll);
	requestAnimFrame(function(){
		animer(myScroll);
	});
}
 
 
 /*
 Motion functions
 */
  
// function droite(nomElem,xA,yA,xB,yB,percentDone){
// 	if(xA==xB){
// 		$(""+nomElem+"").css({"top":(yA+percentDone*(yB-yA))+"px"});
// 	}
// 	else $(""+nomElem+"").css({"top":(yA+percentDone*(yB-yA))+"px", "left":(xA+percentDone*(xB-xA))+"px"});
// }
 
 function exp(nomElem,xA,yA,xB,yB,percentDone){
 	var yAB = yB-yA;
 	var x = Math.ceil(percentDone*100*(xB-xA)/100);
 	$(""+nomElem+"").css({"top":((yAB*(1 - Math.exp((-1)*x/130)))+yA)+"px", "left":(xA+x)+"px"});
 }
 
 function expInt(nomElem,xA,yA,xB,yB,percentDone){
 	$(""+nomElem+"").css({"top":(((yB-yA)*expoInt(percentDone))+yA)+"px", "left":(xA+(xB-xA)*percentDone)+"px"});
 }
 
 function expOut(nomElem,xA,yA,xB,yB,percentDone){
 	$(""+nomElem+"").css({"top":(((yB-yA)*expoOut(percentDone))+yA)+"px", "left":(xA+(xB-xA)*percentDone)+"px"});
 }
 
 function droite(nomElem,xA,yA,xB,yB,percentDone){
 	$(""+nomElem+"").css({"top":Math.ceil((yA+percentDone*(yB-yA)))+"px", "left":Math.ceil((xA+percentDone*(xB-xA)))+"px"});
 }
 
 function marginLeft(nomElem,xA,yA,xB,yB,percentDone){
 	$(""+nomElem+"").css({"margin-left":(xA+percentDone*(xB-xA))+"px"});
 }
 function marginRight(nomElem,xA,yA,xB,yB,percentDone){
 	$(""+nomElem+"").css({"margin-right":(xA+percentDone*(xB-xA))+"px"});
 }
 function parralax(nomElem,xA,yA,xB,yB,percentDone){
 	$(""+nomElem+"").css({"top":(yA+percentDone*(yB-yA))+"px"});
 }
 
function expoInt(t){
 	var b=0;
 	var c=1;
 	var d=1;
 	return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
 }
 
 function expoOut(t){
 	var b=0;
 	var c=1;
 	var d=1;
 	return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
 }
