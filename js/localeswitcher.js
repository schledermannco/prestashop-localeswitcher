$( document ).ready(function() {
    var clicked = true;
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
    });
});
