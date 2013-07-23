define(['jquery', 'backbone', 'handlebars'], function($, Backbone) {
	'use strict';

	var Footer = Backbone.View.extend({

		el: $('#footer'),

		events: {
			'click a#toggle-footer' : 'toggleFooter'
		},

		initialize: function() {
			var that = this;

			that.template = Handlebars.compile(myApp.pages.footer.template);
			Handlebars.registerHelper('language', function() { return myApp.page.lang; });
		},

		render: function() {
			var that = this,
				template = that.template,
				wrapper = $('#footer-wrapper');

			that.$el.html(template);
			that.height = that.$el.outerHeight();
		},

		toggleFooter: function() {
			var that = this,
				distance = that.height - 68;

			distance = (that.$el.hasClass('down')) ? -distance : 0;
			TweenMax.to(that.$el, 0.5, {css: {y: distance}, ease: Power4.easeInOut, onComplete: that.setStateFlag});
		},

		setStateFlag: function() {
			var el = $('#footer'),
				flag = el.hasClass('down'),
				togglerArrow = $('#toggle-footer > span.arrow'),
				togglerText = $('#toggle-footer > span.text'),
				theRest = $('.the-rest'),
				newClass, oldClass, text, opacity, rotation;

			flag ? (newClass = 'up', oldClass = 'down', text = 'less', opacity = 1, rotation = 180) 
				 : (newClass = 'down', oldClass = 'up', text = 'more', opacity = 0, rotation = 0);

			el.removeClass(oldClass).addClass(newClass);
			TweenMax.to(togglerArrow, 0.3, {css: {rotation: rotation}});
			togglerText.html(text);
			TweenMax.to(theRest, 0.5, {css: {opacity: opacity}});
		}

	});

	return Footer;

});