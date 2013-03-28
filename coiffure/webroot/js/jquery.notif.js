// JavaScript Document
(function($){
	
	// Si on veut appeller sans le sélecteur :)
	$.notif = function(options){
		$('body').notif(options);
	}
	
	$.fn.notif = function(options){
		var settings = {
			html : '<div class="notification {{cls}}">\
          <div class="notif-left">\
          	{{#icon}}\
            <div class="icon">\
              {{{icon}}}\
            </div>\
            {{/icon}}\
            {{#img}}\
            <div class="img" style="background-image:url({{img}});"></div>\
            {{/img}}\
          </div>\
          <div class="notif-right">\
            <h2>{{title}}</h2>\
            <p>{{content}}</p>\
          </div>\
        </div>',
			icon:'&#128100;',
        	timeout:3000
		}
		
		if(options.cls == 'error'){
			settings.icon = '&#10060;'
		}
		if(options.cls == 'success'){
			settings.icon = '&#10003;'
		}
		
		var options = $.extend(settings, options);
		
		return this.each(function(){
			var $elem = $(this);
			var	$notif = $('> .notif',this);
			var $render = $(Mustache.render(options.html,options));
			if($notif.length == 0){
				$notif = $('<div class="notif"/>');
				$elem.append($notif);
			}
			$notif.append($render);
			if(options.timeout){
				setTimeout(function(){
					$render.trigger('click');
				},options.timeout)
			}
			$render.click(function(event){
				event.preventDefault();
				$render.addClass('out').delay(500).slideUp(100, function(){
					if($render.siblings().length == 0)
						$notif.remove();
					$render.remove();
				});
			})
		})
	}
})(jQuery);