/*
 * Superfish v1.21 - jQuery menu widget
 *
 * Copyright (c) 2007 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * last altered: 2nd July 07. added hide() before animate to make work for jQuery 1.1.3
 */

(function($){
	$.fn.superfish = function(o){
		var $sf = this,
			defaults = {
			hoverClass	: 'sfHover',
			pathClass	: 'overideThisToUse',
			delay		: 500,
			animation	: {opacity:'show'},
			speed		: 'normal'
		},
			over = function(){
				var $$ = $(this);
				clearTimeout(this.sfTimer);
				if (!$$.is('.'+o.hoverClass)){
					$$.addClass(o.hoverClass)
						.find('ul')
							.hide()
							.animate(o.animation,o.speed)
							.end()
						.siblings()
						.removeClass(o.hoverClass);
				}
			},
			out = function(){
				var $$ = $(this);
				if ( !$$.is('.'+o.bcClass) ) {
					this.sfTimer=setTimeout(function(){
						$$.removeClass(o.hoverClass)
						.find('iframe', this)
							.remove();
						if (!$('.'+o.hoverClass,$sf).length) { over.call($currents); }
					},o.delay);
				}
			};
		$.fn.applyHovers = function(){
			return this[($.fn.hoverIntent) ? 'hoverIntent' : 'hover'](over,out);
		};
		o = $.extend({bcClass:'sfbreadcrumb'},defaults,o || {});
		var $currents = $('.'+o.pathClass,this).filter('li[ul]');
		if ($currents.length) {
			$currents.each(function(){
				$(this).removeClass(o.pathClass).addClass(o.hoverClass+' '+o.bcClass);
			});
		}
		var sfHovAr=$('li[ul]',this)
			.applyHovers(over,out)
			.find("a").each(function(){
				var $a = $(this), $li = $a.parents('li');
				$a.focus(function(){ $li.each(over); })
				  .blur(function(){ $li.each(out); });
			}).end();
		$(window).unload(function(){
			sfHovAr.unbind('mouseover').unbind('mouseout');
		});
		return this.addClass('superfish');
	};
})(jQuery);