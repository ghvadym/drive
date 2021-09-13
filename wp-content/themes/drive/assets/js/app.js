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

    var imgTop = document.querySelector('.auto-view__info_wrap');
    setTimeout(() => {
        imgTop.classList.add('load');
    }, 1000);
});

(function($){
    $(document).ready(function() {
        $('.intro__arrow').on('click', () => {
            $('html, body').animate({
                scrollTop: $('#categories').offset().top},
                'slow');
        });

        owlInit('.categories__list.owl-carousel', 4)
        owlInit('.most-pop__list.owl-carousel', 3)

        function owlInit(className, items)
        {
            $(className).owlCarousel({
                nav: false,
                dots: false,
                autoplay: false,
                loop: false,
                items: 1,
                margin: 10,
                touchDrag: true,
                autoWidth: true,
                responsive: {
                    1025: {
                        items: items,
                        mouseDrag: true,
                        touchDrag: false,
                        margin: 20,
                    }
                }
            });
        }
    });
})(jQuery);