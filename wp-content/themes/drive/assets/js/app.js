document.addEventListener('DOMContentLoaded', function () {
    var menu = document.getElementById('menu');
    var burger = document.getElementById('burger');
    burger.onclick = () => {
        if (!menu.classList.contains('open')) {
            menu.classList.add('open');
        }
    }

    window.onclick = (e) => {
        if (!menu.contains(e.target) && !burger.contains(e.target)) {
            menu.classList.remove('open');
        }
    }

    var closeMenu = document.querySelectorAll('.trigger-close');
    closeMenu.forEach((item) => {
        item.onclick = () => {
            menu.classList.remove('open');
        }
    });
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