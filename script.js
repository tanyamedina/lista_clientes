$(document).ready(function() {
    // Inicializa DataTables y traduce a español, desactivando búsqueda en la columna Teléfono
    var table = $('#tabla-clientes').DataTable({
        "language": {
            "url": "i18n/Spanish.json"  // Ruta local al archivo Spanish.json
        },
        "columnDefs": [
            { "searchable": false, "targets": 3 } // Deshabilitar búsqueda en la columna de Teléfono (índice 3)
        ]
    });

    // Función para cargar los datos de clientes desde el servidor
    function cargarClientes() {
        $.ajax({
            type: "GET",
            url: "getClients.php",  // Llamada al archivo PHP que obtiene los datos
            dataType: "json", // Espera una respuesta en formato JSON
            success: function(clientes) {
                table.clear().draw(); // Limpia todas las filas actuales de DataTables

                // Recorrer cada cliente y añadirlo a la tabla
                $.each(clientes, function(index, cliente) {
                    var fila = `
                        <tr>
                            <td>${cliente.id}</td>
                            <td>${cliente.nombre}</td>
                            <td>${cliente.apellido}</td>
                            <td>${cliente.telefono}</td>
                            <td>
                                <button class="btn btn-light btn-editar" style="color: #3739b6;" data-id="${cliente.id}" data-nombre="${cliente.nombre}" data-apellido="${cliente.apellido}" data-telefono="${cliente.telefono}">Editar</button>
                                <button class="btn btn-secondary btn-borrar" data-id="${cliente.id}">Borrar</button>
                            </td>
                        </tr>
                    `;
                    table.row.add($(fila)).draw(false); // Añadir la fila sin reiniciar la paginación
                });
            },
            error: function() {
                alert("Error al cargar los datos de los clientes.");
            }
        });
    }

    // Llamar a la función para cargar los clientes al inicio
    cargarClientes();

    // Delegación de eventos para manejar el click en los botones "Borrar"
    $('#tabla-clientes').on('click', '.btn-borrar', function() {
        var clienteId = $(this).data('id');
        var row = $(this).closest('tr'); // Selecciona la fila correspondiente
    
        if (confirm('¿Estás seguro de que deseas borrar este cliente?')) {
            $.ajax({
                type: 'POST',
                url: 'deleteClient.php', // Archivo PHP que manejará la eliminación
                data: { id: clienteId },
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert('Cliente borrado correctamente.');
                        
                        // Eliminar la fila de la tabla DataTables sin recargar toda la tabla
                        table.row(row).remove().draw(false); // Remueve la fila y redibuja sin reiniciar la paginación
                    } else {
                        alert('Error al borrar el cliente.');
                    }
                },
                error: function() {
                    alert('Error en la solicitud al servidor.');
                }
            });
        }
    });

    // ---------------------- INICIO DE LA SECCIÓN DE EDICIÓN ---------------------- //
    
    // Delegación de eventos para manejar el click en los botones "Editar"
    $('#tabla-clientes').on('click', '.btn-editar', function() {
        var clienteId = $(this).data('id');
        var nombre = $(this).data('nombre');
        var apellido = $(this).data('apellido');
        var telefono = $(this).data('telefono');

        // Cargar los datos del cliente en el modal de edición
        $('#editar-id').val(clienteId);
        $('#editar-nombre').val(nombre);
        $('#editar-apellido').val(apellido);
        $('#editar-telefono').val(telefono);

        // Mostrar el modal de edición
        $('#modal-editar-cliente').modal('show');
    });

    // Manejar el formulario de edición de cliente
    $('#form-editar-cliente').submit(function(e) {
        e.preventDefault(); // Prevenir el comportamiento por defecto del formulario

        var id = $('#editar-id').val();
        var nombre = $('#editar-nombre').val();
        var apellido = $('#editar-apellido').val();
        var telefono = $('#editar-telefono').val();

        $.ajax({
            type: 'POST',
            url: 'editClient.php', // Archivo PHP que manejará la actualización
            data: {
                id: id,
                nombre: nombre,
                apellido: apellido,
                telefono: telefono
            },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status === 'success') {
                    alert('Cliente actualizado correctamente.');
                    $('#modal-editar-cliente').modal('hide'); // Cerrar el modal de edición
                    
                    // Recargar los clientes después de la edición
                    cargarClientes(); // Recargar los clientes para reflejar los cambios
                } else {
                    alert('Error al actualizar el cliente.');
                }
            },
            error: function() {
                alert('Error en la solicitud al servidor.');
            }
        });
    });

    // ---------------------- FIN DE LA SECCIÓN DE EDICIÓN ---------------------- //

    // Evento para manejar el envío del formulario de agregar cliente
    $('#form-agregar-cliente').submit(function(e) {
        e.preventDefault(); // Prevenir que se recargue la página

        // Recoger los datos del formulario
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var telefono = $('#telefono').val();

        // Enviar los datos al servidor mediante AJAX
        $.ajax({
            type: "POST",
            url: "addClient.php", // El archivo PHP que va a procesar los datos
            data: {
                nombre: nombre,
                apellido: apellido,
                telefono: telefono
            },
            success: function(response) {
                alert("Cliente agregado correctamente.");
                // Limpiar el formulario
                $('#form-agregar-cliente')[0].reset();

                // Recargar los clientes para mostrar el nuevo cliente en la tabla
                cargarClientes(); // Volver a cargar los clientes
            },
            error: function() {
                alert("Error al agregar el cliente.");
            }
        });
    });
});