/*
Dreamhouse Router
Copyright Kitchen S.R.O. May 2013. 
Author: Filip Arneric
*/
define(['jquery', 'backbone'], function($, Backbone) {
			
	//Router
	var Router = Backbone.Router.extend({
		routes: {
	       ":lang": "render",
	       ":lang/:mod(/)": "render",
       	   ':lang/:mod/:id(/)': 'render',
       	   ':lang/:mod/:id/:subid(/)': 'render'
   		 },
   		 
    	render: function(lang, mod, id, subid,slide) {
    	
    	    		
   		   var self = this;	   
		   mod = mod || 'home';   
		   var langchange = (myApp.page.lang != lang) ? true : false;
		   myApp.page.lang = lang;	   
		   myApp.page.activepage = mod;  

		   myApp.page.mainPage = mod;
		   myApp.page.param = (id) ? id : '';   
		   myApp.page.subparam = (subid) ? subid : '';
		   myApp.page.render();			  
		   
		   //render navigation on firstInit
		   if (myApp.page.firstInit || langchange) { 
	   	   		myApp.navigation.render(); //: window.myApp.navigation.renderSubnav();	
		   }
		},
		
	    initialize: function(){
		   var self = this;
		   Backbone.history = Backbone.history || new Backbone.History({});
		   var root = "~filip/emblem/";
		   var enablePushState = true;
		   var pushState = !! (enablePushState && window.history && window.history.pushState);
	       Backbone.history.start({
			   pushState: pushState,
		       root: root
		   });        
	    }
	    
	});
	
	return Router;

});