document.addEventListener('DOMContentLoaded', function () {
    var menu = document.getElementById('menu');
    var burger = document.getElementById('burger');
    burger.onclick = () => {
        menu.classList.toggle('open');
    }

    window.onclick = (e) => {
        var menu = document.getElementById('menu');
        if (!menu.contains(e.target) && !menu.classList.contains('open')) {
            menu.classList.remove('open');
        }
    }
});


// (function ($) {
//     $(document).ready(function () {
//         if ($(window).width() < 767) {
//             $(".terms__list.owl-carousel").owlCarousel({
//                 loop              : true,
//                 items             : 1,
//                 touchDrag         : true,
//                 margin            : 20,
//                 nav               : false,
//                 dots              : false,
//                 autoplay          : true,
//                 autoplayHoverPause: true,
//                 autoplayTimeout   : 2000,
//             });
//         }
//     });
// })(jQuery);