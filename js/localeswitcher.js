(function() {
    document.querySelector('.localeswitcher_toggle').addEventListener('click', function() {
        document.querySelector('.localeswitcher_dropdown').classList.toggle('opening')
 		 window.setTimeout(() => {
 		 document.querySelector('.opening').classList.toggle('opened')
 		 }, 333)
    	
    }, false)
})();