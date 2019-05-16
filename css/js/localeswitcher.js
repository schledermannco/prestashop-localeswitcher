(function() {
    document.querySelector('.localeswitcher_toggle').addEventListener('click', function() {
        console.log('clicked');
        document.querySelector('.localeswitcher_dropdown').classList.toggle('opened')
    }, false)
})();