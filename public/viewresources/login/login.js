
'use strict';

$(() =>
{
	$('#frmLoginSesion').formValidation(
	{
		framework: 'bootstrap',
		excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
		live: 'enabled',
		message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
		trigger: null,
		fields:
		{
			txtCorreo:
			{
				validators:
				{
					notEmpty:
					{
						message: '<b style="color: red;">El campo de Email es requerido.</b>'
					},
					emailAddress:
					{
						message: '<b style="color: red;">El correo electrónico no es válido.</b>'
					}
				}
			},
			txtPassword:
			{
				validators:
				{
					notEmpty:
					{
						message: '<b style="color: red;">El campo de Password es requerido.</b>'
					}
				}
			}
		}
	});
});

function sendFrmLoginSesion() {
	var isValid = null;

	$('#frmLoginSesion').data('formValidation').resetForm();
	$('#frmLoginSesion').data('formValidation').validate();

	isValid = $('#frmLoginSesion').data('formValidation').isValid();

	if (!isValid) {
		new PNotify(
		{
			title : 'No se pudo proceder',
			text : 'Complete y corrija toda la información del formulario.',
			type : 'error'
		});

		return;
	}

	/*swal(
	{
		title : 'Confirmar operación',
		text : '¿Realmente desea proceder?',
		icon : 'warning',
		buttons : ['No, cancelar.', 'Si, proceder.']
	})
	.then((proceed) =>
	{
		if (proceed)
		{
			//Llamar aquí a la función para mostrar el loader.

			$('#frmLoginSesion')[0].submit();
		}
	});*/
	$('#frmLoginSesion')[0].submit();
}