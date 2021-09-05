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