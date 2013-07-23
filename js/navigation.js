/*
Emblem Navigation
Author: Filip Arneric
*/

define(['jquery', 'backbone', 'handlebars', 'mmenu'], function($, Backbone) {	
	
	//Navigation View
	var Navigation = Backbone.View.extend({
		el: $("#navigation"),
		events: {
	        'click .openSub' : 'openSub',
	        'mouseenter #page' : 'closeSub',		
	    },  

		//model: data.navigation,
		    	    	    		
		render: function(){
	    	var self = this;
			var template = self.template({pageInfo: self.submodel, mainNav: data.navigation, subNav: data.subnav});	
			self.$el.html(template); 	
			
			//init mobile menu
	    	$('nav#menu').mmenu({
				slidingSubmenus: false
			});   
			
	    },
	    
	    openSub: function(){
	    	TweenMax.to($(".subNav"), 0.4, { y: 0 });		    
	    },
	    
	    closeSub: function(){
	    	TweenMax.to($(".subNav"), 0.4, { y: '-41px' });		    
	    },
	    
	    renderSubnav: function(){
		  	var self = this,
		  		subtemplate = self.subtemplate({ pageInfo: self.submodel });	
		  		
		  	TweenMax.to(self.subnav, 0.4, { x: -120, opacity: 0, onComplete: function(){
			  	self.subnav.html(subtemplate);
			  	TweenMax.to(self.subnav, 0.4, { x: 0, opacity: 1, delay: 0.5 });	
		  	}});	
		  			   
	    },
	    
	    initialize: function(){
	    	var self = this;	 
	    	self.template = Handlebars.compile(myApp.pages.menu.template);
	    	self.subtemplate = Handlebars.compile(myApp.pages.menu.subtemplate);
	    	//register menu controls
	    	Handlebars.registerHelper('language', function() { return myApp.page.lang });	

	    	//handle resize
			$(window).on('resize', function(){
				if(myApp.page.width>768){
					$("nav#menu").trigger( "close.mm" );
				}
			});		
	    	 					
	    }
	    
	});
	
	return Navigation;
	
});