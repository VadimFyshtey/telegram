;(function scrollTop() {

    var scrolled, timer;
    var top = document.getElementById('top');

    top.onclick = function () {
        scrolled = window.pageYOffset;
        scrollToTop();
    }
    function scrollToTop() {
        if(scrolled > 0){
            window.scrollTo(0, scrolled);
            scrolled = scrolled - 100;
            timer = setTimeout(scrollToTop, 25);
        } else {
            clearTimeout(timer);
            window.scrollTo(0, 0);
            top.style.display = 'none';
        }
    }

    document.onmousewheel = function (e) {
        if(window.screen.width >= 1026){
            if(e.pageY >= 1300){
                top.style.display = 'block';
            } else if(e.pageY <= 1300) {
                top.style.display = 'none';
            }
        }
    }
})();