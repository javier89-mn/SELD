<?php 
// Configuración de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Conexión a la base de datos
require_once __DIR__ . '/../../Backend/conexion.php';

?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formato de Liquidación</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100">
        <style>
            .hidden {
                display: none;
            }

            .btn-primary {
                background-color: #007bff;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }

            .btn-secondary {
                background-color: #28a745;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .btn-secondary:hover {
                background-color: #218838;
            }
            @media (max-width: 1024px) {
                .flex-1 {
                    padding: 4px;
                }

                h2.text-3xl {
                    font-size: 1.5rem;
                }

                .grid {
                    grid-template-columns: 1fr;
                }

                .btn-primary, .btn-secondary {
                    font-size: 14px;
                    padding: 8px 16px;
                }

                .table-auto {
                    font-size: 12px;
                }

                .max-w-3xl {
                    max-width: 100%;
                }

                .p-6 {
                    padding: 1rem;
                }

                .space-y-6 > * {
                    margin-bottom: 1rem;
                }

                .grid-cols-2 {
                    grid-template-columns: 1fr;
                }

                .tab-btn {
                    font-size: 12px;
                    padding: 6px 12px;
                }

                .modal {
                    width: 90%;
                    max-width: 400px;
                }

                .table-auto th, .table-auto td {
                    padding: 4px;
                }
            }

            @media (max-width: 768px) {
                .text-2xl {
                    font-size: 1.25rem;
                }

                .text-xl {
                    font-size: 1rem;
                }

                .rounded-lg {
                    border-radius: 0.5rem;
                }

                .shadow-lg {
                    box-shadow: none;
                }

                .hidden {
                    display: none !important;
                }

                .btn-primary, .btn-secondary {
                    font-size: 12px;
                    padding: 6px 12px;
                }

                .grid-cols-2 {
                    grid-template-columns: 1fr;
                }

                .table-auto {
                    font-size: 10px;
                }
            }

            @media (max-width: 480px) {
                .text-3xl {
                    font-size: 1.25rem;
                }

                .text-2xl {
                    font-size: 1rem;
                }

                .text-xl {
                    font-size: 0.875rem;
                }

                .btn-primary, .btn-secondary {
                    font-size: 10px;
                    padding: 4px 8px;
                }

                .grid-cols-2 {
                    grid-template-columns: 1fr;
                }

                .table-auto {
                    font-size: 8px;
                }

                .p-6 {
                    padding: 0.5rem;
                }

                .space-y-6 > * {
                    margin-bottom: 0.5rem;
                }
            }
        </style>

        <main class="flex-1 p-6">
            <h2 class="text-3xl font-extrabold mb-4 text-center text-gray-800">Registro de Formato de Liquidación</h2>

            <!-- Pestañas -->
            <div class="mb-4 border-b border-gray-200">
                <div class="flex space-x-4" id="tabs">
                    <button data-tab="nuevoFormato" class="tab-btn px-4 py-2 bg-blue-500 text-white rounded-t-lg shadow-lg">Nuevo Formato</button>
                    <button data-tab="costoViaje" class="tab-btn px-4 py-2 bg-green-500 text-white rounded-t-lg shadow-lg">Costo del Viaje</button>
                    <button data-tab="anticipoViaje" class="tab-btn px-4 py-2 bg-red-500 text-white rounded-t-lg shadow-lg">Anticipo de Viaje</button>
                    <button data-tab="historialPDF" class="tab-btn px-4 py-2 bg-gray-500 text-white rounded-t-lg shadow-lg">Historial de FL</button>
                </div>
            </div>

            <!-- Pestañas adicionales -->
            <div class="fixed top-20 right-6">
                <div class="mb-4 border-b border-gray-200">
                    <div class="flex flex-col space-y-4" id="sideTabs">
                        <!-- Botón para abrir el modal -->
                        <!-- Boton para abrir el modal del nuevo operador-->
                        <button onclick="abrirModal('nuevoOperadorModal')" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Agregar Operador</button>
                        <!-- Boton para abrir el modal de nueva unidad -->
                        <button data-tab="nuevaUnidad" class="tab-btn px-4 py-2 bg-teal-500 text-white rounded-lg shadow-lg">Nueva Unidad</button>
                        <!-- Boton para abrir el modal de nueva ruta -->
                        <button data-tab="nuevaRuta" class="tab-btn px-4 py-2 bg-orange-500 text-white rounded-lg shadow-lg">Nueva Ruta</button>
                        <!-- Botón para abrir modal de nuevo cliente -->                    
                        <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 shadow-lg" onclick="abrirModal('nuevoClienteModal')">Agregar Cliente</button>                    
                    </div>
                </div>
            </div>

            <!-- Modales -->           

            <!-- Modal para agregar operadores -->
            <div id="nuevoOperadorModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
              <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <h3 class="text-2xl font-bold mb-4 text-center">Agregar Nuevo Operador</h3>
                <form id="formNuevoOperador" class="space-y-4">
                  <div class="grid grid-cols-2 gap-4">
                    <!-- Nombre Completo -->
                    <div>
                      <label class="block text-gray-700 font-bold mb-2">Nombre Completo:</label>
                      <input type="text" id="nombreOperador" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                    </div>
                    <!-- Número de Licencia -->
                    <div>
                      <label class="block text-gray-700 font-bold mb-2">Número de Licencia:</label>
                      <input type="text" id="licenciaOperador" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                    <!-- Tipo de Licencia -->
                    <div>
                      <label class="block text-gray-700 font-bold mb-2">Tipo de Licencia:</label>
                      <select id="tipoLicencia" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        <option value="">Seleccione un tipo</option>
                        <option value="A">Tipo A</option>
                        <option value="B">Tipo B</option>
                        <option value="C">Tipo C</option>
                      </select>
                    </div>
                    <!-- Fecha de Expiración de Licencia -->
                    <div>
                      <label class="block text-gray-700 font-bold mb-2">Fecha de Expiración:</label>
                      <input type="date" id="fechaExpiracion" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                    <!-- Teléfono -->
                    <div>
                      <label class="block text-gray-700 font-bold mb-2">Teléfono:</label>
                      <input type="tel" id="telefonoOperador" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" pattern="[0-9]{10}" required>
                    </div>
                    <!-- Correo Electrónico -->
                    <div>
                      <label class="block text-gray-700 font-bold mb-2">Correo Electrónico:</label>
                      <input type="email" id="correoOperador" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                    </div>
                  </div>
                  <!-- Botones -->
                  <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" onclick="guardarOperador()">Guardar</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700" onclick="cerrarModal('nuevoOperadorModal')">Cerrar</button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Modal para agregar nueva unidad -->
            <div id="nuevaUnidadModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                    <h3 class="text-2xl font-bold mb-4">Agregar Nueva Unidad</h3>
                    <form id="formNuevaUnidad" class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Placa:</label>
                            <input type="text" id="placaUnidad" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Modelo:</label>
                            <input type="text" id="modeloUnidad" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <button type="button" class="btn-primary" onclick="guardarUnidad()">Guardar</button>
                        <button type="button" class="btn-secondary" onclick="cerrarModal('nuevaUnidadModal')">Cerrar</button>
                    </form>
                </div>
            </div>

            <!-- Modal para agregar nueva ruta -->
            <div id="nuevaRutaModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                    <h3 class="text-2xl font-bold mb-4">Agregar Nueva Ruta</h3>
                    <form id="formNuevaRuta" class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Origen:</label>
                            <input type="text" id="origenRuta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Destino:</label>
                            <input type="text" id="destinoRuta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <button type="button" class="btn-primary" onclick="guardarRuta()">Guardar</button>
                        <button type="button" class="btn-secondary" onclick="cerrarModal('nuevaRutaModal')">Cerrar</button>
                    </form>
                </div>
            </div>

            <!-- Modal para agregar Cliente -->            
            <div id="nuevoClienteModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <div class="bg-white p-6 rounded shadow-lg w-96">
                    <h2 class="text-xl font-bold mb-4">Agregar Cliente</h2>

                    <form id="formNuevoCliente">
                        <!-- Campo Nombre -->
                        <label class="block text-gray-700 font-bold mb-2">Nombre:</label>
                        <input type="text" id="nombreCliente" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>

                        <!-- Campo Teléfono -->
                        <label class="block text-gray-700 font-bold mb-2 mt-4">Teléfono:</label>
                        <input type="text" id="telefonoCliente" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>

                        <!-- Campo Correo -->
                        <label class="block text-gray-700 font-bold mb-2 mt-4">Correo:</label>
                        <input type="email" id="correoCliente" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>

                        <!-- Campo Empresa -->
                        <label class="block text-gray-700 font-bold mb-2 mt-4">Empresa:</label>
                        <input type="text" id="empresaCliente" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>

                        <!-- Botones del formulario -->
                        <div class="mt-4 flex justify-between">
                            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 shadow-lg" onclick="guardarCliente()">Guardar</button>
                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300 shadow-lg" onclick="cerrarModal('nuevoClienteModal')">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>


            <script>
                function guardarOperador() {
                    const nombre = document.getElementById("nombreOperador").value;
                    const licencia = document.getElementById("licenciaOperador").value;

                    if (nombre && licencia) {
                        const operadorInput = document.getElementById("operador");
                        operadorInput.value = `${nombre} (Licencia: ${licencia})`;
                        operadorInput.dispatchEvent(new Event('input')); // Actualizar el valor en tiempo real
                        cerrarModal("nuevoOperadorModal");
                    } else {
                        alert("Por favor, complete todos los campos.");
                    }
                }

                function guardarUnidad() {
                    const placa = document.getElementById("placaUnidad").value;
                    const modelo = document.getElementById("modeloUnidad").value;

                    if (placa && modelo) {
                        const unidadInput = document.getElementById("unidad");
                        unidadInput.value = `Placa: ${placa}, Modelo: ${modelo}`;
                        unidadInput.dispatchEvent(new Event('input')); // Actualizar el valor en tiempo real
                        cerrarModal("nuevaUnidadModal");
                    } else {
                        alert("Por favor, complete todos los campos.");
                    }
                }

                function guardarRuta() {
                    const origen = document.getElementById("origenRuta").value;
                    const destino = document.getElementById("destinoRuta").value;

                    if (origen && destino) {
                        const origenInput = document.getElementById("origen");
                        const destinoInput = document.getElementById("destino");
                        origenInput.value = origen;
                        destinoInput.value = destino;
                        origenInput.dispatchEvent(new Event('input')); // Actualizar el valor en tiempo real
                        destinoInput.dispatchEvent(new Event('input')); // Actualizar el valor en tiempo real
                        cerrarModal("nuevaRutaModal");
                    } else {
                        alert("Por favor, complete todos los campos.");
                    }
                }
            </script>

            <script>
                document.querySelectorAll("#sideTabs .tab-btn").forEach(btn => {
                    btn.addEventListener("click", () => {
                        const modalId = btn.getAttribute("data-tab") + "Modal";
                        document.getElementById(modalId).classList.remove("hidden");
                    });
                });

                function cerrarModal(modalId) {
                    document.getElementById(modalId).classList.add("hidden");
                }

                function guardarOperador() {
                    const nombre = document.getElementById("nombreOperador").value;
                    const licencia = document.getElementById("licenciaOperador").value;
                    alert(`Operador ${nombre} con licencia ${licencia} guardado.`);
                    cerrarModal("nuevoOperadorModal");
                }

                function guardarUnidad() {
                    const placa = document.getElementById("placaUnidad").value;
                    const modelo = document.getElementById("modeloUnidad").value;
                    alert(`Unidad con placa ${placa} y modelo ${modelo} guardada.`);
                    cerrarModal("nuevaUnidadModal");
                }

                function guardarRuta() {
                    const origen = document.getElementById("origenRuta").value;
                    const destino = document.getElementById("destinoRuta").value;
                    alert(`Ruta de ${origen} a ${destino} guardada.`);
                    cerrarModal("nuevaRutaModal");
                }
            </script>
            <form id="formLiquidacion" id="formLiquidacion" method="POST"  action="guardarLiquidacion.php" class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-2xl space-y-6">
                <!-- Datos Generales del viaje -->
                <div id="nuevoFormatoSection">
                <h3 class="text-2xl font-bold mb-4">Nuevo Formato de Liquidación</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <?php 
                                date_default_timezone_set('America/Mexico_City'); // Ajusta según tu ubicación
                                $fechaActual = date('Y-m-d');
                                $horaActual = new DateTime('now', new DateTimeZone('America/Mexico_City')); // Asegura la zona horaria correcta
                                $horaActual->modify('-1 hour'); // Ajusta la hora restando una hora
                            ?>
                            <label class="block text-gray-700 font-bold mb-2">Fecha y Hora:</label>
                            <input type="text" id="fechaHora" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200" required value="<?php echo $fechaActual . ' ' . $horaActual->format('h:i:s A'); ?>" readonly><br>


                            <label class="block text-gray-700 font-bold mb-2">Origen:</label>
                            <input type="text" id="origen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><br>

                            <label class="block text-gray-700 font-bold mb-2">Unidad:</label>
                            <input type="text" id="unidad" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><br>                                                      

                            <!-- Lista estática de operadores -->
                            <div class="mt-4">
                            <label class="block text-gray-700 font-bold mb-2">Operador:</label>
                                <select id="listaOperadores" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="">Seleccione un operador</option>
                                </select>
                            </div>


                            <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                cargarOperadores();
                            });
                            
                            let contador = localStorage.getItem("contadorOperadores") 
                                ? parseInt(localStorage.getItem("contadorOperadores")) 
                                : 1;
                            
                            function guardarOperador() {
                                const nombre = document.getElementById("nombreOperador").value.trim();
                                const licencia = document.getElementById("licenciaOperador").value.trim();
                                const tipoLicencia = document.getElementById("tipoLicencia").value;
                                const fechaExpiracion = document.getElementById("fechaExpiracion").value;
                                const telefono = document.getElementById("telefonoOperador").value.trim();
                                const correo = document.getElementById("correoOperador").value.trim();
                            
                                if (!nombre || !licencia || !tipoLicencia || !fechaExpiracion || !telefono || !correo) {
                                    alert("Por favor, completa todos los campos.");
                                    return;
                                }
                            
                                let nomenclatura = `Operador-${contador}`;
                                contador++;
                                localStorage.setItem("contadorOperadores", contador);
                            
                                const nuevoOperador = {
                                    nombre,
                                    licencia,
                                    tipoLicencia,
                                    fechaExpiracion,
                                    telefono,
                                    correo,
                                    nomenclatura
                                };
                            
                                let operadores = JSON.parse(localStorage.getItem("operadores")) || [];
                                operadores.push(nuevoOperador);
                                localStorage.setItem("operadores", JSON.stringify(operadores));
                            
                                actualizarListaOperadores();
                                document.getElementById("formNuevoOperador").reset();
                                cerrarModal("nuevoOperadorModal");
                                alert("Operador agregado exitosamente.");
                            }
                            
                            function cargarOperadores() {
                                let operadores = JSON.parse(localStorage.getItem("operadores")) || [];
                                actualizarListaOperadores(operadores);
                            }
                            
                            function actualizarListaOperadores() {
                                let listaOperadores = document.getElementById("listaOperadores");
                                if (!listaOperadores) return;
                            
                                listaOperadores.innerHTML = `<option value="">Seleccione un operador</option>`;
                                let operadores = JSON.parse(localStorage.getItem("operadores")) || [];
                            
                                operadores.forEach((operador) => {
                                    let nuevaOpcion = document.createElement("option");
                                    nuevaOpcion.value = operador.licencia;
                                    nuevaOpcion.textContent = `${operador.nomenclatura}: ${operador.nombre} (Licencia: ${operador.licencia})`;
                                    listaOperadores.appendChild(nuevaOpcion);
                                });
                            }
                            
                            function abrirModal(idModal) {
                                document.getElementById(idModal).classList.remove("hidden");
                            }
                            
                            function cerrarModal(idModal) {
                                document.getElementById(idModal).classList.add("hidden");
                            }                            
                            </script>
                    
                            <!-- Sección para seleccionar Cliente -->
                            <div class="mt-4">
                                <label class="block text-gray-700 font-bold mb-2">Cliente:</label>
                                <select id="listaClientes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="">Seleccione un cliente</option>
                                </select>
                            </div>
                            
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    cargarClientes();  // Cargar los clientes cuando la página se carga
                                });

                                let contadorClientes = localStorage.getItem("contadorClientes") 
                                    ? parseInt(localStorage.getItem("contadorClientes")) 
                                    : 1;

                                function guardarCliente() {
                                    const nombre = document.getElementById("nombreCliente").value.trim();
                                    const telefono = document.getElementById("telefonoCliente").value.trim();
                                    const correo = document.getElementById("correoCliente").value.trim();
                                    const empresa = document.getElementById("empresaCliente").value.trim(); // Nuevo campo para empresa
                                
                                    // Validación de los campos
                                    if (!nombre || !telefono || !correo || !empresa) {
                                        alert("Por favor, completa todos los campos.");
                                        return;
                                    }
                                
                                    // Genera nomenclatura con el nombre de la empresa
                                    let nomenclatura = `${empresa}-${contadorClientes}`;
                                    contadorClientes++; // Incrementa el contador para el próximo cliente
                                    localStorage.setItem("contadorClientes", contadorClientes); // Guarda el contador actualizado en localStorage
                                
                                    // Crea el objeto del nuevo cliente
                                    const nuevoCliente = {
                                        nombre,
                                        telefono,
                                        correo,
                                        empresa,
                                        nomenclatura
                                    };
                                
                                    // Recupera los clientes del localStorage y agrega el nuevo cliente
                                    let clientes = JSON.parse(localStorage.getItem("clientes")) || [];
                                    clientes.push(nuevoCliente);
                                    localStorage.setItem("clientes", JSON.stringify(clientes)); // Guarda la lista de clientes
                                
                                    // Actualiza la lista de clientes en el DOM
                                    actualizarListaClientes();
                                
                                    // Limpia el formulario y cierra el modal
                                    document.getElementById("formNuevoCliente").reset();
                                    cerrarModal("nuevoClienteModal");
                                
                                    alert("Cliente agregado exitosamente.");
                                }

                                function cargarClientes() {
                                    // Cargar la lista de clientes
                                    actualizarListaClientes();
                                }

                                function actualizarListaClientes() {
                                    let listaClientes = document.getElementById("listaClientes");
                                    if (!listaClientes) return; // Verifica si el elemento existe
                                
                                    // Limpia la lista antes de agregar nuevas opciones
                                    listaClientes.innerHTML = `<option value="">Seleccione un cliente</option>`;
                                
                                    // Recupera los clientes del localStorage
                                    let clientes = JSON.parse(localStorage.getItem("clientes")) || [];
                                
                                    // Itera sobre los clientes y agrega las opciones al selector
                                    clientes.forEach((cliente) => {
                                        let nuevaOpcion = document.createElement("option");
                                        nuevaOpcion.value = cliente.nomenclatura;
                                        nuevaOpcion.textContent = `${cliente.nomenclatura}: ${cliente.nombre} (Tel: ${cliente.telefono})`;
                                        listaClientes.appendChild(nuevaOpcion);
                                    });
                                }

                                function abrirModal(idModal) {
                                    // Muestra el modal especificado
                                    document.getElementById(idModal).classList.remove("hidden");
                                }

                                function cerrarModal(idModal) {
                                    // Oculta el modal especificado
                                    document.getElementById(idModal).classList.add("hidden");
                                }

                                
                            </script>

                            <label class="block text-gray-700 font-bold mb-2">Flete:</label>
                            <input type="number" id="flete" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><br>

                            <label class="block text-gray-700 font-bold mb-2">Maniobras:</label>
                            <input type="number" id="maniobras" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><br>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Folio:</label>
                            <input type="text" id="folio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200" required readonly><br>

                            <label class="block text-gray-700 font-bold mb-2">Destino:</label>
                            <input type="text" id="destino" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><br>

                            <label class="block text-gray-700 font-bold mb-2">Kilómetros:</label>
                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <!-- Kilómetros Iniciales -->
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block text-gray-700 font-bold mb-2">Iniciales:</label>
                                        <input type="number" id="kilometros-iniciales" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>

                                    <!-- Kilómetros Finales -->
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block text-gray-700 font-bold mb-2">Finales:</label>
                                        <input type="number" id="kilometros-finales" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>

                                    <!-- Resultado: Kilómetros Recorridos -->
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block text-gray-700 font-bold mb-2">Recorridos:</label>
                                        <input type="number" id="resultado-kilometros" readonly class="bg-gray-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>
                                </div>
                            <script>                            
                                // Obtener los inputs
                                const kmIniciales = document.getElementById("kilometros-iniciales");
                                const kmFinales = document.getElementById("kilometros-finales");
                                const resultadoKm = document.getElementById("resultado-kilometros");

                                // Agregar eventos para calcular cuando cambien los valores
                                kmIniciales.addEventListener("input", calcularKilometrosRecorridos);
                                kmFinales.addEventListener("input", calcularKilometrosRecorridos);

                                function calcularKilometrosRecorridos() {
                                    const iniciales = parseFloat(kmIniciales.value) || 0;
                                    const finales = parseFloat(kmFinales.value) || 0;
                                    
                                    const diferencia = finales - iniciales;
                                    
                                    // Mostrar solo si la diferencia es positiva
                                    resultadoKm.value = diferencia >= 0 ? diferencia.toFixed(2) : 0;
                                }
                            </script>

                            <label class="block text-gray-700 font-bold mb-2">Orden de Servicio:</label>
                            <input type="number" id="ordenServicio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><br>

                            <label class="block text-gray-700 font-bold mb-2">Destinatario:</label>
                            <input type="text" id="destinatario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><br>

                            <label class="block text-gray-700 font-bold mb-2">Remolque:</label>
                            <input type="text" id="remolque" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><br>                

                            <label class="block text-gray-700 font-bold mb-2">Otros:</label>
                            <input type="text" id="otros" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><br>

                            <label class="block text-gray-700 font-bold mb-2">Concepto:</label>
                            <input type="text" id="concepto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
                        </div>
                    </div><br>
                <button type="button" class="btn-primary" onclick="guardarDatos('liquidacion')">Guardar</button>
                </div>

                <!-- Sección de Gastos del viaje -->
                <div id="costoViajeSection" class="hidden">
                    <h3 class="text-2xl font-bold mb-4">Costo del Viaje</h3>
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 bg-blue-100 text-left">Nombre</th>
                                <th class="border border-gray-300 px-4 py-2 bg-blue-100 text-left">Gastos SELD</th>
                                <th class="border border-gray-300 px-4 py-2 bg-blue-100 text-left">Gts Operador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Carga</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="carga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('carga', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="cargaOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('carga', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Casetas</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="casetas" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('casetas', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="casetasOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('casetas', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Comisión del Operador</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="comisionOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('comisionOperador', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="comisionOperadorOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('comisionOperador', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Compensación de Días de Viaje</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="compensacionDias" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('compensacionDias', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="compensacionDiasOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('compensacionDias', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Descarga</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="descarga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('descarga', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="descargaOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('descarga', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Costo de Combustible</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="costoCombustible" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('costoCombustible', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="costoCombustibleOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('costoCombustible', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Gastos Extra</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="gastosExtra" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('gastosExtra', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="gastosExtraOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('gastosExtra', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Combustible no comprobable</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="combustibleNoComprobable" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('combustibleNoComprobable', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="combustibleNoComprobableOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('combustibleNoComprobable', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Otros</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="otrosGastos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('otrosGastos', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="otrosGastosOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('otrosGastos', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Refacciones</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="refacciones" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('refacciones', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="refaccionesOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('refacciones', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Rampas</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="rampas" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('rampas', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="rampasOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('rampas', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Talachas</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="talachas" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('talachas', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="talachasOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('talachas', this.value, 'operador')">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Tránsito</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="transito" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('transito', this.value)">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" id="transitoOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" oninput="actualizarResumen('transito', this.value, 'operador')">
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 font-bold">Total</td>
                                <td class="border border-gray-300 px-4 py-2 font-bold text-right">
                                    <span id="totalGastosSELD">0</span>
                                </td>
                                <td class="border border-gray-300 px-4 py-2 font-bold text-right">
                                    <span id="totalGastosOperador">0</span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <script>
                        function calcularTotalesTabla() {
                            let totalSELD = 0;
                            let totalOperador = 0;

                            document.querySelectorAll("tbody tr").forEach(row => {
                                const seldInput = row.querySelector("td:nth-child(2) input");
                                const operadorInput = row.querySelector("td:nth-child(3) input");

                                totalSELD += parseFloat(seldInput?.value || 0);
                                totalOperador += parseFloat(operadorInput?.value || 0);
                            });

                            document.getElementById("totalGastosSELD").textContent = totalSELD.toFixed(2);
                            document.getElementById("totalGastosOperador").textContent = totalOperador.toFixed(2);
                        }

                        document.querySelectorAll("tbody input").forEach(input => {
                            input.addEventListener("input", calcularTotalesTabla);
                        });

                        calcularTotalesTabla();
                    </script>                               
                    <!-- En esta seccion se tendra todos los datos para poder tener la utilidad de los cuales se tienen los datos para poder  manipularlos de tal maner que  se tenga que manipular ocn el DOM y el uso de los datos  por medio del mismo-->
                    <!-- EJEMPLO DE LOS DEMAS DATOS PARA EL USO DE LA MANIPULACION DE LOS MISMO POR MEDIO DE UN API EL USO DE DOM PARA QUE SE MUETREN -->
                    <p id="rendimientoIngreso" class="font-bold text-gray-700 mt-4"></p>
                    <p id="rendimientoTotalGastos" class="font-bold text-gray-700 mt-4"></p>
                    <p id="rendimientoEgesi" class="font-bold text-gray-700 mt-4"></p>
                    <p id="rendimientoRellenoDiesel" class="font-bold text-gray-700 mt-4"></p>
                    <p id="rendimientoTotalLitros" class="font-bold text-gray-700 mt-4"></p>
                    <p id="rendimientoUtilidad" class="font-bold text-gray-700 mt-4"></p>
                    
                    <div class="bg-white rounded shadow-md p-4 mt-6">
                        <h2 class="font-bold text-lg mb-4">⛽ Registro de Vales de Diesel</h2>

                        <!-- Formulario para agregar vales -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <!-- Número de Vale -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Número de Vale</label>
                            <input type="text" id="numeroVale" class="mt-1 block w-full border rounded-md p-2" placeholder="Ej. 12345" />
                        </div>
                                        
                        <!-- Litros -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Litros</label>
                            <input type="number" id="litrosVale" class="mt-1 block w-full border rounded-md p-2" placeholder="Ej. 40" />
                        </div>
                                        
                        <!-- Precio por Litro -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Precio por Litro ($)</label>
                            <input type="number" id="precioPorLitro" value="26" step="0.01" class="mt-1 block w-full border rounded-md p-2" />
                        </div>
                                        
                        <!-- Botón Agregar -->
                        <div class="flex items-end">
                            <button id="agregarVale" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                                Agregar Vale
                            </button>
                        </div>
                    </div>



                        <!-- Lista de vales -->
                        <ul id="listaVales" class="mt-4 space-y-2"></ul>
                        
                    </div>                    
                    <script>
                        let vales = [];

                        document.getElementById("agregarVale").addEventListener("click", () => {
                            const numero = document.getElementById("numeroVale").value.trim();
                            const litros = parseFloat(document.getElementById("litrosVale").value.trim());
                            const precioPorLitro = parseFloat(document.getElementById("precioPorLitro").value.trim());
                        
                            if (!numero || isNaN(litros) || isNaN(precioPorLitro)) {
                                alert("Por favor, completa todos los campos correctamente.");
                                return;
                            }
                        
                            const monto = litros * precioPorLitro;
                        
                            vales.push({ numero, litros, precioPorLitro, monto });
                        
                            // Limpiar inputs
                            document.getElementById("numeroVale").value = "";
                            document.getElementById("litrosVale").value = "";
                        
                            actualizarListaVales();
                            actualizarResumenVales();
                        });

                        function actualizarListaVales() {
                            const lista = document.getElementById("listaVales");
                            if (!lista) return;
                        
                            lista.innerHTML = "";
                        
                            vales.forEach((vale, index) => {
                                const li = document.createElement("li");
                                li.className = "flex justify-between bg-gray-100 rounded px-4 py-2 items-center";
                            
                                li.innerHTML = `
                                    <span>
                                        <strong>Vale #${vale.numero}</strong> - 
                                        ${vale.litros.toFixed(2)} L x $${vale.precioPorLitro.toFixed(2)} = 
                                        <strong>$${vale.monto.toFixed(2)}</strong>
                                    </span>
                                    <button onclick="eliminarVale(${index})" class="text-red-500 hover:text-red-700">🗑️</button>
                                `;
                            
                                lista.appendChild(li);
                            });
                        }

                        function actualizarResumenVales() {
                            const totalLitros = vales.reduce((sum, v) => sum + v.litros, 0);
                            const totalMonto = vales.reduce((sum, v) => sum + v.monto, 0);
                        
                            const litrosTarget = document.getElementById("totalLitrosDiesel");
                            const montoTarget = document.getElementById("totalRellenoDiesel");
                        
                            if (litrosTarget) litrosTarget.textContent = `Total de Litros: ${totalLitros.toFixed(2)} L`;
                            if (montoTarget) montoTarget.textContent = `Total de Relleno Diesel: $${totalMonto.toFixed(2)}`;
                        }

                        function eliminarVale(index) {
                            vales.splice(index, 1);
                            actualizarListaVales();
                            actualizarResumenVales();
                        }

                    </script>
                    
                    <h1>Rendimeiento</h1>
                    <div class="bg-gray-100 p-4 rounded shadow-md">
                        <!-- Total de litros -->
                        <p id="totalLitrosDiesel" class="font-bold text-gray-700 mt-2">Total de Litros: 0 L</p>

                        <!-- Total de vales -->
                        <p id="totalRellenoDiesel" class="font-bold text-gray-700 mt-4">Total de Relleno Diesel: $0.00</p>                        

                        <!-- Sección de Egresos -->
                        <p id="totalEgresos" class="font-bold text-gray-700 mt-4"></p> 

                        <!-- Sección de Total de Gastos -->
                        <p id="totalGastos" class="font-bold text-gray-700 mt-4"></p>

                        <!-- Sección de Ingresos -->
                        <p id="totalIngresos" class="font-bold text-gray-700 mt-4"></p>
                        
                        <!-- Sección de Utilidad -->
                        <p id="totalUtilidad" class="font-bold text-gray-700 mt-4"></p>

                        <!-- Sección del Rendimiento de la Unidad -->
                        <p id="RendimientoUnidad" class="font-bold text-green-600 mt-2">Rendimiento: 0.00 km/L</p>
                    </div>

                    <!-- Seccion en donde se puede tener los valores para las operaciones aritmeticas para el uso de los gattos totales en donde se tienen todos los valores -->
                    <script>
                        // Función generica para cualquier apartado de operaciones artmeticas

                        // Función genérica para calcular los ingresos
                        function calcularIngresos() {
                            // IDs de los campos que intervienen en el cálculo
                            const campos = ["flete", "maniobras", "concepto"];
                        
                            // Suma acumulada
                            const totalIngresos = campos.reduce((total, campoID) => {
                                const campo = document.getElementById(campoID);
                                return total + (parseFloat(campo?.value) || 0); // Agrega el valor si existe, o 0 si es inválido
                            }, 0);
                        
                            // Mostrar el resultado con 2 decimales
                            document.getElementById("totalIngresos").textContent = `Total de ingresos: $${totalIngresos.toFixed(2)}`;
                        }

                        // Agregar eventos dinámicamente para recalcular al cambiar un valor
                        ["flete", "maniobras", "concepto"].forEach(id => {
                            const campo = document.getElementById(id);
                            if (campo) campo.addEventListener("input", calcularIngresos);
                        });

                        // Llamada inicial para establecer el valor desde el principio
                        calcularIngresos();

                        // Función para calcular los egresos
                        function calcularEgresos() {
                            // IDs de los campos que intervienen en el cálculo
                            const campos = ["totalGastosSELD", "totalGastosOperador"];
                        
                            // Suma acumulada
                            const totalEgresos = campos.reduce((total, campoID) => {
                                const campo = document.getElementById(campoID);
                                // Usar .textContent para leer el valor si es un elemento <span> o <p>
                                return total + (parseFloat(campo?.textContent) || 0);
                            }, 0);
                        
                            // Mostrar el resultado con 2 decimales
                            const totalEgresosElemento = document.getElementById("totalEgresos");
                            if (totalEgresosElemento) {
                                totalEgresosElemento.textContent = `Total de egresos: $${totalEgresos.toFixed(2)}`;
                            } else {
                                console.error("El elemento 'totalEgresos' no existe en el DOM.");
                            }
                        }
                        
                        // Usar MutationObserver para detectar cambios en los elementos observados
                        ["totalGastosSELD", "totalGastosOperador"].forEach(id => {
                            const target = document.getElementById(id);
                            if (target) {
                                const observer = new MutationObserver(calcularEgresos);
                                observer.observe(target, {
                                    childList: true,      // Observamos cambios en los hijos (contenido de texto)
                                    characterData: true,  // Observamos cambios en el contenido de texto
                                    subtree: true         // Incluimos nodos descendientes
                                });
                            } else {
                                console.error(`El elemento con id '${id}' no existe.`);
                            }
                        });
                        
                        // Llamada inicial para establecer el valor desde el principio
                        document.addEventListener("DOMContentLoaded", calcularEgresos);


                        function calcularUtilidad() {
                            // Obtener los elementos de ingresos y egresos
                            const ingresosElem = document.getElementById("totalIngresos");
                            const egresosElem = document.getElementById("totalEgresos");

                            if (!ingresosElem || !egresosElem) {
                                console.error("Los elementos 'totalIngresos' o 'totalEgresos' no existen en el DOM.");
                                return;
                            }
                        
                            // Extraer solo la parte numérica de cada elemento y convertir a número
                            const ingresos = parseFloat(ingresosElem.textContent.replace(/[^0-9.-]/g, "")) || 0;
                            const egresos  = parseFloat(egresosElem.textContent.replace(/[^0-9.-]/g, "")) || 0;
                        
                            // Calcular la utilidad (utilidad = ingresos - egresos)
                            const totalUtilidad = ingresos - egresos;
                        
                            // Actualizar el resultado en el elemento correspondiente
                            const totalUtilidadElemento = document.getElementById("totalUtilidad");
                            if (totalUtilidadElemento) {
                                totalUtilidadElemento.textContent = `Total de Utilidad: $${totalUtilidad.toFixed(2)}`;
                            } else {
                                console.error("El elemento 'totalUtilidad' no existe en el DOM.");
                            }
                        }

                        // Usar MutationObserver para detectar cambios en ingresos y egresos y recalcular la utilidad
                        ["totalIngresos", "totalEgresos"].forEach(id => {
                            const target = document.getElementById(id);
                            if (target) {
                                const observer = new MutationObserver(calcularUtilidad);
                                observer.observe(target, {
                                    childList: true,
                                    characterData: true,
                                    subtree: true
                                });
                            } else {
                                console.error(`El elemento con id '${id}' no existe.`);
                            }
                        });

                        // Llamada inicial una vez que el DOM esté completamente cargado
                        document.addEventListener("DOMContentLoaded", calcularUtilidad);
                        
                        // Función para calcular el total de los gastos
                        function calcularTotalGastos() {
                            const totalEgresosElem = document.getElementById("totalEgresos");
                            const totalRellenoDieselElem = document.getElementById("totalRellenoDiesel");
                            const totalGastosElem = document.getElementById("totalGastos");

                            if (!totalEgresosElem || !totalRellenoDieselElem || !totalGastosElem) {
                                console.error("Uno o más elementos no existen en el DOM.");
                                return;
                            }

                            // Extraer valores numéricos de los elementos
                            const totalEgresos = parseFloat(totalEgresosElem.textContent.replace(/[^0-9.-]/g, "")) || 0;
                            const totalRellenoDiesel = parseFloat(totalRellenoDieselElem.textContent.replace(/[^0-9.-]/g, "")) || 0;

                            // Calcular el total de gastos
                            const totalGastos = totalEgresos + totalRellenoDiesel;

                            // Actualizar el elemento correspondiente
                            totalGastosElem.textContent = `Total de Gastos: $${totalGastos.toFixed(2)}`;
                        }

                        // Usar MutationObserver para detectar cambios en los elementos observados
                        ["totalEgresos", "totalRellenoDiesel"].forEach(id => {
                            const target = document.getElementById(id);
                            if (target) {
                                const observer = new MutationObserver(calcularTotalGastos);
                                observer.observe(target, {
                                    childList: true,      // Observamos cambios en los hijos (contenido de texto)
                                    characterData: true,  // Observamos cambios en el contenido de texto
                                    subtree: true         // Incluimos nodos descendientes
                                });
                            } else {
                                console.error(`El elemento con id '${id}' no existe.`);
                            }
                        });

                        // Llamada inicial para establecer el valor desde el principio
                        document.addEventListener("DOMContentLoaded", calcularTotalGastos);

                        // === Función para calcular el rendimiento ===
                        function calcularRendimientoUnidad() {
                            const inicial = parseFloat(document.getElementById("kilometros-iniciales")?.value) || 0;
                            const final = parseFloat(document.getElementById("kilometros-finales")?.value) || 0;
                        
                            const litrosTexto = document.getElementById("totalLitrosDiesel")?.textContent || "0";
                            const litros = parseFloat(litrosTexto.replace(/[^\d.]/g, '')) || 0;
                        
                            const recorridos = final - inicial;
                            const rendimiento = (litros > 0 && recorridos > 0) ? (recorridos / litros) : 0;
                        
                            const rendimientoEl = document.getElementById("RendimientoUnidad");
                            if (rendimientoEl) {
                                rendimientoEl.textContent = `Rendimiento: ${rendimiento.toFixed(2)} km/L`;
                            }
                        
                            const resultadoKm = document.getElementById("resultado-kilometros");
                            if (resultadoKm) {
                                resultadoKm.value = recorridos > 0 ? recorridos : 0;
                            }
                        }

                        // === Observa cambios en los campos de kilómetros ===
                        ["kilometros-iniciales", "kilometros-finales"].forEach(id => {
                            const input = document.getElementById(id);
                            if (input) input.addEventListener("input", calcularRendimientoUnidad);
                        });

                        // === Observa cambios en el contenido de totalLitrosDiesel ===
                        const litrosNode = document.getElementById("totalLitrosDiesel");
                        if (litrosNode) {
                            const observer = new MutationObserver(() => calcularRendimientoUnidad());
                            observer.observe(litrosNode, {
                                childList: true,       // Detecta cambios de texto internos
                                characterData: true,
                                subtree: true
                            });
                        }
                        
                        calcularRendimientoUnidad();

                        //function calcularRendimientoUnidad() {
                        //    const kmInput = document.getElementById("resultado-kilometros");
                        //    const litrosTexto = document.getElementById("totalLitrosDiesel")?.textContent || "0";
                        //    const output = document.getElementById("RendimientoUnidad");
//
                        //    if (!kmInput || !litrosTexto || !output) return;
//
                        //    const kilometros = parseFloat(kmInput.value || 0);
                        //    const litros = parseFloat(litrosTexto.replace(/[^\d.]/g, '')) || 0;
//
                        //    let rendimiento = 0;
                        //    if (kilometros > 0 && litros > 0) {
                        //        rendimiento = kilometros / litros;
                        //    }
                        //
                        //    output.textContent = `Rendimiento: ${rendimiento.toFixed(2)} km/L`;
                        //}
                        //document.addEventListener("DOMContentLoaded", function () {
                        //    // Ejecutar una vez al inicio
                        //    calcularRendimientoUnidad();
                        //
                        //    // Escuchar cambios en el input de kilómetros
                        //    const kmInput = document.getElementById("resultado-kilometros");
                        //    if (kmInput) {
                        //        kmInput.addEventListener("input", calcularRendimientoUnidad);
                        //    }
                        //
                        //    // Escuchar cambios en el total de litros mediante observer
                        //    const litrosElement = document.getElementById("totalLitrosDiesel");
                        //    if (litrosElement) {
                        //        const observer = new MutationObserver(calcularRendimientoUnidad);
                        //        observer.observe(litrosElement, {
                        //            childList: true,
                        //            characterData: true,
                        //            subtree: true
                        //        });
                        //    }
                        //});


                        // Llamada inicial para establecer el valor desde el principio
                        //document.addEventListener("DOMContentLoaded", calcularRendimientoUnidad);
                        

                    </script>
                    <script> // Calcular totales de cada uno de los valores mostrados en mi lista se debera de hacer en automatico de tal manera que se mas eficiente.
                        function calcularTotales() {
                            const campos = [
                                "Carga", "Casetas","compensacionDias","ComisionOperador", "Descarga", "CostoCombustible", 
                                "GastosExtra", "CombustibleNoComprobable", "OtrosGastos", 
                                "Refacciones", "Rampas", "Talachas", "Transito"
                            ];

                            let totalSELD = 0;
                            let totalOperador = 0;

                            campos.forEach(campo => {
                                const valorSELD = parseFloat(document.getElementById(`resumen${campo}`).textContent) || 0;
                                const valorOperador = parseFloat(document.getElementById(`resumen${campo}Operador`).textContent) || 0;

                                totalSELD += valorSELD;
                                totalOperador += valorOperador;
                            });

                            document.getElementById("resumenTotal").textContent = totalSELD.toFixed(2);
                            document.getElementById("resumenTotalOperador").textContent = totalOperador.toFixed(2);
                        }

                        const gastos = {
                            seld: {
                                carga: 0,
                                casetas: 0,
                                comisionOperador: 0,
                                compensacionDias: 0,
                                descarga: 0,
                                costoCombustible: 0,
                                gastosExtra: 0,
                                combustibleNoComprobable: 0,
                                otros: 0,
                                refacciones: 0,
                                rampas: 0,
                                talachas: 0,
                                transito: 0
                            },
                            operador: {
                                carga: 0,
                                casetas: 0,
                                comisionOperador: 0,
                                compensacionDias: 0,
                                descarga: 0,
                                costoCombustible: 0,
                                gastosExtra: 0,
                                combustibleNoComprobable: 0,
                                otros: 0,
                                refacciones: 0,
                                rampas: 0,
                                talachas: 0,
                                transito: 0
                            }
                        };

                        function actualizarResumen(campo, valor, tipo = 'seld') {
                            gastos[tipo][campo] = parseFloat(valor || 0);

                            const resumenCampo = document.getElementById(`resumen${campo.charAt(0).toUpperCase() + campo.slice(1)}`);
                            const resumenCampoOperador = document.getElementById(`resumen${campo.charAt(0).toUpperCase() + campo.slice(1)}Operador`);

                            resumenCampo.textContent = gastos.seld[campo].toFixed(2);
                            resumenCampoOperador.textContent = gastos.operador[campo].toFixed(2);

                            const totalSELD = Object.values(gastos.seld).reduce((acc, curr) => acc + curr, 0);
                            const totalOperador = Object.values(gastos.operador).reduce((acc, curr) => acc + curr, 0);

                            document.getElementById("resumenTotal").textContent = totalSELD.toFixed(2);
                            document.getElementById("resumenTotalOperador").textContent = totalOperador.toFixed(2);
                        }

                        // Validar y actualizar los totales en tiempo real
                        function actualizarResumen(categoria, valor, tipo = "seld") {
                            const totalId = tipo === "seld" ? "totalGastosSELD" : "totalGastosOperador";
                            const inputId = tipo === "seld" ? categoria : `${categoria}Operador`;

                            // Validar que el valor sea un número válido
                            const numero = parseFloat(valor) || 0;

                            // Actualizar el total correspondiente
                            const totalElement = document.getElementById(totalId);
                            const inputs = document.querySelectorAll(`input[id^="${categoria}"]`);
                            let total = 0;

                            inputs.forEach(input => {
                                total += parseFloat(input.value) || 0;
                            });

                            totalElement.textContent = total.toFixed(2);
                        }
                    </script>
                    <div class="mt-4">
                        <button type="button" class="btn-primary bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 shadow-lg" onclick="guardarDatos('costo')">Guardar</button>
                    </div>
                </div>

                <!-- Sección Anticipo de Viaje -->
                <div id="anticipoViajeSection" class="hidden p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Anticipo de Viaje</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-bold mb-1">Monto del Anticipo:</label>
                            <input type="number" id="montoAnticipo" class="shadow border rounded w-full py-2 px-3 text-gray-700" placeholder="Ej. 1200" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-1">Fecha del Anticipo:</label>
                            <input type="date" id="fechaAnticipo" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="button" onclick="guardarAnticipo()" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                            ➕ Agregar Anticipo
                        </button>
                    </div>

                    <!-- Lista -->
                    <h3 class="text-xl font-bold mt-6 text-gray-800">Lista de Anticipos</h3>
                    <ul id="listaAnticipos" class="mt-2 space-y-2"></ul>

                    <!-- Total -->
                    <p class="mt-4 font-bold text-blue-600">Total de Anticipos: $<span id="totalAnticipos">0.00</span></p>

                    <!-- Subtotal -->
                    <div class="mt-6">                                                
                        <p class="mt-4 font-bold text-green-700">Neto a Pagar al Operador: $<span id="netoOperador">0.00</span></p>                        
                    </div>

                    <!-- Ver resumen -->
                    <div class="mt-4">
                        <button onclick="mostrarResumenAnticipos()" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">💰 Ver Resumen</button>                        
                        <button type="button" class="btn-primary bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 shadow-lg" onclick="guardarDatos('costo')">Guardar</button>
                    </div>
                </div>

                <!-- Modal de Resumen -->
                <div id="modalResumen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
                        <h3 class="text-xl font-bold mb-4 text-center text-gray-800">Resumen de Pago</h3>
                        <p><strong>Total Anticipos:</strong> $<span id="resumenAnticipos">0.00</span></p>
                        <p><strong>Neto a Pagar al Operador:</strong> $<span id="resumennetoOperador">0.00</span></p>
                        <p><strong>Pago a Préstamo:</strong> $<span id="resumenPagoPrestamo">0.00</span></p>
                        <p><strong>Total Restante:</strong> $<span id="resumenRestante">0.00</span></p>

                        <div class="mt-6 text-center">
                            <button onclick="cerrarResumen()" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cerrar</button>                            
                        </div>
                    </div>
                </div>

                <script>
                    let anticipos = [];

                    function guardarAnticipo() {
                        const monto = parseFloat(document.getElementById("montoAnticipo").value);
                        const fecha = document.getElementById("fechaAnticipo").value;
                        
                        if (isNaN(monto) || !fecha) {
                            alert("⚠️ Ingresa el monto y la fecha del anticipo.");
                            return;
                        }
                      
                        anticipos.push({ monto, fecha });
                        document.getElementById("montoAnticipo").value = "";
                        document.getElementById("fechaAnticipo").value = "";

                        actualizarListaAnticipos();
                    }

                    function actualizarListaAnticipos() {
                        const lista = document.getElementById("listaAnticipos");
                        const totalAnticipos = anticipos.reduce((acc, val) => acc + val.monto, 0);
                        document.getElementById("totalAnticipos").textContent = totalAnticipos.toFixed(2);
                        lista.innerHTML = "";
                        
                        anticipos.forEach((anticipo, i) => {
                            const li = document.createElement("li");
                            li.className = "bg-gray-100 p-2 rounded flex justify-between items-center";
                            
                            li.innerHTML = `
                                <span><strong>$${anticipo.monto.toFixed(2)}</strong> - 📅 ${anticipo.fecha}</span>
                                <button onclick="eliminarAnticipo(${i})" class="text-red-500 hover:text-red-700">🗑️</button>
                            `;
                            lista.appendChild(li);
                        });
                    }   

                    function eliminarAnticipo(index) {
                        anticipos.splice(index, 1);
                        actualizarListaAnticipos();
                    }

                    function mostrarResumenAnticipos() {
                        const netoOperador = parseFloat(document.getElementById("netoOperador").textContent) || 0;
                        const totalAnticipos = anticipos.reduce((acc, val) => acc + val.monto, 0);
                        const restante = netoOperador - totalAnticipos;
                        
                        document.getElementById("resumenAnticipos").textContent = totalAnticipos.toFixed(2);
                        document.getElementById("resumennetoOperador").textContent = netoOperador.toFixed(2);
                        document.getElementById("resumenRestante").textContent = restante.toFixed(2);
                        
                        document.getElementById("modalResumen").classList.remove("hidden");
                    }

                    function cerrarResumen() {
                        document.getElementById("modalResumen").classList.add("hidden");
                    }

                    function calcularNetoOperador() {
                        const totalGastosTexto = document.getElementById("totalGastosOperador")?.textContent || "0";
                        const totalAnticiposTexto = document.getElementById("totalAnticipos").textContent || "0";

                        const totalGastos = parseFloat(totalGastosTexto.replace(/[^\d.]/g, '')) || 0;
                        const totalAnticipos = parseFloat(totalAnticiposTexto.replace(/[^\d.]/g, '')) || 0;

                        const neto = totalGastos - totalAnticipos;

                        document.getElementById("netoOperador").textContent = neto.toFixed(2);
                    }

                    document.addEventListener("DOMContentLoaded", () => {
                        const observerIds = ["totalGastosOperador", "totalAnticipos"];
                                        
                        observerIds.forEach(id => {
                            const element = document.getElementById(id);
                            if (element) {
                                const observer = new MutationObserver(calcularNetoOperador);
                                observer.observe(element, { childList: true, characterData: true, subtree: true });
                            }
                        });
                    
                        // Llamada inicial
                        calcularNetoOperador();
                    });
                    
                </script>
                <!-- Agrega esto dentro del formulario antes del cierre </form> -->
                <div class="flex justify-center w-full mt-4">
                    <button type="button" 
                            class="btn btn-blue bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 shadow-lg" 
                            onclick="generarPDF()" 
                            id="btnPDF">
                        📄 Generar Reporte FL
                    </button>
                    <br>
                    <button type="button" 
                            class="btn btn-gray bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition duration-300 shadow-lg" 
                            onclick="reiniciarFormulario()" 
                            id="btnReset">
                        🔄 Nuevo Registro
                    </button>
                    <br>
                    <button onclick="guardarTodo()" class="btn btn-primary">💾 Guardar Todo</button>
                </div>
            </form>

            <!-- Sección Historial de PDFs -->
            <div id="historialPDFSection" class="hidden max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-2xl">
                <h3 class="text-2xl font-bold text-center">Historial de FL Generados</h3>
                <ul id="listaPDFs"></ul>
            </div>

            <script>
                function inicializarFolio() {
                    if (!localStorage.getItem('folioActual')) {
                        localStorage.setItem('folioActual', 30000);
                    }
                }

                function obtenerSiguienteFolio() {
                    let folioActual = parseInt(localStorage.getItem('folioActual'));
                    localStorage.setItem('folioActual', folioActual + 1);
                    return folioActual;
                }

                function guardarDatos() {
                    const datos = {
                        liquidacion: {
                            folio: document.getElementById('folio')?.value || '',
                            fechaHora: document.getElementById('fechaHora')?.value || '',
                            origen: document.getElementById('origen')?.value || '',
                            unidad: document.getElementById('unidad')?.value || '',
                            listaOperadores: document.getElementById('listaOperadores')?.value || '',
                            listaClientes: document.getElementById('listaClientes')?.value || '',
                            flete: parseFloat(document.getElementById('flete')?.value) || 0,
                            maniobras: parseFloat(document.getElementById('maniobras')?.value) || 0,
                            destino: document.getElementById('destino')?.value || '',
                            kilometrosIniciales: parseFloat(document.getElementById('kilometros-iniciales')?.value) || 0,
                            kilometrosFinales: parseFloat(document.getElementById('kilometros-finales')?.value) || 0,
                            kilometrosRecorridos: parseFloat(document.getElementById('resultado-kilometros')?.value) || 0,
                            ordenServicio: document.getElementById('ordenServicio')?.value || '',
                            remolque: document.getElementById('remolque')?.value || '',
                            otros: document.getElementById('otros')?.value || '',
                            concepto: document.getElementById('concepto')?.value || ''
                        },
                        costo: {
                            seld: {
                                carga: parseFloat(document.getElementById('carga')?.value) || 0,
                                casetas: parseFloat(document.getElementById('casetas')?.value) || 0,
                                descarga: parseFloat(document.getElementById('descarga')?.value) || 0,
                                comisionOperador: parseFloat(document.getElementById('comisionOperador')?.value) || 0,
                                compensacionDias: parseFloat(document.getElementById('compensacionDias')?.value) || 0,
                                costoCombustible: parseFloat(document.getElementById('costoCombustible')?.value) || 0,
                                gastosExtra: parseFloat(document.getElementById('gastosExtra')?.value) || 0,
                                combustibleNoComprobable: parseFloat(document.getElementById('combustibleNoComprobable')?.value) || 0,
                                otros: parseFloat(document.getElementById('otrosGastos')?.value) || 0,
                                refacciones: parseFloat(document.getElementById('refacciones')?.value) || 0,
                                rampas: parseFloat(document.getElementById('rampas')?.value) || 0,
                                talachas: parseFloat(document.getElementById('talachas')?.value) || 0,
                                transito: parseFloat(document.getElementById('transito')?.value) || 0
                            },
                            operador: {
                                carga: parseFloat(document.getElementById('cargaOperador')?.value) || 0,
                                casetas: parseFloat(document.getElementById('casetasOperador')?.value) || 0,
                                descarga: parseFloat(document.getElementById('descargaOperador')?.value) || 0,
                                comisionOperador: parseFloat(document.getElementById('comisionOperadorOperador')?.value) || 0,
                                compensacionDias: parseFloat(document.getElementById('compensacionDiasOperador')?.value) || 0,
                                costoCombustible: parseFloat(document.getElementById('costoCombustibleOperador')?.value) || 0,
                                gastosExtra: parseFloat(document.getElementById('gastosExtraOperador')?.value) || 0,
                                combustibleNoComprobable: parseFloat(document.getElementById('combustibleNoComprobableOperador')?.value) || 0,
                                otros: parseFloat(document.getElementById('otrosGastosOperador')?.value) || 0,
                                refacciones: parseFloat(document.getElementById('refaccionesOperador')?.value) || 0,
                                rampas: parseFloat(document.getElementById('rampasOperador')?.value) || 0,
                                talachas: parseFloat(document.getElementById('talachasOperador')?.value) || 0,
                                transito: parseFloat(document.getElementById('transitoOperador')?.value) || 0
                            }
                        },
                        anticipo: {
                            anticipos: [],
                            totalAnticipos: 0,
                            netoOperador: 0,
                            restante: 0
                        },
                        resumenPago: {
                            totalAnticipos: parseFloat(document.getElementById('resumenAnticipos')?.textContent.replace(/[^0-9.-]/g, '')) || 0,
                            netoOperador: parseFloat(document.getElementById('resumennetoOperador')?.textContent.replace(/[^0-9.-]/g, '')) || 0,
                            pagoPrestamo: parseFloat(document.getElementById('resumenPagoPrestamo')?.textContent.replace(/[^0-9.-]/g, '')) || 0,
                            totalRestante: parseFloat(document.getElementById('resumenRestante')?.textContent.replace(/[^0-9.-]/g, '')) || 0
                        }                        
                    };

                    console.log(document.getElementById('resumenAnticipos')?.textContent);
                    console.log(document.getElementById('resumennetoOperador')?.textContent);
                    console.log(document.getElementById('resumenPagoPrestamo')?.textContent);

                    // Obtener anticipos desde el DOM
                    const listaAnticipos = document.querySelectorAll('#listaAnticipos li');
                    let totalAnticipos = 0;
                    listaAnticipos.forEach(item => {
                        const texto = item.textContent;
                        const match = texto.match(/\$([0-9,.]+)/);
                        const monto = match ? parseFloat(match[1].replace(/,/g, '')) : 0;
                        const fecha = item.getAttribute('data-fecha') || '';
                        datos.anticipo.anticipos.push({ monto, fecha });
                        totalAnticipos += monto;
                    });

                    const subtotal = parseFloat(document.getElementById('netoOperador')?.textContent.replace(/[^0-9.-]/g, '')) || 0;
                    datos.anticipo.totalAnticipos = totalAnticipos.toFixed(2);
                    datos.anticipo.netoOperador = subtotal.toFixed(2);
                    datos.anticipo.restante = (subtotal - totalAnticipos).toFixed(2);

                    // Validar datos antes de enviar
                    if (!datos.liquidacion.folio || !datos.liquidacion.fechaHora) {
                        alert('⚠️ Por favor, completa los campos obligatorios.');
                        return;
                    }

                    fetch('guardarLiquidacion.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                    },
                        body: JSON.stringify(datos)
                    })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                alert('✅ Datos guardados correctamente.');
                                generarPDF(datos);
                        } else {
                            alert(`❌ Error al guardar los datos: ${result.message}`);
                        }
                    })
                    .catch(error => {
                        console.error('❌ Error en la solicitud AJAX:', error);
                        alert('❌ No se pudo conectar con el servidor.');
                    });
                }

                function guardarTodo() {
                    console.log("Función activa");
                }
                //Funcion para verificar los datos almacenados en el localStorage, para poder ver si se han guardado correctamente los datos.
                //Codigo para la depuracion de los datos por medio de la funcion verificarDatos
                function verificarDatos() {
                    const datos = JSON.parse(localStorage.getItem('formatoLiquidacion'));
                    console.log("Datos almacenados:", datos);
                    if (!datos) {
                        alert("No hay datos almacenados. Por favor, guarda los datos antes de generar el PDF.");
                    }
                }
            
                //Codigo para la depuracion de los datos por medio de la funcion verificarDatos
                function verificarDatos() {
                    const datos = JSON.parse(localStorage.getItem('formatoLiquidacion'));
                    console.log("Datos almacenados:", datos);
                    if (!datos) {
                        alert("No hay datos almacenados. Por favor, guarda los datos antes de generar el PDF.");
                    }
                }
                
                //Fucion para converitr una imagen  en base 64,  con el callback
                function getBase64Image(url, callback) {
                    let img = new Image();
                    img.crossOrigin = "Anonymous";
                    img.src = url;
                    img.onload = function () {
                        let canvas = document.createElement("canvas");
                        canvas.width = img.width;
                        canvas.height = img.height;
                        let ctx = canvas.getContext("2d");
                        ctx.drawImage(img, 0, 0);
                        let dataURL = canvas.toDataURL("image/png");
                        callback(dataURL);
                    };
                }

                //Desde aqui empieza el codigo para generar el PDF (Formato de liquidación)
                function generarPDF() {
                    getBase64Image("/img/SELD.png", function (base64Img) {
                        let datos = JSON.parse(localStorage.getItem('formatoLiquidacion')) || {};
                        let fechaHoy = new Date().toLocaleDateString();
                    
                        const conceptoToKey = {
                            "Carga": "carga",
                            "Casetas": "casetas",
                            "Comisión del Operador": "comisionOperador",
                            "Compensación de Días de Viaje": "compensacionDias",
                            "Descarga": "descarga",
                            "Costo de Combustible": "costoCombustible",
                            "Gastos Extra": "gastosExtra",
                            "Combustible no comprobable": "combustibleNoComprobable",
                            "Otros": "otros",
                            "Refacciones": "refacciones",
                            "Rampas": "rampas",
                            "Talachas": "talachas",
                            "Tránsito": "transito"
                        };
                    
                        const tableBody = [
                            [
                                { text: 'Concepto', style: 'subheader', alignment: 'center' },
                                { text: 'Gts SELD', style: 'subheader', alignment: 'center' },
                                { text: 'Gts Operador', style: 'subheader', alignment: 'center' }
                            ],
                            ...Object.keys(conceptoToKey).map(concepto => {
                                const key = conceptoToKey[concepto];
                                return [
                                    { text: concepto, fontSize: 8, alignment: 'center' },
                                    { text: `$${(datos.costo?.seld?.[key] || 0).toFixed(2)}`, fontSize: 8, alignment: 'center' },
                                    { text: `$${(datos.costo?.operador?.[key] || 0).toFixed(2)}`, fontSize: 8, alignment: 'center' }
                                ];
                            }),
                            [
                                { text: "Total", fontSize: 8, bold: true, alignment: 'center' },
                                { 
                                    text: `$${(
                                        Object.values(datos.costo?.seld || {}).reduce((acc, curr) => acc + parseFloat(curr || 0), 0)
                                    ).toFixed(2)}`, 
                                    fontSize: 8, bold: true, alignment: 'center' 
                                },
                                { 
                                    text: `$${(
                                        Object.values(datos.costo?.operador || {}).reduce((acc, curr) => acc + parseFloat(curr || 0), 0)
                                    ).toFixed(2)}`, 
                                    fontSize: 8, bold: true, alignment: 'center' 
                                }
                            ]
                        ];
                    
                        // Capturar valores del DOM
                        const totalLitrosDiesel = document.getElementById("totalLitrosDiesel")?.textContent || "";
                        const totalRellenoDiesel = document.getElementById("totalRellenoDiesel")?.textContent || "";
                        const totalEgresos = document.getElementById("totalEgresos")?.textContent || "";
                        const totalGastos = document.getElementById("totalGastos")?.textContent || "";
                        const totalIngresos = document.getElementById("totalIngresos")?.textContent || "";
                        const totalUtilidad = document.getElementById("totalUtilidad")?.textContent || "";
                        const rendimientoUnidad = document.getElementById("RendimientoUnidad")?.textContent || "";                        
                    
                        let docDefinition = {
                            content: [
                                {
                                    columns: [
                                        { image: base64Img, width: 150 },
                                        {
                                            stack: [
                                                { 
                                                    text: "Formato de Liquidación", 
                                                    style: "header", 
                                                    alignment: "center",
                                                    margin: [0, 0, 0, 10]
                                                }
                                            ],
                                            width: '*'
                                        },
                                        { 
                                            text: `Folio: ${datos.liquidacion?.folio || ''} | Fecha: ${fechaHoy}`, style: "footer", fontSize: 8,
                                            alignment: "right",
                                            margin: [0, 10, 0, 10],
                                            bold: true,
                                            color: "blue",
                                            width: 'auto'
                                        }
                                    ]
                                },
                                { text: "\n" },
                                { text: "📌 Sección: Datos Generales", style: "subheader" },
                                {
                                    columns: [
                                        {
                                            stack: [
                                                { text: `Fecha y Hora: ${datos.liquidacion?.fechaHora || ''}`, fontSize: 10 },
                                                { text: `Origen: ${datos.liquidacion?.origen || ''}` },
                                                { text: `Unidad: ${datos.liquidacion?.unidad || ''}` },
                                                { text: `Operadores: ${datos.liquidacion?.listaOperadores || ''}` },
                                                { text: `Cliente: ${datos.liquidacion?.listaClientes || ''}` },
                                                { text: `Flete: $${datos.liquidacion?.flete || ''}` },
                                                { text: `Maniobras: $${datos.liquidacion?.maniobras || ''}` }
                                            ]
                                        },
                                        {
                                            stack: [
                                                { text: `Destino: ${datos.liquidacion?.destino || ''}` },
                                                {
                                                    columns: [
                                                        { text: `Km Iniciales: ${datos.liquidacion?.kilometrosIniciales || 0} km`, fontSize: 10, margin: [0, 2, 10, 2] },
                                                        { text: `Km Finales: ${datos.liquidacion?.kilometrosFinales || 0} km`, fontSize: 10, margin: [0, 2, 10, 2] },
                                                        { text: `Km Recorridos: ${datos.liquidacion?.kilometrosRecorridos || 0} km`, fontSize: 10, margin: [0, 2, 0, 2] }
                                                    ]
                                                },
                                                { text: `Orden de Servicio: ${datos.liquidacion?.ordenServicio || ''}` },
                                                { text: `Remolque: ${datos.liquidacion?.remolque || ''}` },
                                                { text: `Otros: ${datos.liquidacion?.otros || ''}` },
                                                { text: `Concepto: ${datos.liquidacion?.concepto || ''}` }
                                            ]
                                        }
                                    ]
                                },
                                { text: "\n" },
                                { text: "💰 Sección: Costo del Viaje", style: "subheader" },
                                {
                                    columns: [
                                        {
                                            width: '55%',
                                            table: {
                                                widths: ['40%', '30%', '30%'],
                                                body: tableBody
                                            },
                                            layout: 'lightHorizontalLines'
                                        },
                                        {
                                            width: '35%',
                                            margin: [10, 0, 0, 0],
                                            stack: [
                                                { text: "📊 Resumen del Rendimiento", bold: true, fontSize: 12, alignment: 'right', margin: [0, 2, 0, 4] },
                                                {
                                                    ul: [
                                                        { text: totalLitrosDiesel, margin: [0, 1, 0, 1], alignment: 'right' },
                                                        { text: totalRellenoDiesel, margin: [0, 1, 0, 1], alignment: 'right' },
                                                        { text: totalEgresos, margin: [0, 1, 0, 1], alignment: 'right' },
                                                        { text: totalGastos, margin: [0, 2, 0, 1], alignment: 'right' },
                                                        { text: totalIngresos, margin: [0, 1, 0, 1], alignment: 'right' },
                                                        { text: totalUtilidad, margin: [0, 1, 0, 1], alignment: 'right' },
                                                        { text: rendimientoUnidad, margin: [0, 1, 0, 1], alignment: 'right' }
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                columns: [
                                    // Tabla de "Resumen de Anticipos y Pagos" (lado izquierdo)
                                    {
                                        width: '50%',
                                        text: "\n",
                                        stack: [
                                            { text: "💵 Resumen de Anticipos y Pagos", style: "subheader", margin: [0, 10, 0, 5] },
                                            {
                                                table: {
                                                    widths: ['*', '*'],
                                                    body: [
                                                        [
                                                            { text: "Concepto", style: "tableHeader", fillColor: '#F3F4F6', fontSize: 8 },
                                                            { text: "Monto", style: "tableHeader", fillColor: '#F3F4F6', fontSize: 8 }
                                                        ],
                                                        ...anticipos.map((anticipo, index) => [
                                                            { text: `Anticipo ${index + 1} - Fecha: ${anticipo.fecha}`, fontSize: 8 },
                                                            { text: `$${anticipo.monto.toFixed(2)}`, fontSize: 8 }
                                                        ]),
                                                        [
                                                            { text: "Total de Anticipos", bold: true, fontSize: 8 },
                                                            { text: `$${parseFloat(document.getElementById("totalAnticipos")?.textContent.replace(/[^0-9.-]/g, '') || 0).toFixed(2)}`, fontSize: 8 }
                                                        ],
                                                        [
                                                            { text: "Subtotal a Pagar", bold: true, fontSize: 8 },
                                                            { text: `$${parseFloat(document.getElementById("netoOperador")?.textContent.replace(/[^0-9.-]/g, '') || 0).toFixed(2)}`, fontSize: 8 }
                                                        ],
                                                        [
                                                            { text: "Total Restante", bold: true, fontSize: 8 },
                                                            { text: `$${(parseFloat(document.getElementById("netoOperador")?.textContent.replace(/[^0-9.-]/g, '') || 0) - parseFloat(document.getElementById("totalAnticipos")?.textContent.replace(/[^0-9.-]/g, '') || 0)).toFixed(2)}`, fontSize: 8 }
                                                        ]
                                                    ]
                                                },
                                                layout: 'lightHorizontalLines',
                                                margin: [0, 0, 0, 10]
                                            }
                                        ]
                                    },
                                    // Tabla de "Resumen de Pago" (lado derecho)
                                    {
                                        width: '50%',
                                        stack: [
                                            { text: "Resumen de Pago", style: "subheader", margin: [0, 10, 0, 5] },
                                            {
                                                table: {
                                                    widths: ['25%', '25%', '25%', '25%'],
                                                    body: [
                                                        [
                                                            { text: "Total Anticipos", style: "tableHeader", fillColor: '#F3F4F6', fontSize: 8, alignment: 'center' },
                                                            { text: "Neto Operador", style: "tableHeader", fillColor: '#F3F4F6', fontSize: 8, alignment: 'center' },
                                                            { text: "Pago a Préstamo", style: "tableHeader", fillColor: '#F3F4F6', fontSize: 8, alignment: 'center' },
                                                            { text: "Total Restante", style: "tableHeader", fillColor: '#F3F4F6', fontSize: 8, alignment: 'center' }
                                                        ],
                                                        [
                                                            { text: `$${parseFloat(document.getElementById('resumenAnticipos')?.textContent.replace(/[^0-9.-]/g, '')) || 0}`, fontSize: 8, alignment: 'center' },
                                                            { text: `$${parseFloat(document.getElementById('resumennetoOperador')?.textContent.replace(/[^0-9.-]/g, '')) || 0}`, fontSize: 8, alignment: 'center' },
                                                            { text: `$${parseFloat(document.getElementById('resumenPagoPrestamo')?.textContent.replace(/[^0-9.-]/g, '')) || 0}`, fontSize: 8, alignment: 'center' },
                                                            { text: `$${parseFloat(document.getElementById('resumenRestante')?.textContent.replace(/[^0-9.-]/g, '')) || 0}`, fontSize: 8, alignment: 'center' }
                                                        ]
                                                    ]
                                                },
                                                layout: 'lightHorizontalLines',
                                                margin: [0, 0, 0, 10]
                                            }
                                        ]
                                    }
                                ],
                                columnGap: 10 // Ajusta la separación entre las columnas
                            }                    
                            ],                                                                               
                            styles: {
                                header: { fontSize: 18, bold: true, alignment: "center" },
                                subheader: { fontSize: 14, bold: true, margin: [0, 10, 0, 5] },
                                footer: { fontSize: 10, alignment: "right", margin: [32, 32, 40, 0] }
                            }
                        };
                    
                        pdfMake.createPdf(docDefinition).download(`Liquidacion_${datos.liquidacion?.folio || 'sin_folio'}.pdf`);
                    });
                }


                function reiniciarFormulario() {
                    localStorage.removeItem('formatoLiquidacion');
                    document.getElementById("formLiquidacion").reset();
                    alert("Formulario reiniciado.");
                }

                document.querySelectorAll(".tab-btn").forEach(btn => {
                    btn.addEventListener("click", () => {
                        document.querySelectorAll(".tab-content").forEach(section => section.classList.add("hidden"));
                        document.getElementById(btn.getAttribute("data-tab") + "Section").classList.remove("hidden");
                    });
                });

                document.addEventListener("DOMContentLoaded", function() {
                    inicializarFolio();
                    document.getElementById('folio').value = obtenerSiguienteFolio();
                });
            </script>
        </main>
    </body>

</html>