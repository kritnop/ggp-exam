$(document).ready(function() {
	$.fn.bounce = function(settings) {
    if(typeof settings.interval == 'undefined') {
      settings.interval = 100;
    }
    if(typeof settings.distance == 'undefined') {
      settings.distance = 2;
    }
    if(typeof settings.times == 'undefined') {
      settings.times = 10;
    }
    if(typeof settings.complete == 'undefined') {
      settings.complete = function(){};
    }
    $(this).css('position','relative');
    for(var iter=0; iter<(settings.times+1); iter++) {
      $(this).animate({ top:((iter%2 == 0 ? settings.distance : settings.distance * -1)) }, settings.interval);
    }
    $(this).animate({ top: 0}, settings.interval, settings.complete);  
  };
  $.fn.go = function(settings) {
  	if(typeof settings.interval == 'undefined') {
      settings.interval = 100;
    }
    if(typeof settings.distance == 'undefined') {
      settings.distance = 100;
    }
    if(typeof settings.times == 'undefined') {
      settings.times = 1;
    }
    if($( window ).width() / 2 <  Math.abs($(this).position().left + settings.distance) ) {
    	alert('End of the road!');
    	return false;
    } 
    $(this).animate({ left:($(this).position().left + settings.distance) }, { duration: settings.interval, queue: false });
  }
	$(document).keydown(function(e) {
	  if((e.keyCode || e.which) == 37) {   
	  	$( ".truck" ).bounce({
        interval: 100,
        distance: 1,
        times: 10
      });
      $( ".truck" ).go({
        interval: 1000,
        distance: -200,
        times: 1
      });
    }
    if((e.keyCode || e.which) == 39) {
    	$( ".truck" ).bounce({
        interval: 100,
        distance: 2,
        times: 7
      });
      $( ".truck" ).go({
        interval: 700,
        distance: 200,
        times: 1
      });
    }   
	});
});