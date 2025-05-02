<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de gestión de logística y distribución.">
        <meta name="author" content="SELD">
        <title>Menu Principal</title>
    
        <!-- ✅ Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    
        <!-- ✅ Bootstrap (para interactividad) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            
        <!-- ✅ Icono del sitio -->
        <link rel="icon" href="/img/logo_icono-1-281x300_SELD.png" type="image/x-icon">
    
        <link rel="stylesheet" href="/estilos/style_dashboard.css">
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
        
        @media (max-width: 768px) {
            .menu-item {
                font-size: 14px;
                padding: 8px;
            }

            .submenu-link {
                font-size: 12px;
                padding: 6px;
            }

            header h1 {
                font-size: 14px;
            }

            aside {
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 50;
                height: auto;
                max-height: 50vh;
                overflow-y: auto;
            }

            main {
                margin-top: 60px;
            }

            .submenu {
                padding-left: 5px;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .menu-item {
                font-size: 16px;
                padding: 10px;
            }

            .submenu-link {
                font-size: 14px;
                padding: 8px;
            }

            header h1 {
                font-size: 16px;
            }

            aside {
                width: 200px;
            }

            main {
                margin-left: 200px;
            }
        }
        
    </style>
    <body class="bg-gray-100">
           
        <!-- 🔹 Barra superior responsive -->
        <header class="flex flex-wrap sm:flex-nowrap justify-between items-center bg-gray-800 text-white px-4 py-3 fixed w-full top-0 z-40">
            <!-- 🔸 Logo + título -->
            <div class="flex items-center space-x-3 w-full sm:w-auto">
            <button id="toggleMenu" class="text-white bg-gray-700 p-2 rounded-md sm:hidden">
                ☰
            </button>
                <img src="/img/logo_icono-1-281x300_SELD.png" alt="Logo" class="w-10 h-10 rounded-full">
                <h1 class="text-sm sm:text-lg font-semibold leading-tight break-words max-w-[220px] sm:max-w-full">
                    SELD - Soluciones Eficientes de Logística y Distribución
                </h1>
            </div>

            <!-- 🔸 Navegación -->
                <nav class="w-full sm:w-auto mt-3 sm:mt-0">
                    <ul class="flex flex-col sm:flex-row sm:space-x-4 space-y-2 sm:space-y-0 items-start sm:items-center text-sm sm:text-base">
                        <li><a href="#" class="hover:text-yellow-400">🔔 Notificaciones</a></li>
                        <li class="relative w-full sm:w-auto">
                            <button id="perfil-btn" class="hover:text-yellow-400 w-full text-left sm:text-center">👤 Perfil</button>
                            <div id="perfil-menu" class="absolute right-0 mt-2 w-72 bg-white shadow-lg rounded-lg p-4 hidden z-50 text-sm">
                                <p class="text-gray-700 font-bold">📛 Usuario: <span id="username">Cargando...</span></p>
                                <p class="text-gray-600">📅 Creado: <span id="created-at">Cargando...</span></p>
                                <p class="text-gray-600">🕒 Último acceso: <span id="last-login">Cargando...</span></p>
                                <p class="text-green-500">✅ Activo desde: <span id="active-since">Cargando...</span></p>
                            </div>
                        </li>
                        <li class="w-full sm:w-auto">
                            <a href="/Inicio_sesion.html" class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-700 text-white block text-center transition duration-300">
                                🚪 Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>



        <!-- 🔹 Dashboard -->
        <div class="container mx-auto mt-20 p-4">
            <!-- 🔹 Layout principal -->
            <div class="flex flex-col md:flex-row pt-20 min-h-screen bg-gray-100">
                <!-- Menú lateral -->
                <!-- 🔸 Menú lateral (sidebar) -->
                <aside id="sidebarMenu" class="hidden md:block md:w-64 bg-gray-900 text-white p-4 fixed md:static top-[64px] md:top-0 left-0 z-40 min-h-screen w-full md:w-auto transition-all duration-300 overflow-y-auto">
                    <nav>
                        <ul class="space-y-2">
                          <!-- tus secciones de menú aquí (sin cambios estructurales) -->
                           <!-- Reportes -->
                           <li>
                                <button class="menu-item">📑 <span>Reportes</span></button>
                                <ul class="submenu hidden">
                                    <li><a href="contactos.html" class="submenu-link">Contactos</a></li>
                                    <li><a href="subopcion2.html" class="submenu-link">Historial de reportes</a></li>
                                    <li><a href="nuevo_documento_liquido.html" class="submenu-link">Nuevo Documento</a></li>
                                </ul>
                            </li>

                            <!-- Resto de secciones... (idénticas a las que enviaste, ya estructuradas) -->

                            <!-- Creación del FL -->
                            <li>
                                <button class="menu-item">📄 <span>Creación del FL</span></button>
                                <ul class="submenu hidden">
                                    <li><a href="/-Dasboard_perfiles/FL/new_report_liquid.php" class="submenu-link">Creación de FL</a></li>
                                    <li><a href="reportes.html" class="submenu-link">Reportes</a></li>
                                    <li><a href="estadisticas.html" class="submenu-link">Estadísticas</a></li>
                                </ul>
                            </li>

                            <!-- Unidades de Transporte -->
                            <li>
                                <button class="menu-item">🚛 <span>Unidades de Transporte</span></button>
                                <ul class="submenu hidden">
                                    <li><a href="registro_unidades.html" class="submenu-link">Registro de Unidades</a></li>
                                    <li><a href="seguimiento_unidades.html" class="submenu-link">Seguimiento de Unidades</a></li>
                                    <li><a href="../-Dasboard_perfiles/RH/agregar_operadores.php" class="submenu-link">Agregar Operadores</a></li>
                                </ul>
                            </li>

                            <!-- Mantenimiento -->
                            <li>
                                <button class="menu-item">🔧 <span>Mantenimiento</span></button>
                                <ul class="submenu hidden">
                                    <li><a href="reporte_unidad.html" class="submenu-link">Reporte de Unidades</a></li>
                                    <li><a href="inventario_piezas.html" class="submenu-link">Inventario de Piezas</a></li>
                                </ul>
                            </li>

                            <!-- Clientes -->
                            <li>
                                <button class="menu-item">👥 <span>Clientes</span></button>
                                <ul class="submenu hidden">
                                    <li><a href="lista_clientes.html" class="submenu-link">Lista de Clientes</a></li>
                                    <li><a href="contratos_clientes.html" class="submenu-link">Contratos</a></li>
                                </ul>
                            </li>

                            <!-- Vigilancia -->
                            <li>
                                <button class="menu-item">🔐 <span>Vigilancia</span></button>
                                <ul class="submenu hidden">
                                    <li><a href="reporte_seguridad.html" class="submenu-link">Reporte de Seguridad</a></li>
                                    <li><a href="historial_eventos.html" class="submenu-link">Historial de Eventos</a></li>
                                </ul>
                            </li>

                            <!-- Almacén -->
                            <li>
                                <button class="menu-item">📦 <span>Almacén</span></button>
                                <ul class="submenu hidden">
                                    <li><a href="inventario.html" class="submenu-link">Inventario</a></li>
                                    <li><a href="movimientos_almacen.html" class="submenu-link">Movimientos</a></li>
                                </ul>
                            </li>

                            <!-- Factura -->
                            <li>
                                <button class="menu-item">💰 <span>Factura</span></button>
                                <ul class="submenu hidden">
                                    <li><a href="pago_facturas.html" class="submenu-link">Pago de Facturas</a></li>
                                    <li><a href="evidencias.html" class="submenu-link">Evidencias</a></li>
                                    <li><a href="compresion_pdf.html" class="submenu-link">Compresión de PDF</a></li>
                                    <li><a href="desglose_pdf.html" class="submenu-link">Desglose de PDF</a></li>
                                </ul>
                            </li>

                            <!-- Recursos Humanos -->
                            <li>
                                <button class="menu-item">👥 <span>Recursos Humanos</span></button>
                                <ul class="submenu hidden">
                                    <li><a href="/-Dasboard_perfiles/RH/agregar_operadores.php" class="submenu-link">Agregar Operadores</a></li>
                                    <li><a href="agregar_administrativos.html" class="submenu-link">Agregar Administrativos</a></li>
                                    <li><a href="agregar_directivos.html" class="submenu-link">Agregar Directivos</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </aside>

                <!-- 📌 Contenido principal -->                
                <main class="flex-1 p-4 mt-4 md:mt-0 md:ml-64">
                    <!-- Aquí va tu contenido -->
                    <h2 class="text-lg font-semibold">Bienvenido al panel</h2>
                    <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl">
                        <article class="bg-white p-4 sm:p-3 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer id="reportes">
                            <h2 class="text-lg font-semibold">📑 Reportes</h2>
                            <p>Generación y gestión de reportes sobre las operaciones y actividades de la empresa.</p>
                        </article>

                        <article class="bg-white p-4 sm:p-3 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer id="creacion-fl">
                            <h2 class="text-lg font-semibold">📄 Creación del FL</h2>
                            <p>Gestión y control sobre la creación de FL (formatos logísticos) para la distribución eficiente.</p>
                        </article>

                        <article class="bg-white p-4 sm:p-3 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer id="unidades-transporte">
                            <h2 class="text-lg font-semibold">🚛 Unidades de Transporte</h2>
                            <p>Administración de las unidades de transporte y seguimiento de su desempeño.</p>
                        </article>

                        <article class="bg-white p-4 sm:p-3 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer id="mantenimiento">
                            <h2 class="text-lg font-semibold">🔧 Mantenimiento</h2>
                            <p>Gestión del mantenimiento de vehículos y equipos, asegurando su óptimo funcionamiento.</p>
                        </article>

                        <article class="bg-white p-4 sm:p-3 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer id="clientes">
                            <h2 class="text-lg font-semibold">👥 Clientes</h2>
                            <p>Gestión y monitoreo de los clientes, sus contratos y servicios proporcionados.</p>
                        </article>

                        <article class="bg-white p-4 sm:p-3 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer id="vigilancia">
                            <h2 class="text-lg font-semibold">🔐 Vigilancia</h2>
                            <p>Supervisión de la seguridad en las instalaciones y control de accesos.</p>
                        </article>

                        <article class="bg-white p-4 sm:p-3 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer id="almacen">
                            <h2 class="text-lg font-semibold">📦 Almacén</h2>
                            <p>Administración de inventarios y control de los principales movimientos dentro del almacén.</p>
                        </article>

                        <article class="bg-white p-4 sm:p-3 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer id="facturacion">
                            <h2 class="text-lg font-semibold">💰 Facturación</h2>
                            <p>Gestión de facturación, pagos y evidencias relacionadas con los procesos financieros.</p>
                        </article>
                        <article class="bg-white p-4 sm:p-3 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer id="recursos-humanos">
                            <h2 class="text-lg font-semibold">👥 Recursos Humanos</h2>
                            <p>Administración de personal, contrataciones y seguimiento de los recursos humanos.</p>
                        </article>
                    </section>
                </main>  
            </div>            
        </div>
                
        <!-- ✅ Scripts -->    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>        
        <script>            
            // Perfil Aplicativo de la API y tener respues de tal manera mas rapida y precisa a la hora de cargar los datos                                                           
            document.getElementById("perfil-btn").addEventListener("click", async () => {
                const menu = document.getElementById("perfil-menu");
                menu.classList.toggle("hidden"); 
            
                try {
                    const response = await fetch("get_user_info.php");
                    const text = await response.text(); 
                    console.log("Respuesta del servidor:", text); 
                
                    const userData = JSON.parse(text); 
                
                    if (userData.status === "success") {
                        document.getElementById("username").innerText = userData.username;
                        document.getElementById("created-at").innerText = formatDate(userData.created_at);
                        document.getElementById("last-login").innerText = formatDate(userData.last_login);
                        document.getElementById("active-since").innerText = formatDate(userData.active_since);
                    } else {
                        document.getElementById("username").innerText = userData.message || "Error al cargar";
                    }
                } catch (error) {
                    console.error("Error obteniendo los datos:", error);
                    document.getElementById("username").innerText = "Error de conexión";
                }
            });            
           
            // Utilidad para manejar clases de forma eficiente
            const toggleClass = (element, className) => element.classList.toggle(className);
            const addClass = (element, className) => element.classList.add(className);
            const removeClass = (element, className) => element.classList.remove(className);

            // Mostrar u ocultar el menú lateral en móviles
            const toggleMenu = document.getElementById("toggleMenu");
            const sidebarMenu = document.getElementById("sidebarMenu");

            toggleMenu.addEventListener("click", () => toggleClass(sidebarMenu, "hidden"));

            // Mostrar y ocultar submenús tipo acordeón
            const menuItems = document.querySelectorAll(".menu-item");
            const submenus = document.querySelectorAll(".submenu");

            menuItems.forEach(button => {
                button.addEventListener("click", () => {
                    const submenu = button.nextElementSibling;
                    submenus.forEach(sub => sub !== submenu && addClass(sub, "hidden"));
                    toggleClass(submenu, "hidden");
                });
            });

            // Cerrar menú tras selección en móviles
            const submenuLinks = document.querySelectorAll(".submenu-link");

            submenuLinks.forEach(link => {
                link.addEventListener("click", () => {
                    if (window.innerWidth < 768) addClass(sidebarMenu, "hidden");
                });
            });

            // Ajustar menú según el tamaño de la ventana
            const ajustarMenuResponsive = () => {
                const width = window.innerWidth;

                if (width < 768) {
                    addClass(sidebarMenu, "hidden");
                    removeClass(toggleMenu, "hidden");
                    removeClass(sidebarMenu, "md:block");
                } else {
                    removeClass(sidebarMenu, "hidden");
                    addClass(toggleMenu, "hidden");
                    addClass(sidebarMenu, "md:block");
                }
            };

            // Ejecutar al cargar y al cambiar tamaño
            window.addEventListener("load", ajustarMenuResponsive);
            window.addEventListener("resize", ajustarMenuResponsive);
        </script>
    </body>
</html>