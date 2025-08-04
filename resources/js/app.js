import './bootstrap';

// Función para manejar filtros de noticias
function initNewsFilters() {
    const filterButtons = document.querySelectorAll('.news-filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remover clase active de todos los botones
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Agregar clase active al botón clickeado
            this.classList.add('active');
            
            // Obtener la fuente seleccionada
            const selectedSource = this.dataset.source;
            
            // Aquí iría la lógica para filtrar noticias
            // Por ahora solo mostramos en consola
            console.log('Filtro seleccionado:', selectedSource);
            
            // TODO: Implementar filtrado real de noticias
        });
    });
}

// Llamar al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    initNewsFilters();
});
