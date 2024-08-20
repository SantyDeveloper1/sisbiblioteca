'use strict';
$(document).ready(function() {
    // Configura el token CSRF para todas las solicitudes AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#modal-perfil').on('show.bs.modal', function() {
        var userId = $('#id').val();  // Obtén el ID del usuario de algún lugar, por ejemplo, de un campo oculto

        $.ajax({
            url: _urlBase + '/user/get/' + userId,
            method: 'GET',
            success: function(response) {
                // Cargar los datos en el modal
                $('#id').val(response.id);
                $('#txtFirstName').val(response.name);
                $('#txtSurName').val(response.surName);
                $('#txtSurNameM').val(response.surNameM);
                $('#txtDNIName').val(response.Surdni);
                $('#txtEmail').val(response.email);
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener la información del usuario:', error);

                new PNotify({
                    title: 'Error',
                    text: 'No se pudo obtener la información del usuario.',
                    type: 'error'
                });
            }
        });
    });

    $('#saveProfileBtn').on('click', function() {
        var userId = $('#id').val();
        var data = {
            txtFirstName: $('#txtFirstName').val(),
            txtSurName: $('#txtSurName').val(),
            txtSurNameM: $('#txtSurNameM').val(),
            txtDNIName: $('#txtDNIName').val(),
            txtEmail: $('#txtEmail').val()
        };
        $.ajax({
            url: _urlBase + '/user/updateUser/' + userId,
            method: 'POST',
            data: data,
            success: function(response) {
                new PNotify({
                    title: 'Éxito',
                    text: 'Perfil actualizado correctamente 😜.',
                    type: 'success'
                });
                // Oculta el modal
                $('#modal-perfil').modal('hide');
                // Recarga la página después de 5 segundos
                setTimeout(function() {
                    location.reload(); // Recarga la página
                }, 5000);
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = errors.join('<br>');
                    new PNotify({
                        title: 'Error',
                        text: errorMessages,
                        type: 'error'
                    });
                } else {
                    new PNotify({
                        title: 'Error',
                        text: 'Se produjo un error al actualizar el perfil.',
                        type: 'error'
                    });
                }
            }
        });
    });
});