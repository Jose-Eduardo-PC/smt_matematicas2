$('.btn_abrir').on('click', function () {
    $('#sidenav-main').toggleClass('side');
    $('.main-content').toggleClass('width-100');
});

// JavaScript
const menuBtn = document.querySelector('.menu-btn');
const menuIcon = document.querySelector('.menu-btn i');
menuBtn.addEventListener('click', () => {
    menuBtn.classList.toggle('open');
    menuIcon.classList.toggle('fa-bars');
    menuIcon.classList.toggle('fa-times');
});

// Obtener todos los elementos li del sidebar
var navItems = document.querySelectorAll('.sidenav .nav-item');
navItems.forEach(function (navItem) {
    // Obtener el enlace dentro del elemento li
    var navLink = navItem.querySelector('.nav-link');
    // Crear un objeto URL a partir del href del enlace
    var linkUrl = new URL(navLink.href);
    // Obtener la primera parte de la ruta del enlace (por ejemplo, "/users" para "/users/create")
    var linkPathFirstPart = linkUrl.pathname.split('/')[1];
    // Obtener la última parte de la ruta de la URL actual
    var currentPathLastPart = window.location.pathname.split('/').pop();
    // Verificar si la primera parte de la ruta del enlace coincide con la primera parte de la ruta de la URL actual
    if (linkPathFirstPart === window.location.pathname.split('/')[1]) {
        // Si coincide, agregar la clase .active al elemento li
        navItem.classList.add('active');
        if (!isNaN(currentPathLastPart)) {
            // Si es así, agregar una "C" al enlace y resaltarla con un color
            navLink.innerHTML += '<span style="color:blue;">&nbsp;Ver</span>';
        }
    }
});
