$(() => {
    $('#frm-InsertUser').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields: {
            txtFirstName: {
                validators: {
                    notEmpty: {
                        message: '<b style="color: red;">El campo Nombre es requerido.</b>'
                    }
                }
            },
            txtSurName: {
                validators: {
                    notEmpty: {
                        message: '<b style="color: red;">El campo Apellido Paterno es requerido.</b>'
                    }
                }
            },
            txtSurNameM: {
                validators: {
                    notEmpty: {
                        message: '<b style="color: red;">El campo Apellido Materno es requerido.</b>'
                    }
                }
            }
        }
    });
});

function sendFrmUserInsert() {
    var isValid = null;

    $('#frm-InsertUser').data('formValidation').resetForm();
    $('#frm-InsertUser').data('formValidation').validate();

    isValid = $('#frm-InsertUser').data('formValidation').isValid();

    if (!isValid) {
        new PNotify({
            title: 'No se pudo proceder',
            text: 'Complete y corrija toda la información del formulario.',
            type: 'error'
        });
        return;
    }

    $('#frm-InsertUser').submit();
}