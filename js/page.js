/*
Emblem Page
Author: Filip Arneric
*/

define(['jquery', 'backbone', 'handlebars', 'royalslider', 'imgLiquid', 'backstretch'], function($, Backbone) {

	var Page = Backbone.View.extend({
			el: '#main',
			firstInit: true,
			scripts: {		
					
				homePage: function(){
					$('#full-width-slider').royalSlider({
					    loop: true,
					    keyboardNavEnabled: true,
					    controlsInside: false,
					    imageScaleMode: 'fill',
					    slidesSpacing: 0,
					    imageScalePadding: 0,
					    arrowsNavAutoHide: false,
					    controlNavigation: 'none',
					    fadeinLoadedSlide: true,
					    autoPlay: {
				    		enabled: true,
				    		pauseOnHover: false,
				    		delay: 4000
				    	}
					  });
				},					
			},
			
			render: function(){
				var self = this,
					model = myApp.pages[self.activepage]['collection'][self.lang]
			

			 self.model = model;
		   	/*
	//set model - if subpages
		   		if(self.param){		   				   		
			   		if(self.mainPage!='news'){
			   			model =  _.filter(model, function(data){ return data.folder == self.param })[0];
				   		category = (model.category) ? (model.category) : "";   	
				   		var name = (model.name) ? model.name : self.param;
				   		myApp.navigation.submodel = name + " " + "<span>" + category + "</span>";
				   		self.model = model.objects;	
			   		}else{
			   			self.model =  _.filter(model, function(data){ return data.id == self.param })[0];
				   		myApp.navigation.submodel = 'News <span>' + self.model.headline + '</span>';
			   		}		   				   			   		
		   		}else{
			   		self.model = model;
		   		}
*/
				
	   		
		   		//compile template
		   		var template = Handlebars.compile(window.myApp.pages[self.activepage]['template']);	
		   		
		   		self.template = template({ data: self.model, lang:self.lang, page:self.mainPage, subpage:self.param, model:model });		
		   		self.$("#page").html(self.template).removeClass().addClass(self.activepage);  			 	
				//init scripts
			 	self.scripts[window.myApp.pages[self.activepage].scripts]();		
			 	
			 	if(self.firstInit){
				 	self.$("#slideshow").backstretch([
					    absurl+"/img/home/hotel1.jpg",
					    absurl+"/img/home/hotel2.jpg"  
					], {duration: 4000, fade: 800});
			 	}	

			},

			
			initialize: function(){
				var self = this;		
							
				_.bindAll(this, 'render');
				self.width = $(window).width();
				
				Handlebars.registerHelper('menuText', function(items) {
				  var text = self.lang == 'cz' ? items.text.cz : items.text.en;
				  return new Handlebars.SafeString(text);  
				});	
						
				//handle resize
				$(window).on('resize', function(){
				
				});		
			}
			
	});
	
	return Page;

});