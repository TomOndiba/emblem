/*Draw Hover plugin
	Author : Filip Arneric
*/ 
(function($) {
    $.fn.drawHover = function(options) {	
	    var canvas = this,
	    	folder = absurl+"img/blackSeq/",
	    	parent = canvas.parents(".hoverBox"),
	    	hover = parent.find("h4"),
	    	cnv = $(canvas)[0],
	    	context = cnv.getContext('2d'),
	    	imageObj = new Image(),
			cv = cnv.width,
			ch = cnv.height,
			i = 0;		
							    
    	(function drawloop() {		
			setTimeout(function(){requestAnimFrame(drawloop)},32);
			var	dir = (canvas.hasClass("drawing")) ? true : false,	
				src = folder+i+".png";	
			i=dir?13>i?++i:i:i>=0?--i:i;
			imageObj.src = src;	
						
			imageObj.onload = function() {
				context.clearRect(0, 0, cv, ch), context.drawImage(imageObj, 0, 0, cv, ch)
		    };	
		    
		    if(i==0 && dir){
			    $(canvas).addClass("animating");
		    }else if(i==0 && !dir){
			    $(canvas).removeClass("animating");
		    }
		    	
		    if(i==13 && dir){
		    	$(canvas).removeClass("animating");
			    TweenMax.to(hover, 0.4, { y: 0, opacity:1 });
		    }else if(i==12 & !dir){
		    	TweenMax.to(hover, 0.4, { y: 30, opacity:0 });
		    }	
		    						    	
		})();		
    };
})(jQuery);
    