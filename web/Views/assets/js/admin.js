// ============================================
// ADMIN PANEL - JAVASCRIPT
// ============================================

// Variables globales
let currentView = 'dashboard';

// ============================================
// INICIALIZACIÓN
// ============================================
document.addEventListener('DOMContentLoaded', function () {
    initSidebar();
    initNavigation();
});

// ============================================
// SIDEBAR FUNCTIONALITY
// ============================================
function initSidebar() {
    const toggleBtn = document.getElementById('toggleSidebar');
    const closeBtn = document.getElementById('closeSidebar');
    const sidebar = document.getElementById('sidebar');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('show');
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            sidebar.classList.remove('show');
        });
    }

    // Cerrar sidebar al hacer click fuera en móviles
    document.addEventListener('click', function (e) {
        if (window.innerWidth <= 991) {
            if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        }
    });
}

// ============================================
// NAVEGACIÓN ENTRE VISTAS
// ============================================
function initNavigation() {
    const navItems = document.querySelectorAll('.nav-item');

    navItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            // Remover clase activa de todos los items
            navItems.forEach(nav => nav.classList.remove('active'));

            // Añadir clase activa al item clickeado
            this.classList.add('active');

            // Obtener la vista a mostrar
            const viewName = this.getAttribute('data-view');
            switchView(viewName);

            // Cerrar sidebar en móviles
            if (window.innerWidth <= 991) {
                document.getElementById('sidebar').classList.remove('show');
            }
        });
    });
}

function switchView(viewName) {
    // Ocultar todas las vistas
    const views = document.querySelectorAll('.view');
    views.forEach(view => view.classList.remove('active'));

    // Mostrar la vista seleccionada
    const targetView = document.getElementById(viewName + '-view');
    if (targetView) {
        targetView.classList.add('active');
        currentView = viewName;

        // Actualizar título del top bar
        updateTopBarTitle(viewName);
    }
}

function updateTopBarTitle(viewName) {
    const titleElement = document.querySelector('.current-view-title');
    const titles = {
        'dashboard': 'Dashboard',
        'personas': 'Gestión de Personas',
        'configuracion': 'Configuración'
    };

    if (titleElement && titles[viewName]) {
        titleElement.textContent = titles[viewName];
    }
}

// ============================================
// UTILIDADES
// ============================================

// Formatear fecha (útil si lo necesitas en algún momento)
function formatDate(dateString) {
    if (!dateString) return '-';

    const date = new Date(dateString);
    const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    return date.toLocaleDateString('es-ES', options);
}

// ============================================
// NOTAS PARA INTEGRACIÓN PHP
// ============================================
// Este archivo solo contiene la funcionalidad de navegación del panel.
// Las operaciones CRUD (crear, editar, eliminar) deben implementarse con PHP.
//
// Para integrar con PHP:
// 1. Crea un controlador PHP que maneje las acciones (PersonController.php)
// 2. En admin.php, procesa $_POST para guardar/editar personas
// 3. Usa $_GET para acciones como editar o eliminar (?action=edit&id=1)
// 4. Renderiza la tabla de personas directamente con PHP en el tbody
//
// Ejemplo de cómo procesar el formulario en PHP:
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $nombre = $_POST['nombre'];
//     $apellido = $_POST['apellido'];
//     $email = $_POST['email'];
//     // ... guardar en base de datos
// }
