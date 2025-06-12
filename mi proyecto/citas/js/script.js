document.addEventListener('DOMContentLoaded', () => {
    const btnVisitantes = document.getElementById('btn-visitantes');
    const btnClientesLista = document.getElementById('btn-clientes-lista');
    const btnDesignacion = document.getElementById('btn-designacion');
    const btnNotificaciones = document.getElementById('btn-notificaciones');
    const btnBuscar = document.getElementById('btn-buscar');
    const buscarInput = document.getElementById('buscar');

    const tablaVisitantes = document.getElementById('tabla-visitantes');
    const listaClientes = document.getElementById('lista-clientes');
    const panelDesignacion = document.getElementById('panel-designacion');
    const panelNotificaciones = document.getElementById('panel-notificaciones');

    const botonesSecundarios = document.querySelectorAll('.secondary-nav button');

    // Función para mostrar un panel y ocultar los demás
    function mostrarPanel(panel) {
        tablaVisitantes.classList.add('hidden');
        listaClientes.classList.add('hidden');
        panelDesignacion.classList.add('hidden');
        panelNotificaciones.classList.add('hidden');
        panel.classList.remove('hidden');

        botonesSecundarios.forEach(btn => btn.classList.remove('active'));
        if (panel === tablaVisitantes) {
            btnVisitantes.classList.add('active');
        } else if (panel === listaClientes) {
            btnClientesLista.classList.add('active');
        } else if (panel === panelDesignacion) {
            btnDesignacion.classList.add('active');
        } else if (panel === panelNotificaciones) {
            btnNotificaciones.classList.add('active');
        }
    }

    // Event listeners para los botones de la navegación secundaria
    btnVisitantes.addEventListener('click', () => mostrarPanel(tablaVisitantes));
    btnClientesLista.addEventListener('click', () => {
        mostrarPanel(listaClientes);
        cargarClientes(); // Llamar a la función para cargar la lista de clientes
    });
    btnDesignacion.addEventListener('click', () => mostrarPanel(panelDesignacion));
    btnNotificaciones.addEventListener('click', () => {
        mostrarPanel(panelNotificaciones);
        cargarNotificaciones(); // Llamar a la función para cargar las notificaciones
    });

    // Event listener para el botón de buscar en la tabla de visitantes
    btnBuscar.addEventListener('click', () => {
        const textoBusqueda = buscarInput.value.toLowerCase();
        const filasTabla = tablaVisitantes.querySelectorAll('tbody tr');

        filasTabla.forEach(fila => {
            const nombre = fila.querySelector('td:nth-child(1)').textContent.toLowerCase();
            const razonSocial = fila.querySelector('td:nth-child(2)').textContent.toLowerCase();

            if (nombre.includes(textoBusqueda) || razonSocial.includes(textoBusqueda)) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });

    // Simulación de carga de datos para clientes (reemplazar con lógica real de tu aplicación)
    function cargarClientes() {
        const clientes = ['Ana Pérez', 'Carlos López', 'Sofía Gómez', 'Martín Vargas'];
        listaClientes.querySelector('ul').innerHTML = clientes.map(cliente => `<li>${cliente}</li>`).join('');
    }

    // Simulación de carga de datos para notificaciones (reemplazar con lógica real de tu aplicación)
    function cargarNotificaciones() {
        const notificaciones = ['Nuevo cliente registrado: Ana Pérez', 'Cita reprogramada para Carlos López', 'Recordatorio de pago para Sofía Gómez'];
        panelNotificaciones.querySelector('ul').innerHTML = notificaciones.map(notificacion => `<li>${notificacion}</li>`).join('');
    }

    // Mostrar el panel de visitantes por defecto al cargar la página
    mostrarPanel(tablaVisitantes);
    document.getElementById('btn-chatbot').addEventListener('click', function() {
    window.location.href = 'chatbot.html';
    
});

});