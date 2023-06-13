var theSlide = 2,
    numSlides = 5,
    frequency = 6500,
    lastButton = "#quote-1";

var slide = function(){
    var	currentSlide = "#quote-"+theSlide+"-content",
				lastSlide = lastButton+"-content",
        currentButton = "#quote-"+theSlide;

    $(".slider-quote").removeClass("in-focus");
    $(".quote-control").removeClass("selected");
    $(currentSlide).addClass("in-focus");
    $(currentButton).addClass("selected");


    lastButton = currentButton;
    if(theSlide < numSlides){
        theSlide += 1;
    }
    else{
        theSlide = 1;
    }
};

var interval = setInterval(slide, frequency);

$(function(){

    $("div#quote-slider").mouseover(function(){
        clearInterval(interval);
    }).mouseout(function(){
        interval = setInterval(slide, frequency);
    });
  
  	$(".quote-control").click(function(e){
      	clearInterval(interval);
        $(".slider-quote").removeClass("in-focus");
    		$(".quote-control").removeClass("selected");
      	var quoteSlider = "#"+$(this).attr("id")+"-content";
      	$(quoteSlider).addClass("in-focus");
      	$(this).addClass("selected");
      	$("div#quote-slider").unbind('mouseover mouseout');
    });

});