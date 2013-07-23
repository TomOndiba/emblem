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
	        'click .openSub' : 'openSub',
	        'mouseenter #main' : 'closeSub'	
	    },  
	    
	    openSub: function(){
	    	TweenMax.to($(".subNav"), 0.4, { y: 0 });	    
	    },
	    
	    closeSub: function(){	
	    	TweenMax.to($(".subNav"), 0.4, { y: '-40px' });		    
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