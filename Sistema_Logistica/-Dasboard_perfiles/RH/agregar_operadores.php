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
                        <button data-tab="operadores" class="tab-btn px-4 py-2 bg-blue-500 text-white rounded-t-lg">Operadores</button>
                        <button data-tab="administrativos" class="tab-btn px-4 py-2 bg-blue-500 text-white rounded-t-lg">Administrativos</button>
                        <button data-tab="expedientes" class="tab-btn px-4 py-2 bg-blue-500 text-white rounded-t-lg">Expedientes</button>                                          
                    </div>
                </div>
    
                <!-- Sección Operadores -->
                <div id="operadores" class="tab-section mt-4">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Registro de Operadores</h2>

                    <div id="operadores-container" class="space-y-4"></div>

                    <div class="flex justify-center mt-4">
                        <button id="agregarOperador" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                            ➕ Agregar Operador
                        </button>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button id="registrarOperadores" class="hidden bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                            ✅ Registrar Operadores
                        </button>
                    </div>
                </div>

                <!-- Sección Administrativos -->
                <div id="administrativos" class="tab-section mt-4 hidden">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Registro de Administrativos</h2>

                    <div id="administrativos-container" class="space-y-4"></div>

                    <div class="flex justify-center mt-4">
                        <button id="agregarAdministrativo" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                            ➕ Agregar Administrativo
                        </button>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button id="registrarAdministrativos" class="hidden bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                            ✅ Registrar Administrativos
                        </button>
                    </div>
                </div>

                <!-- Sección Expedientes -->
                <div id="expedientes" class="tab-section hidden max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Expedientes de Operadores</h2>
                    <p class="text-center text-gray-500">Consulta y administra la documentación de cada operador</p>

                    <div id="expedientes-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Aquí se insertan las tarjetas desde JS -->
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const operadores = JSON.parse(localStorage.getItem("operadores")) || [];
                                const container = document.getElementById("expedientes-container");

                                operadores.forEach((operador, index) => {
                                    const card = document.createElement("div");
                                    card.className = "bg-white p-4 rounded-lg shadow-md border space-y-3";

                                    card.innerHTML = `
                                        <h3 class="text-lg font-semibold text-gray-800">${operador.nombre}</h3>
                                        <p class="text-sm text-gray-600"><strong>Licencia:</strong> ${operador.licencia}</p>
                                        <p class="text-sm text-gray-600"><strong>Vigencia:</strong> ${operador.fechaExpiracion || 'No especificada'}</p>
                                        <p class="text-sm text-gray-600"><strong>CURP:</strong> ${operador.curp || 'N/A'}</p>
                                        <p class="text-sm text-gray-600"><strong>Correo:</strong> ${operador.correo}</p>
                                        <div class="flex justify-between items-center mt-2">
                                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm" onclick="verExpediente(${index})">📂 Ver</button>
                                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm" onclick="descargarExpediente(${index})">⬇️ Descargar</button>
                                        </div>
                                    `;
                                    container.appendChild(card);
                                });
                            });

                            function verExpediente(index) {
                                const operadores = JSON.parse(localStorage.getItem("operadores")) || [];
                                const operador = operadores[index];
                                alert(`Visualizando expediente de: ${operador.nombre}`);
                                // Aquí puedes abrir un modal o redirigir a una vista detallada
                            }

                            function descargarExpediente(index) {
                                const operadores = JSON.parse(localStorage.getItem("operadores")) || [];
                                const operador = operadores[index];
                                alert(`Descargando expediente de: ${operador.nombre}`);
                                // Lógica para generar PDF o descargar ZIP
                            }
                        </script>
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
        
                document.addEventListener("DOMContentLoaded", function () {
                    const tabs = document.querySelectorAll(".tab-btn");
                    const sections = {
                        operadores: document.getElementById("operadores"),
                        administrativos: document.getElementById("administrativos"),
                        expedientes: document.getElementById("expedientes"),
                    };

                    tabs.forEach(tab => {
                        tab.addEventListener("click", () => {
                            const selected = tab.dataset.tab;
                            
                            // Mostrar/ocultar secciones
                            Object.keys(sections).forEach(key => {
                                const section = sections[key];
                                if (section && section.classList) { // Ensure the section and classList exist
                                    section.classList.toggle("hidden", key !== selected);
                                }
                            });
                        
                            // Estilo activo en el botón
                            tabs.forEach(btn => btn.classList.remove("bg-blue-500", "text-white", "bg-gray-200", "text-gray-800"));
                            tab.classList.add("bg-blue-500", "text-white");
                        
                            // Cargar expedientes si es necesario
                            if (selected === "expedientes") {
                                cargarExpedientes();
                            }
                        });
                    });                
                    // Mostrar por defecto la pestaña de operadores
                    document.querySelector('[data-tab="operadores"]').click();
                });

                



            // Pestañas con esto se interactua el DOM con lo demas elementos y con lo que se pueda itneractuar
            document.addEventListener("DOMContentLoaded", () => {
                const tabs = document.querySelectorAll(".tab-btn");
                const sections = document.querySelectorAll(".tab-section");
            
                tabs.forEach(btn => {
                    btn.addEventListener("click", () => {
                    const tab = btn.dataset.tab;
                
                    // Ocultar todas las secciones
                    sections.forEach(sec => sec.style.display = "none");
                
                    // Mostrar la sección seleccionada
                    document.getElementById(tab).style.display = "block";
                
                    // Estilos activos
                    tabs.forEach(t => t.classList.remove("bg-blue-500", "text-white"));
                    tabs.forEach(t => t.classList.add("bg-gray-200", "text-gray-800"));
                
                    btn.classList.add("bg-blue-500", "text-white");
                    btn.classList.remove("bg-gray-200", "text-gray-800");
                    });
                });
            
                // Activar primera pestaña por defecto
                tabs[0].click();
            });
            


            document.getElementById("agregarOperador").addEventListener("click", function () {
                const container = document.getElementById("operadores-container");
                const operadorDiv = document.createElement("div");
                operadorDiv.classList.add("bg-white", "p-4", "rounded", "shadow-md", "fade-in", "mb-4");

                operadorDiv.innerHTML = `
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold border-b pb-2">Nuevo Operador</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Columna 1 - Datos personales -->
                            <div class="space-y-2">
                                <div>
                                    <label for="nombreCompleto" class="block text-sm font-medium text-gray-700">Nombre completo</label>
                                    <input id="nombreCompleto" type="text" class="mt-1 block w-full border rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Juan Pérez García">
                                </div>
                                <div>
                                    <label for="vigenciaLicencia" class="block text-sm font-medium text-gray-700">Vigencia de la licencia</label>
                                    <input id="vigenciaLicencia" type="date" class="mt-1 block w-full border rounded-md p-2">
                                </div>
                                <div>
                                    <label for="curp" class="block text-sm font-medium text-gray-700">CURP</label>
                                    <input id="curp" type="text" class="mt-1 block w-full border rounded-md p-2" placeholder="PERJ920101HDFRNN01">
                                </div>
                                <div>
                                    <label for="banco" class="block text-sm font-medium text-gray-700">Banco (SELECCIONA EL BANCO)</label>
                                    <select id="banco" class="mt-1 block w-full border rounded-md p-2">
                                        <option value="banamex">Banamex</option>
                                        <option value="bancomer">Bancomer</option>
                                        <option value="santander">Santander</option>
                                        <option value="hsbc">HSBC</option>
                                        <option value="banorte">Banorte</option>
                                        <option value="scotiabank">Scotiabank</option>
                                        <option value="inbursa">Inbursa</option>
                                        <option value="afirme">Afirme</option>
                                        <option value="otro">Otro</option>                                    
                                    </select>                                    
                                </div>
                                <div>
                                    <label for="fotoOperador" class="block text-sm font-medium text-gray-700">Fotografía del operador</label>
                                    <input id="fotoOperador" type="file" class="mt-1 block w-full border rounded-md p-2" placeholder="Inserta la imagen del operador">
                                </div>
                                <div>
                                    <label for="comprobanteDomicilio" class="block text-sm font-medium text-gray-700">Comprobante de domicilio</label>
                                    <input id="comprobanteDomicilio" type="file" class="mt-1 block w-full border rounded-md p-2" placeholder="Inserta la imagen del comprobante">
                                </div>
                            </div>

                            <!-- Columna 2 - Contacto -->
                            <div class="space-y-2">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                                    <input type="tel" class="mt-1 block w-full border rounded-md p-2" placeholder="55 1234 5678">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                                    <input type="email" class="mt-1 block w-full border rounded-md p-2" placeholder="juan.perez@example.com">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Dirección</label>
                                    <input type="text" class="mt-1 block w-full border rounded-md p-2" placeholder="Calle #123, Colonia">
                                </div>
                                <div>                                
                                    <label class="block text-sm font-medium text-gray-700">Numero de cuenta</label>
                                    <input type="text" class="mt-1 block w-full border rounded-md p-2 placeholder="Inserta el numero de cuenta del oeprador">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">NSS</label>
                                    <input type="text" class="mt-1 block w-full border rounded-md p-2" placeholder="Numero de Seguro Social">
                                </div>                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">INE / IFE</label>
                                    <input type="file" class="mt-1 block w-full border rounded-md p-2" placeholder="Inserta la imagen del INE/IFE">
                                </div>
                            </div>

                            <!-- Columna 3 - Documentación -->
                            <div class="space-y-2">                        
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                                    <input type="date" class="mt-1 block w-full border rounded-md p-2">
                                </div>                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">RFC</label>
                                    <input type="text" class="mt-1 block w-full border rounded-md p-2" placeholder="PERJ920101XXX">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Número de licencia</label>
                                    <input type="text" class="mt-1 block w-full border rounded-md p-2" placeholder="LIC-123456789">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Clabe interbancaria</label>
                                    <input type="text" class="mt-1 block w-full border rounded-md p-2 placeholder="Inserta la clabe interbancaria">
                                </div>                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Solicitud de empleo</label>
                                    <input type="file" class="mt-1 block w-full border rounded-md p-2" placeholder="Inserta la solicitud de empleo">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Croquis de vivienda</label>
                                    <input type="file" class="mt-1 block w-full border rounded-md p-2" placeholder="Inserta el croquis de la vivienda">
                                </div>
                                
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <button class="flex items-center px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors removeOperador">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Eliminar
                            </button>
                            <button class="btn-primary">Guardar</button>
                        </div>
                    </div>
                `;

                container.appendChild(operadorDiv);
                document.getElementById("registrarOperadores").classList.remove("hidden");

                // Animación de entrada
                setTimeout(() => operadorDiv.classList.add("opacity-100"), 10);

                // Evento para eliminar
                operadorDiv.querySelector(".removeOperador").addEventListener("click", function () {
                    operadorDiv.classList.add("opacity-0", "transition-opacity", "duration-300");
                    setTimeout(() => {
                        operadorDiv.remove();
                        if (!container.children.length) {
                            document.getElementById("registrarOperadores").classList.add("hidden");
                        }
                    }, 300);
                });
            });

            //Alerta de que los operadores se han registrado correctamente
            document.getElementById("registrarOperadores").addEventListener("click", function () {
                alert("✅ Operadores registrados correctamente.");
                document.getElementById("operadores-container").innerHTML = "";
                this.classList.add("hidden");
            });
            

            document.getElementById("agregarOperador").addEventListener("click", function () {
                const nombre = document.getElementById("nombreCompleto").value;
                const licenciaVigencia = document.getElementById("vigenciaLicencia").value;
                const curp = document.getElementById("curp").value;
                const banco = document.getElementById("banco").value;

                // Aquí asumo que faltan los siguientes campos en tu HTML:
                const telefono = document.getElementById("telefono")?.value || "";
                const correo = document.getElementById("correo")?.value || "";
                const direccion = document.getElementById("direccion")?.value || "";
                const numeroCuenta = document.getElementById("numeroCuenta")?.value || "";
                const nss = document.getElementById("nss")?.value || "";
                const fechaNacimiento = document.getElementById("fechaNacimiento")?.value || "";
                const rfc = document.getElementById("rfc")?.value || "";
                const numeroLicencia = document.getElementById("numeroLicencia")?.value || "";
                const clabe = document.getElementById("clabe")?.value || "";

                const idOperador = Date.now();

                const operador = {
                    id: idOperador,
                    nombre,
                    licencia: numeroLicencia,
                    fechaExpiracion: licenciaVigencia,
                    curp,
                    banco,
                    telefono,
                    correo,
                    direccion,
                    numeroCuenta,
                    nss,
                    fechaNacimiento,
                    rfc,
                    clabe
                };
            
                // Guardar en localStorage
                let operadores = JSON.parse(localStorage.getItem("operadores")) || [];
                operadores.push(operador);
                localStorage.setItem("operadores", JSON.stringify(operadores));
            
                // Actualizar lista desplegable
                const listaOperadores = document.getElementById("listaOperadores");
                const option = document.createElement("option");
                option.value = idOperador;
                option.text = nombre;
                listaOperadores.add(option);
            
                // Limpiar formulario
                document.getElementById("formularioOperador").reset();
            });



            
            document.addEventListener("DOMContentLoaded", () => {
                const tabs = document.querySelectorAll(".tab-btn");
                const sections = document.querySelectorAll(".tab-section");
            
                tabs.forEach(btn => {
                    btn.addEventListener("click", () => {
                    const tab = btn.dataset.tab ? btn.dataset.tab.toLowerCase() : null;
                
                    // Oculta todas las secciones
                    sections.forEach(sec => sec.classList.add("hidden"));
                
                    // Muestra solo la sección activa
                    if (tab) {
                        const targetSection = document.getElementById(tab);
                        if (targetSection) targetSection.classList.remove("hidden");
                    }
                
                    // Estilo visual para botón activo
                    tabs.forEach(b => b.classList.remove("bg-blue-500", "text-white"));
                    tabs.forEach(b => b.classList.add("bg-gray-200", "text-gray-800"));
                
                    btn.classList.add("bg-blue-500", "text-white");
                    btn.classList.remove("bg-gray-200", "text-gray-800");
                    });
                });
            
                // Carga inicial: activar primera pestaña
                tabs[0].click();
            });
            
            document.getElementById("agregarAdministrativo").addEventListener("click", () => {
                const container = document.getElementById("administrativos-container");
            
                const adminDiv = document.createElement("div");
                adminDiv.className = "bg-gray-100 p-4 rounded shadow-md space-y-3";
                
                adminDiv.innerHTML = `
                        <div class="space-y-4 bg-white p-4 rounded shadow-md border fade-in">
                            <h3 class="text-lg font-semibold border-b pb-2 text-gray-800">Nuevo Administrativo</h3>
                                
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                                <!-- Nombre completo -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
                                    <input type="text" class="mt-1 block w-full border rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ej. Ana Gómez">
                                </div>
                                
                                <!-- Puesto -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Puesto</label>
                                    <input type="text" class="mt-1 block w-full border rounded-md p-2" placeholder="Ej. Recursos Humanos">
                                </div>
                                
                                <!-- Correo institucional -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Correo institucional</label>
                                    <input type="email" class="mt-1 block w-full border rounded-md p-2" placeholder="ana@empresa.com">
                                </div>
                                
                                <!-- Teléfono -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                                    <input type="tel" class="mt-1 block w-full border rounded-md p-2" placeholder="55 0000 0000">
                                </div>
                            </div>
                                
                            <!-- Botón eliminar -->
                            <div class="flex justify-end mt-4">
                                <button class="flex items-center px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition removeAdmin">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    `;
                container.appendChild(adminDiv);

            // Evento para eliminar el formulario
            adminDiv.querySelector(".removeAdmin").addEventListener("click", function () {
                    adminDiv.classList.add("opacity-0", "transition-opacity", "duration-300");
                    setTimeout(() => {
                        adminDiv.remove();
                        if (!container.children.length) {
                            document.getElementById("registrarAdministrativos").classList.add("hidden");
                        }
                    }, 300);
                });
            });
            
            // Función para actualizar totales de operadores //En esta funcion se podra tener un mayor control de los datos que se estan registrando 
            function actualizarTotalesOperadores() {
                const operadoresRegistrados = JSON.parse(localStorage.getItem("operadores")) || [];
                const totalOperadores = operadoresRegistrados.length;
                const licenciasVigentes = operadoresRegistrados.filter(op => {
                    const hoy = new Date();
                    const vigencia = new Date(op.fechaExpiracion);
                    return vigencia > hoy;
                }).length;

                const totalOperadoresElem = document.getElementById('totalOperadores');
                const licenciasVigentesElem = document.getElementById('licenciasVigentes');
                const operadoresActivosElem = document.getElementById('operadoresActivos');
                const operadoresPendientesElem = document.getElementById('operadoresPendientes');

                if (totalOperadoresElem) totalOperadoresElem.textContent = totalOperadores;
                if (licenciasVigentesElem) licenciasVigentesElem.textContent = licenciasVigentes;
                if (operadoresActivosElem) operadoresActivosElem.textContent = totalOperadores; // Modificar según lógica de negocio
                if (operadoresPendientesElem) operadoresPendientesElem.textContent = 0; // Modificar según validaciones
            }

            // Funcion para la creacion del expediente
            document.addEventListener("DOMContentLoaded", function () {
                cargarExpedientes();
            });

            function cargarExpedientes() {
                const container = document.getElementById("expedientes-container");
                container.innerHTML = ""; // Limpiar antes de agregar
            
                const operadores = JSON.parse(localStorage.getItem("operadores")) || [];
            
                operadores.forEach((operador, index) => {
                    const card = document.createElement("div");
                    card.className = "bg-white p-4 rounded-lg shadow-md border space-y-3";
                
                    card.innerHTML = `
                        <h3 class="text-lg font-semibold text-gray-800">${operador.nombre}</h3>
                        <p class="text-sm text-gray-600"><strong>Licencia:</strong> ${operador.licencia}</p>
                        <p class="text-sm text-gray-600"><strong>Vigencia:</strong> ${operador.fechaExpiracion || 'No especificada'}</p>
                        <p class="text-sm text-gray-600"><strong>CURP:</strong> ${operador.curp || 'N/A'}</p>
                        <p class="text-sm text-gray-600"><strong>Correo:</strong> ${operador.correo}</p>
                        <div class="flex justify-between items-center mt-2">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm" onclick="verExpediente(${index})">📂 Ver</button>
                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm" onclick="descargarExpediente(${index})">⬇️ Descargar</button>
                        </div>
                    `;
                    container.appendChild(card);
                });
            }

            function verExpediente(index) {
                const operadores = JSON.parse(localStorage.getItem("operadores")) || [];
                const operador = operadores[index];
                alert(`Visualizando expediente de: ${operador.nombre}`);
                // Aquí puedes abrir un modal o redirigir a una vista detallada
            }

            function descargarExpediente(index) {
                const operadores = JSON.parse(localStorage.getItem("operadores")) || [];
                const operador = operadores[index];
                alert(`Descargando expediente de: ${operador.nombre}`);
                // Lógica para generar PDF o descargar ZIP
            }


            // Modificar el evento de registro de operadores
            document.getElementById("registrarOperadores").addEventListener("click", function () {
                // ... código existente ...
                actualizarTotalesOperadores();
            });

            // Actualizar totales al cambiar de pestaña
            if (typeof actualizarTotalesOperadores === 'function') {
                document.querySelectorAll('.tab-btn').forEach(button => {
                    button.addEventListener('click', () => {
                        setTimeout(() => {
                            if (button.dataset.tab === 'operadores') {
                                actualizarTotalesOperadores();
                            }
                        }, 100);
                    });
                });
            } else {
                console.error("La función actualizarTotalesOperadores no está definida.");
            }
        </script>        
    </body>
</html>
