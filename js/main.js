/*
Dreamhouse main script
Copyright Kitchen S.R.O. May 2013. 
Author: Filip Arneric
*/

define(['jquery', 'backbone'], function($, Backbone) {

	
	 //Navigation routes
	 var Main = Backbone.View.extend({   
	    el: 'body', 
	    overState: false,	 
	    hideState: false,
	    
	    events: {
	        'click .link' : 'changeRoute',
	        'click .lang' : 'changeLang',
	        'click' : 'showMenu',
	        'mousemove' : 'showMenu',
	        'click .shareBtn' : 'openShare',
	        'click .fb' : 'fbLike',
	        'mouseover .navbar': 'menuIn',	 
	        'mouseleave .navbar': 'menuOut',       
	        'mouseover .hoverBox': 'drawSeq',
			'mouseleave .hoverBox': 'eraseSeq'			
	    },  
	    	    	
	    changeRoute: function(e) {
	        e.preventDefault();
	        myApp.page.firstInit = false;
			var href = $(e.currentTarget).attr("href").replace(absurl,'');
	        myApp.router.navigate(href, true);
	    },
	    
	    changeLang: function(e){
	    	e.preventDefault();
	    	var lang = (window.myApp.page.lang=="en") ? "cz" : "en";   	
	    	var href = lang + "/" + myApp.page.activepage;	
	    	myApp.router.navigate(href, true);
	    },
	    	    
	    initialize: function(){	    	
	    	var self = this;		
	    	
	    	$('.slideShow').backstretch([
			  'path/to/image.jpg',
			  'path/to/image2.jpg',
			  'path/to/image3.jpg'
			]);
	    	    
	    }
	
	});		
	
	return Main;
	
})