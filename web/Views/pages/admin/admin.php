<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/Views/assets/css/admin.css">
</head>

<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h4><i class="bi bi-shield-lock"></i> Admin Panel</h4>
                <button class="btn-close-sidebar d-lg-none" id="closeSidebar">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                <a href="#" class="nav-item active" data-view="dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item" data-view="personas">
                    <i class="bi bi-people"></i>
                    <span>Gestión de Personas</span>
                </a>
                <a href="#" class="nav-item" data-view="configuracion">
                    <i class="bi bi-gear"></i>
                    <span>Configuración</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="user-info">
                    <i class="bi bi-person-circle"></i>
                    <div class="user-details">
                        <span class="user-name"><?= $_SESSION["user"]["name"] ?? "Admin" ?></span>
                        <span class="user-role">Administrador</span>
                    </div>
                </div>
                <a href="/logout" class="btn-logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Cerrar Sesión</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <header class="top-bar">
                <button class="btn-toggle-sidebar" id="toggleSidebar">
                    <i class="bi bi-list"></i>
                </button>
                <h5 class="current-view-title">Dashboard</h5>
                <div class="top-bar-actions">
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-bell"></i>
                    </button>
                </div>
            </header>

            <!-- Content Area -->
            <main class="content-area">
                <!-- Dashboard View -->
                <div class="view active" id="dashboard-view">
                    <h2 class="mb-4">Bienvenido al Panel de Administrador</h2>

                    <div class="row g-4">
                        <div class="col-md-6 col-lg-3">
                            <div class="stat-card stat-card-primary">
                                <div class="stat-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="stat-details">
                                    <h3 class="stat-number">0</h3>
                                    <p class="stat-label">Total Personas</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="stat-card stat-card-success">
                                <div class="stat-icon">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <div class="stat-details">
                                    <h3 class="stat-number">0</h3>
                                    <p class="stat-label">Activos</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="stat-card stat-card-warning">
                                <div class="stat-icon">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <div class="stat-details">
                                    <h3 class="stat-number">0</h3>
                                    <p class="stat-label">Pendientes</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="stat-card stat-card-danger">
                                <div class="stat-icon">
                                    <i class="bi bi-calendar-event"></i>
                                </div>
                                <div class="stat-details">
                                    <h3 class="stat-number">0</h3>
                                    <p class="stat-label">Este Mes</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Actividad Reciente</h5>
                                    <p class="text-muted">No hay actividad reciente para mostrar.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personas View -->
                <div class="view" id="personas-view">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Gestión de Personas</h2>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#personaModal">
                            <i class="bi bi-plus-circle me-2"></i>Añadir Persona
                        </button>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                            <th>Fecha Nac.</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="personasTableBody">
                                        <!-- Aquí se cargarán las personas desde PHP -->
                                        <?php
                                        // Ejemplo de cómo iterar personas desde PHP:
                                        foreach ($personas as $persona) {
                                            echo '<tr>';
                                            echo '<td>' . $persona['id_persona'] . '</td>';
                                            echo '<td>' . $persona['name_persona'] . '</td>';
                                            echo '<td>' . $persona['lastname_user'] . '</td>';
                                            echo '<td>' . $persona['email_user'] . '</td>';
                                            echo '<td>' . ($persona['phone_persona'] ?? '-') . '</td>';
                                            echo '<td>' . ($persona['address_persona'] ?? '-') . '</td>';
                                            echo '<td>' . $persona['birth_date_persona'] . '</td>';
                                            echo '<td>';
                                            echo '<a href="?action=edit&id=' . $persona['id_persona'] . '" class="btn-action btn-edit me-2">';
                                            echo '<i class="bi bi-pencil"></i> Editar</a>';
                                            echo '<a href="?action=delete&id=' . $persona['id_persona'] . '" class="btn-action btn-delete" onclick="return confirm(\'¿Eliminar a ' . $persona['name_persona'] . '?\')">';
                                            echo '<i class="bi bi-trash"></i> Eliminar</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Configuración View -->
                <div class="view" id="configuracion-view">
                    <h2 class="mb-4">Configuración</h2>
                    <div class="card">
                        <div class="card-body">
                            <p class="text-muted">Opciones de configuración próximamente...</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal para Añadir/Editar Persona -->
    <div class="modal fade" id="personaModal" tabindex="-1" aria-labelledby="personaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="personaModalLabel">Añadir Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="personaForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" id="personaId">

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido *</label>
                            <input type="text" class="form-control" id="apellido" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono">
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion">
                        </div>

                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" form="personaForm">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Views/assets/js/admin.js"></script>
</body>

</html>