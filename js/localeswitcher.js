// (function() {
// console.log('ready');
//     document.querySelector('.localeswitcher_toggle').addEventListener('click', function() {
//     console.log('clicked');
//         document.querySelector('.localeswitcher_dropdown').classList.toggle('opening')
//  		 window.setTimeout(() => {
//  		 document.querySelector('.opening').classList.toggle('opened')
//  		 }, 333)
    	
//     }, false)
// })();


// A $( document ).ready() block.
$( document ).ready(function() {

var clicked = false;

	$('.localeswitcher_toggle').on('click', function(e) {
  	
    	
    	if(clicked) {
            clicked = false;
        	$('.localeswitcher_dropdown').addClass("opening")

         	window.setTimeout(() => {
        		$('.localeswitcher_dropdown').addClass('opened')
         	}, 333)  
        }
        else {
            clicked = true;
        	$('.localeswitcher_dropdown').removeClass("opened")

         	window.setTimeout(() => {
        		$('.localeswitcher_dropdown').removeClass('opening')
         	}, 1) 
        }
    
    // .queue(function(){      
    //   $('.localeswitcher_dropdown').
    //   toggleClass('opened')
    //   .dequeue();
    // });
       
      return false;
    });
});