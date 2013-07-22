/*
Dreamhouse Main
Copyright Kitchen S.R.O. May 2013. 
Author: Filip Arneric
*/
require.config({
	urlArgs: "noCache=" + (new Date).getTime(),
    baseUrl: 'http://localhost/~filip/emblem/js/',
    waitSeconds: 120,
    dir: "../webapp-build",
    paths: {
 		'modernizr': 'vendor/modernizr-2.6.2.min',
        'jquery': 'vendor/jquery.min',
 		'jqueryMigrate': 'vendor/jquery-migrate.min',
        'underscore': 'vendor/underscore-min',
        'backbone': 'vendor/backbone-min',
        'handlebars': 'vendor/handlebars',
        'text': 'vendor/text',
        'async': 'vendor/async',
 		'noext': 'vendor/noext',
        'bootstrap': 'vendor/bootstrap.min',
        'smartresize': 'libs/smartresize',
 		'gsap': 'libs/jquery.gsap.min',
        'tweenmax': "libs/TweenMax.min",
        'royalslider': 'libs/jquery.royalslider.min',
        'pxloader': 'libs/pxloader',
        'pxloadertags': 'libs/pxloadertags',
        'pxloaderimage': 'libs/pxloaderimage',
        'pxloadervideo': 'libs/pxloadervideo',
        'imgLiquid': "libs/imgLiquid-min",
        'backstretch': "libs/jquery.backstretch",
        'fittext': "libs/fittext",
    },
    shim: {
        bootstrap: {
            deps: ['jquery'],
            exports: 'Bootstrap'
        },
 	    
        smartresize: {
            deps: ['jquery'],
            exports: 'Smartresize'
        },
 
 	 	imgLiquid: {
            deps: ['jquery']
        },
 
  	 	backstretch: {
            deps: ['jquery']
        },

        royalslider: {
            deps: ['jquery','jqueryMigrate'],
            exports: 'Royalslider'
        },
 
		jqueryMigrate: {
            deps: ['jquery']
        },

  		gsap: {
            deps: ['jquery']
        },
  

        fittext: {
            deps: ['jquery']
        },
        
        tweenmax: {
            deps: ['jquery']
        }
        

    }
});

require([
	"router", 
	"page", 
	"navigation", 
	"main", 
	"text!../view_menu", 
	"text!../view_subnav", 
	"text!../view_home", 
	"noext!http://localhost/~filip/emblem/data",
	"bootstrap",
	"script", 
	"modernizr",
	//"bird",
	"tweenmax"
	],function (Router, Page, Navigation, Main, menuTemplate, menusubTemplate, homeTemplate, aboutTemplate, newsTemplate, newsDetailTemplate, brandsTemplate, designersTemplate, designerPreviewTemplate, servicesTemplate, contactTemplate) { 
	
	window.myApp = {
		init: function(){
			this.page = new Page(),
			this.navigation = new Navigation(),
			this.router = new Router(),
			this.main = new Main()
		},
		pages: {
			menu: {
				template: menuTemplate,
				subtemplate: menusubTemplate
			},
			
			home: {
				template: homeTemplate,
				collection: {
					en : data.home.en,
					cz : data.home.cz
				},
				scripts: 'homePage'
			}
						
				
		}
	}	
	
	window.myApp.init();
	
})