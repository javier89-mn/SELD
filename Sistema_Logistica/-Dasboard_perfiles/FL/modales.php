<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
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
    </style>
    <body>
        <main class="flex-1 p-6">
            <div class="flex flex-col">
        
                <!-- Sidebar -->
                <div class="w-1/4 bg-white p-4 rounded-lg shadow-lg ml-auto mb-4">
                    <h3 class="text-xl font-bold mb-4">Gestión Rápida</h3>
                    <button class="btn-primary w-full mb-2" onclick="mostrarModal('modalOperador')">Agregar Operador</button>
                    <button class="btn-primary w-full mb-2" onclick="mostrarModal('modalUnidad')">Agregar Unidad</button>
                    <button class="btn-primary w-full" onclick="mostrarModal('modalRuta')">Agregar Ruta</button>
                </div>
        
                <!-- Main Content -->
                <div class="flex-1">
                    <!-- Aquí va el contenido principal -->
                </div>
            </div>
        </main>

            <!-- Modales -->
            <div id="modalOperador" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <h2 class="text-xl font-bold mb-4">Agregar Nuevo Operador</h2>
                    <input type="text" id="nuevoOperador" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nombre del Operador">
                    <div class="flex justify-end mt-4">
                        <button class="btn-secondary mr-2" onclick="agregarOperador()">Agregar</button>
                        <button class="btn-primary" onclick="cerrarModal('modalOperador')">Cancelar</button>
                    </div>
                </div>
            </div>

            <div id="modalUnidad" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <h2 class="text-xl font-bold mb-4">Agregar Nueva Unidad</h2>
                    <input type="text" id="nuevaUnidad" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nombre de la Unidad">
                    <div class="flex justify-end mt-4">
                        <button class="btn-secondary mr-2" onclick="agregarUnidad()">Agregar</button>
                        <button class="btn-primary" onclick="cerrarModal('modalUnidad')">Cancelar</button>
                    </div>
                </div>
            </div>

            <div id="modalRuta" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <h2 class="text-xl font-bold mb-4">Agregar Nueva Ruta</h2>
                    <input type="text" id="nuevaRuta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nombre de la Ruta">
                    <div class="flex justify-end mt-4">
                        <button class="btn-secondary mr-2" onclick="agregarRuta()">Agregar</button>
                        <button class="btn-primary" onclick="cerrarModal('modalRuta')">Cancelar</button>
                    </div>
                </div>
            </div>

            <script>
                function mostrarModal(modalId) {
                    document.getElementById(modalId).classList.remove('hidden');
                }

                function cerrarModal(modalId) {
                    document.getElementById(modalId).classList.add('hidden');
                }
            </script>

            <script>
                function agregarOperador() {
                    const operador = document.getElementById('nuevoOperador').value;
                    if (operador) {
                        alert(`Operador "${operador}" agregado correctamente.`);
                        document.getElementById('nuevoOperador').value = '';
                    } else {
                        alert('Por favor, ingrese un nombre de operador.');
                    }
                }

                function agregarUnidad() {
                    const unidad = document.getElementById('nuevaUnidad').value;
                    if (unidad) {
                        alert(`Unidad "${unidad}" agregada correctamente.`);
                        document.getElementById('nuevaUnidad').value = '';
                    } else {
                        alert('Por favor, ingrese un nombre de unidad.');
                    }
                }

                function agregarRuta() {
                    const ruta = document.getElementById('nuevaRuta').value;
                    if (ruta) {
                        alert(`Ruta "${ruta}" agregada correctamente.`);
                        document.getElementById('nuevaRuta').value = '';
                    } else {
                        alert('Por favor, ingrese un nombre de ruta.');
                    }
                }
            </script>
        </main>
    </body>
</html>