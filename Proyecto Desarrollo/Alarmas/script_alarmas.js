window.addEventListener('scroll', function() {
    var mensaje = document.getElementById('mensaje_alarma');
    var banner = document.getElementById('banner_alarma');
    var distanciaDesdeArribaMensaje = mensaje.getBoundingClientRect().top;
    var scrollPosition = window.scrollY;
    
    if (distanciaDesdeArribaMensaje - window.innerHeight <= 0) {
        mensaje.style.opacity = '1';
    } else {
        mensaje.style.opacity = '0';
    }

    if (scrollPosition > 50) {
        banner.classList.add('banner_alarma_blur');
        mensaje.style.opacity = '1';
    } else {
        banner.classList.remove('banner_alarma_blur');
        mensaje.style.opacity = '0';
    }
});
