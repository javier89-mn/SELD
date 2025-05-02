<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Nuevos Operadores</title>

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Leaflet para mapas -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

        <!-- Icono del sitio -->
        <link rel="icon" href="/img/logo_icono-1-281x300_SELD.png" type="image/x-icon">

        <!-- Estilos personalizados -->
         <link rel="stylesheet" href="/estilos/style_agregar_operadores.css">
    </head>
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
            <!-- Sidebar -->
            <aside class="w-64 bg-gray-900 text-white min-h-screen p-4 shadow-lg">
                <button id="toggleMenu" class="text-white text-xl mb-4 flex items-center space-x-2">
                    ☰ <span id="menuText">Menú</span>
                </button>
                <nav>
                    <ul class="space-y-2">
                        <li>
                            <a href="direccion.html" class="block p-2 hover:bg-gray-700 rounded">
                                <span class="icon">📑</span> <span class="text">Reportes</span>
                            </a>
                            <ul class="submenu hidden pl-4">
                                <li><a href="contactos.html" class="block p-2 hover:bg-gray-700 rounded">Contactos</a></li>
                                <li><a href="subopcion2.html" class="block p-2 hover:bg-gray-700 rounded">Historial de reportes</a></li>
                                <li><a href="nuevo_documento_liquido.html" class="block p-2 hover:bg-gray-700 rounded">Nuevo Documento</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="fl.html" class="block p-2 hover:bg-gray-700 rounded">
                                <span class="icon">📄</span> <span class="text">Creación del FL</span>
                            </a>
                            <ul class="submenu hidden pl-4">
                                <li><a href="reportes.html" class="block p-2 hover:bg-gray-700 rounded">Reportes</a></li>
                                <li><a href="estadisticas.html" class="block p-2 hover:bg-gray-700 rounded">Estadísticas</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="unidades_transporte.html" class="block p-2 hover:bg-gray-700 rounded">
                                <span class="icon">🚛</span> <span class="text">Unidades de Transporte</span>
                            </a>
                            <ul class="submenu hidden pl-4">
                                <li><a href="registro_unidades.html" class="block p-2 hover:bg-gray-700 rounded">Registro de Unidades</a></li>
                                <li><a href="seguimiento_unidades.html" class="block p-2 hover:bg-gray-700 rounded">Seguimiento de Unidades</a></li>
                                <li><a href="../-Dasboard_perfiles/RH/agregar_operadores.php" class="block p-2 hover:bg-gray-700 rounded">Agregar Operadores</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="mantenimiento.html" class="block p-2 hover:bg-gray-700 rounded">
                                <span class="icon">🔧</span> <span class="text">Mantenimiento</span>
                            </a>
                            <ul class="submenu hidden pl-4">
                                <li><a href="reporte_unidad.html" class="block p-2 hover:bg-gray-700 rounded">Reporte de Unidades</a></li>
                                <li><a href="inventario_piezas.html" class="block p-2 hover:bg-gray-700 rounded">Inventario de Piezas</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="clientes.html" class="block p-2 hover:bg-gray-700 rounded">
                                <span class="icon">👥</span> <span class="text">Clientes</span>
                            </a>
                            <ul class="submenu hidden pl-4">
                                <li><a href="lista_clientes.html" class="block p-2 hover:bg-gray-700 rounded">Lista de Clientes</a></li>
                                <li><a href="contratos_clientes.html" class="block p-2 hover:bg-gray-700 rounded">Contratos</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="seguridad.html" class="block p-2 hover:bg-gray-700 rounded">
                                <span class="icon">🔐</span> <span class="text">Vigilancia</span>
                            </a>
                            <ul class="submenu hidden pl-4">
                                <li><a href="reporte_seguridad.html" class="block p-2 hover:bg-gray-700 rounded">Reporte de Seguridad</a></li>
                                <li><a href="historial_eventos.html" class="block p-2 hover:bg-gray-700 rounded">Historial de Eventos</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="almacen.html" class="block p-2 hover:bg-gray-700 rounded">
                                <span class="icon">📦</span> <span class="text">Almacén</span>
                            </a>
                            <ul class="submenu hidden pl-4">
                                <li><a href="inventario.html" class="block p-2 hover:bg-gray-700 rounded">Inventario</a></li>
                                <li><a href="movimientos_almacen.html" class="block p-2 hover:bg-gray-700 rounded">Movimientos</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="facturacion.html" class="block p-2 hover:bg-gray-700 rounded">
                                <span class="icon">💰</span> <span class="text">Factura</span>
                            </a>
                            <ul class="submenu hidden pl-4">
                                <li><a href="pago_facturas.html" class="block p-2 hover:bg-gray-700 rounded">Pago de Facturas</a></li>
                                <li><a href="evidencias.html" class="block p-2 hover:bg-gray-700 rounded">Evidencias</a></li>
                                <li><a href="compresion_pdf.html" class="block p-2 hover:bg-gray-700 rounded">Compresión de PDF</a></li>
                                <li><a href="desglose_pdf.html" class="block p-2 hover:bg-gray-700 rounded">Desglose de PDF</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="recueros_humanos.html">
                                <span class="icon">👥</span> <span class="text">Recursos Humanos</span>
                            </a>
                            <ul class="submenu hidden pl-4">
                                <li><a href="/-Dasboard_perfiles/RH/agregar_operadores.php" class="block p-2 hover:bg-gray-700 rounded">Agregar Operadores</a></li>
                                <li><a href="agregar_administrativos.html" class="block p-2 hover:bg-gray-700 rounded">Agregar Administrativos</a></li>
                                <li><a href="agregar_directivos.html" class="block p-2 hover:bg-gray-700 rounded">Agregar Directivos</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Contenido principal -->
            <main class="flex-1 p-6">
                <!-- Pestañas -->
                <div class="mb-4 border-b border-gray-200">
                    <div class="flex space-x-4" id="tabs">   
                        <button data-tab="camiones" class="tab-btn px-4 py-2 bg-gray-300 text-gray-700 rounded-t-lg">Unidad</button>
                    </div>
                </div>

                <!-- Sección Camiones -->
                <div id="camionesSection" class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Registro de Camiones</h2>
                    <p class="text-center text-gray-500">Asocia camiones a operadores registrados</p>

                    <div id="camiones-container" class="mt-4 space-y-4"></div>

                    <div class="flex justify-center mt-4">
                        <button id="agregarCamion" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                            🚛 Agregar Camión
                        </button>
                    </div>
                    <div class="flex justify-center mt-6">
                        <button id="registrarCamiones" class="hidden px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 transition duration-300">
                            ✅ Registrar Camiones
                        </button>
                    </div>
                    <!-- Totales de Camiones -->
                    <div class="mt-6 p-4 bg-green-50 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2 text-green-800">Totales Camiones</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="text-center">
                                <p class="text-2xl font-bold text-green-600" id="totalCamiones">0</p>
                                <p class="text-sm text-green-500">Camiones registrados</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-green-600" id="capacidadTotal">0</p>
                                <p class="text-sm text-green-500">Capacidad total (kg)</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-green-600" id="camionesActivos">0</p>
                                <p class="text-sm text-green-500">Camiones activos</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-green-600" id="camionesMantenimiento">0</p>
                                <p class="text-sm text-green-500">En mantenimiento</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Scripts -->
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Sidebar
            document.addEventListener("DOMContentLoaded", function () {
                const toggleMenu = document.getElementById("toggleMenu");
                if (!toggleMenu) return; // Evita errores si el botón no existe

                const sidebar = document.getElementById("sidebar");
                const mainContent = document.querySelector("main");
                const menuItems = document.querySelectorAll("nav ul li > a"); // Elementos del menú
                const submenus = document.querySelectorAll(".submenu");

                toggleMenu.addEventListener("click", function () {
                    sidebar.classList.toggle("w-16");
                    sidebar.classList.toggle("w-64");
                    sidebar.classList.toggle("p-2");
                    sidebar.classList.toggle("p-4");
                
                    // Ajuste del contenido principal
                    if (sidebar.classList.contains("w-16")) {
                        mainContent.classList.add("ml-16");
                        mainContent.classList.remove("ml-64");
                    } else {
                        mainContent.classList.add("ml-64");
                        mainContent.classList.remove("ml-16");
                    }
                });
            
                // Función para abrir/cerrar submenús
                menuItems.forEach(item => {
                    item.addEventListener("click", function (e) {
                        e.preventDefault();
                        const submenu = this.nextElementSibling;
                        if (submenu && submenu.classList.contains("submenu")) {
                            submenu.classList.toggle("hidden");
                        }
                    });
                });
            });

            
            // Tabs de camiones (sin operadores)
            document.querySelectorAll('.tab-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const tab = button.dataset.tab;
                    document.querySelectorAll('.tab-btn').forEach(btn => {
                        btn.classList.remove('bg-blue-500', 'text-white');
                        btn.classList.add('bg-gray-300', 'text-gray-700');
                    });
                    button.classList.add('bg-blue-500', 'text-white');
                    button.classList.remove('bg-gray-300', 'text-gray-700');
                
                    // Solo mostrar la sección de camiones
                    document.getElementById('camionesSection').classList.toggle('hidden', tab !== 'camiones');
                });
            });
            
            // Agregar camión
            document.getElementById("agregarCamion").addEventListener("click", function () {
                const container = document.getElementById("camiones-container");
                const camionDiv = document.createElement("div");
                camionDiv.classList.add("bg-white", "p-4", "rounded", "shadow-md", "fade-in");
                camionDiv.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipo de Camión</label>
                            <input type="text" class="border rounded p-2 w-full" placeholder="Tipo de Camión">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Marca</label>
                            <input type="text" class="border rounded p-2 w-full" placeholder="Marca">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Submarca</label>
                            <input type="text" class="border rounded p-2 w-full" placeholder="Submarca">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Modelo</label>
                            <input type="text" class="border rounded p-2 w-full" placeholder="Modelo">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Número de Serie</label>
                            <input type="text" class="border rounded p-2 w-full" placeholder="Número de Serie">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Motor</label>
                            <input type="text" class="border rounded p-2 w-full" placeholder="Motor">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Capacidad (kg)</label>
                            <input type="number" class="border rounded p-2 w-full" placeholder="Capacidad (kg)">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Capacidad de Volumen (m³)</label>
                            <input type="number" class="border rounded p-2 w-full" placeholder="Capacidad de Volumen (m³)">
                        </div>
                    </div>
                    <button class="bg-red-500 text-white px-3 py-1 mt-2 rounded hover:bg-red-700 removeCamion">❌ Eliminar</button>
                `;
            
                container.appendChild(camionDiv);
                document.getElementById("registrarCamiones").classList.remove("hidden");
            
                camionDiv.querySelector(".removeCamion").addEventListener("click", function () {
                    camionDiv.remove();
                    if (!container.children.length) {
                        document.getElementById("registrarCamiones").classList.add("hidden");
                    }
                });
            });
            
            // Registrar camiones
            document.getElementById("registrarCamiones").addEventListener("click", function () {
                const camiones = [];
                document.querySelectorAll('#camiones-container > div').forEach(camionDiv => {
                    const inputs = camionDiv.querySelectorAll('input');
                    camiones.push({
                        tipoCamion: inputs[0].value,
                        marca: inputs[1].value,
                        submarca: inputs[2].value,
                        modelo: inputs[3].value,
                        numeroSerie: inputs[4].value,
                        motor: inputs[5].value,
                        capacidadKg: inputs[6].value,
                        volumenM3: inputs[7].value
                    });
                });
            
                console.log("Camiones registrados:", camiones);
                alert("🚛 Camiones registrados correctamente");
                document.getElementById("camiones-container").innerHTML = "";
                this.classList.add("hidden");
            });
            
            // Función para actualizar totales de camiones
            function actualizarTotalesCamiones() {
                const totalCamiones = camiones.length;
                const capacidadTotal = camiones.reduce((acc, camion) => acc + Number(camion.capacidad), 0);
            
                document.getElementById('totalCamiones').textContent = totalCamiones;
                document.getElementById('capacidadTotal').textContent = capacidadTotal;
                document.getElementById('camionesActivos').textContent = totalCamiones; // Modificar según lógica de negocio
                document.getElementById('camionesMantenimiento').textContent = 0; // Modificar según estado
            }
            
            // Actualizar totales al cambiar de pestaña
            document.querySelectorAll('.tab-btn').forEach(button => {
                button.addEventListener('click', () => {
                    setTimeout(() => {
                        if (button.dataset.tab === 'camiones') {
                            actualizarTotalesCamiones();
                        }
                    }, 100);
                });
            });
            
        </script>        
    </body>
</html>
