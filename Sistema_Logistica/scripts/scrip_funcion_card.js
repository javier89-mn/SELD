document.addEventListener('DOMContentLoaded', function () {
    const toggleMenu = document.getElementById('toggleMenu');
    const sidebar = document.querySelector('.sidebar');
    const content = document.querySelector('.content');
    const links = document.querySelectorAll('.sidebar ul li a');
    const cards = document.querySelectorAll('.card');
    
    // 🔹 Función para comprimir/expandir el menú lateral
    toggleMenu.addEventListener('click', function () {
        sidebar.classList.toggle('compressed');
        content.classList.toggle('expanded');
    });
    
    // 🔹 Ocultar todas las cards al inicio, excepto la primera
    cards.forEach(card => card.classList.remove('active'));
    if (cards.length > 0) {
        cards[0].classList.add('active');
    }
    
    // 🔹 Manejar clics en los enlaces del menú
    links.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault(); // Evitar la recarga de la página

            // Obtener la URL del enlace
            const targetURL = this.getAttribute('href');

            // Si tiene una URL válida, redirigir al usuario
            if (targetURL && targetURL !== "#") {
                window.location.href = targetURL;
                return;
            }

            // Remover la clase 'active' de todos los enlaces y cards
            links.forEach(link => link.classList.remove('active'));
            cards.forEach(card => card.classList.remove('active'));
    
            // Añadir la clase 'active' al enlace seleccionado
            this.classList.add('active');
    
            // Mostrar la card correspondiente
            const targetSection = this.getAttribute('data-section');
            const targetCard = document.getElementById(targetSection);
            if (targetCard) {
                targetCard.classList.add('active');
            }
    
            // Si es la sección de trazabilidad, inicializar el mapa
            if (targetSection === 'trazabilidad') {
                initMap();
            }
        });
    });
});

// 🔹 Alternar entre modo claro y oscuro
document.getElementById("themeToggle").addEventListener("click", function() {
    document.body.classList.toggle("dark-mode");
    this.textContent = document.body.classList.contains("dark-mode") 
        ? "Cambiar a Tema Claro" 
        : "Cambiar a Tema Oscuro";
});
