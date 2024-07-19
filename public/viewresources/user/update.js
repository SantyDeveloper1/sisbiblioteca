'use strict';

$(() => {
    $('#form-password-update').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields: {
            txtPassword: {
                validators: {
                    notEmpty: {
                        message: '<b style="color: red;">La contraseña actual es requerida.</b>'
                    }
                }
            },
            txtPassword1: {
                validators: {
                    notEmpty: {
                        message: '<b style="color: red;">La nueva contraseña es requerida.</b>'
                    },
                    stringLength: {
                        min: 8,
                        message: '<b style="color: red;">La nueva contraseña debe tener al menos 8 caracteres.</b>'
                    }
                }
            },
            txtPassword2: {
                validators: {
                    notEmpty: {
                        message: '<b style="color: red;">La confirmación de la nueva contraseña es requerida.</b>'
                    },
                    identical: {
                        field: 'txtPassword1',
                        message: '<b style="color: red;">La confirmación de la contraseña no coincide.</b>'
                    }
                }
            }
        }
    });
});

function sendFrmPassword() {
    var isValid = null;

    $('#form-password-update').data('formValidation').resetForm();
    $('#form-password-update').data('formValidation').validate();

    isValid = $('#form-password-update').data('formValidation').isValid();

    if(!isValid) {
		new PNotify(
		{
			title : 'No se pudo proceder',
			text : 'Complete y corrija toda la infirmación del formulario.',
			type : 'error'
		});
		return;
	}

    // Enviar el formulario mediante AJAX
    $.ajax({
        url: $('#form-password-update').attr('action'),
        method: 'POST',
        data: $('#form-password-update').serialize(),
        success: function(response) {
            new PNotify({
                title: 'Éxito',
                text: 'La Contraseña se actualizó correctamente.',
                type: 'success'
            });
            $('#modal-password').modal('hide');
            //window.location.reload();
        },
        
    
        error: function(xhr, status, error) {
            new PNotify({
                title: 'Error',
                text: 'Error al actualizar la contraseña.',
                type: 'error'
            });
            window.location.reload();
            }
    });
}
