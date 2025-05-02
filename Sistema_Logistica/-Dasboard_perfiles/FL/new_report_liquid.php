<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea un Nuevo Formato de Liquidación</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Icono del sitio -->
    <link rel="icon" href="/img/logo_icono-1-281x300_SELD.png" type="image/x-icon">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="/estilos/style_agregar_operadores.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- pdfMake -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
</head>
<style>
    .menu-item {
        display: flex;
        align-items: center;
        padding: 10px;
        width: 100%;
        text-align: left;
        background-color: transparent;
        border: none;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s, padding-left 0.3s, justify-content 0.3s;
    }

    .menu-item:hover {
        background-color: #374151;
    }

    .submenu {
        padding-left: 10px;
        transition: padding-left 0.3s;
    }

    .submenu-link {
        display: block;
        padding: 8px;
        background-color: #1f2937;
        border-radius: 5px;
        margin: 2px 0;
        transition: padding-left 0.3s;
    }

    aside.w-16 .menu-item {
        justify-content: center;
        padding-left: 0;
    }

    aside.w-16 .menu-item span {
        display: none;
    }

    aside.w-16 .submenu {
        padding-left: 0;
    }

    aside.w-16 .submenu-link {
        padding-left: 0;
        text-align: center;
    }

    .submenu-link:hover {
        background-color: #4b5563;
    }
</style>
<body class="bg-gray-100">

    <!-- Barra superior -->
    <header class="flex justify-between items-center bg-gray-800 text-white p-4 fixed w-full top-0 shadow-md z-50">
        <div class="flex items-center space-x-3">
            <img src="/img/logo_icono-1-281x300_SELD.png" alt="Logo" class="w-10 h-10 rounded-full">
            <h1 class="text-lg font-semibold"><a href="../index.php">SELD</a></h1>
        </div>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="#" class="hover:text-yellow-400">🔔 Notificaciones</a></li>
                <li><a href="#" class="hover:text-yellow-400">👤 Perfil</a></li>
                <li><a href="Inicio_sesion.html" class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-700">🚪 Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <!-- Dashboard -->
    <div class="flex pt-16">
            <aside class="w-64 bg-gray-900 text-white min-h-screen p-4 shadow-lg">
            <!-- Botón para contraer y expandir el menú -->
            <button id="toggleMenu" class="text-white text-xl mb-4 flex items-center space-x-2 focus:outline-none">
                ☰ <span id="menuText">Menú</span>
            </button>

            <nav>
                <ul class="space-y-2">
                    <!-- Reportes -->
                    <li>
                        <button class="menu-item">
                            📑 <span>Reportes</span>
                        </button>
                        <ul class="submenu hidden">
                            <li><a href="contactos.html" class="submenu-link">Contactos</a></li>
                            <li><a href="subopcion2.html" class="submenu-link">Historial de reportes</a></li>
                            <li><a href="nuevo_documento_liquido.html" class="submenu-link">Nuevo Documento</a></li>
                        </ul>
                    </li>

                    <!-- Creación del FL -->
                    <li>
                        <button class="menu-item">
                            📄 <span>Creación del FL</span>
                        </button>
                        <ul class="submenu hidden">
                            <li><a href="reportes.html" class="submenu-link">Reportes</a></li>
                            <li><a href="estadisticas.html" class="submenu-link">Estadísticas</a></li>
                        </ul>
                    </li>

                    <!-- Unidades de Transporte -->
                    <li>
                        <button class="menu-item">
                            🚛 <span>Unidades de Transporte</span>
                        </button>
                        <ul class="submenu hidden">
                            <li><a href="registro_unidades.html" class="submenu-link">Registro de Unidades</a></li>
                            <li><a href="seguimiento_unidades.html" class="submenu-link">Seguimiento de Unidades</a></li>
                            <li><a href="../-Dasboard_perfiles/RH/agregar_operadores.php" class="submenu-link">Agregar Operadores</a></li>
                        </ul>
                    </li>

                    <!-- Mantenimiento -->
                    <li>
                        <button class="menu-item">
                            🔧 <span>Mantenimiento</span>
                        </button>
                        <ul class="submenu hidden">
                            <li><a href="reporte_unidad.html" class="submenu-link">Reporte de Unidades</a></li>
                            <li><a href="inventario_piezas.html" class="submenu-link">Inventario de Piezas</a></li>
                        </ul>
                    </li>

                    <!-- Clientes -->
                    <li>
                        <button class="menu-item">
                            👥 <span>Clientes</span>
                        </button>
                        <ul class="submenu hidden">
                            <li><a href="lista_clientes.html" class="submenu-link">Lista de Clientes</a></li>
                            <li><a href="contratos_clientes.html" class="submenu-link">Contratos</a></li>
                        </ul>
                    </li>

                    <!-- Vigilancia -->
                    <li>
                        <button class="menu-item">
                            🔐 <span>Vigilancia</span>
                        </button>
                        <ul class="submenu hidden">
                            <li><a href="reporte_seguridad.html" class="submenu-link">Reporte de Seguridad</a></li>
                            <li><a href="historial_eventos.html" class="submenu-link">Historial de Eventos</a></li>
                        </ul>
                    </li>

                    <!-- Almacén -->
                    <li>
                        <button class="menu-item">
                            📦 <span>Almacén</span>
                        </button>
                        <ul class="submenu hidden">
                            <li><a href="inventario.html" class="submenu-link">Inventario</a></li>
                            <li><a href="movimientos_almacen.html" class="submenu-link">Movimientos</a></li>
                        </ul>
                    </li>

                    <!-- Factura -->
                    <li>
                        <button class="menu-item">
                            💰 <span>Factura</span>
                        </button>
                        <ul class="submenu hidden">
                            <li><a href="pago_facturas.html" class="submenu-link">Pago de Facturas</a></li>
                            <li><a href="evidencias.html" class="submenu-link">Evidencias</a></li>
                            <li><a href="compresion_pdf.html" class="submenu-link">Compresión de PDF</a></li>
                            <li><a href="desglose_pdf.html" class="submenu-link">Desglose de PDF</a></li>
                        </ul>
                    </li>

                    <!-- Recursos Humanos -->
                    <li>
                        <button class="menu-item">
                            👥 <span>Recursos Humanos</span>
                        </button>
                        <ul class="submenu hidden">
                            <li><a href="/-Dasboard_perfiles/RH/agregar_operadores.php" class="submenu-link">Agregar Operadores</a></li>
                            <li><a href="agregar_administrativos.html" class="submenu-link">Agregar Administrativos</a></li>
                            <li><a href="agregar_directivos.html" class="submenu-link">Agregar Directivos</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="flex-1 p-6">
            <?php require 'Encabeza.php'; ?>

            <section class="flex-1 p-6">
                <?php //require 'modales.php'; ?>
            </section>            
    </div>
    <script>
        // Función para desplegar el menú lateral
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("nav ul li a").forEach(item => {
                item.addEventListener("click", function(e) {
                    let submenu = this.nextElementSibling;

                    // Si hay un submenú, lo despliega
                    if (submenu && submenu.classList.contains("submenu")) {
                        e.preventDefault(); // Solo bloquea si es un menú desplegable
                        submenu.classList.toggle("hidden");
                    }
                });
            });
        });

        document.querySelectorAll(".menu-item").forEach(button => {
            button.addEventListener("click", () => {
            let submenu = button.nextElementSibling;
            if (submenu.classList.contains("hidden")) {
                document.querySelectorAll(".submenu").forEach(sub => sub.classList.add("hidden"));
                submenu.classList.remove("hidden");
            } else {
                submenu.classList.add("hidden");
            }
            });
        });

        // Botón para ocultar/mostrar el menú completo
        document.getElementById("toggleMenu").addEventListener("click", () => {
            let aside = document.querySelector("aside");
        aside.classList.toggle("w-16");
            aside.classList.toggle("w-64");
            let menuText = document.getElementById("menuText");
            menuText.textContent = aside.classList.contains("w-16") ? "" : "Menú";

            // Ocultar todos los submenús cuando el menú se comprime
            if (aside.classList.contains("w-16")) {
            document.querySelectorAll(".submenu").forEach(sub => sub.classList.add("hidden"));
            }
        });
    </script>
</body>

</html> 