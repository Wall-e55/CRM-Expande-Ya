document.addEventListener('DOMContentLoaded', function() {
    console.log('Aplicación EXPANDE YA cargada');
    
    // Confirmación para eliminar
    document.querySelectorAll('.btn-danger').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (!confirm('¿Está seguro de eliminar este cliente?')) {
                e.preventDefault();
            }
        });
    });
    
    // Aquí puedes añadir más funcionalidades
});