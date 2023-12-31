
	$.fn.jQuerySimpleCounter = function( options ) {
	    var settings = $.extend({
	        start:  0,
	        end:    200,
	        easing: 'swing',
	        duration: 1000,
	        complete: ''
	    }, options );

	    var thisElement = $(this);

	    $({count: settings.start}).animate({count: settings.end}, {
			duration: settings.duration,
			easing: settings.easing,
			step: function() {
				var mathCount = Math.ceil(this.count);
				thisElement.text(mathCount);
			},
			complete: settings.complete
		});
	};


$('#number1').jQuerySimpleCounter({end: 250,duration: 4000});
$('#number2').jQuerySimpleCounter({end: 100+,duration: 4000});
$('#number3').jQuerySimpleCounter({end: 850,duration: 3000});
$('#number4').jQuerySimpleCounter({end: 100,duration: 3500});



  	/* AUTHOR LINK */
     $('.about-me-img').hover(function(){
            $('.authorWindowWrapper').stop().fadeIn('fast').find('p').addClass('trans');
        }, function(){
            $('.authorWindowWrapper').stop().fadeOut('fast').find('p').removeClass('trans');
        });