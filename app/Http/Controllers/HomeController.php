<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller {
    public function actionHome(Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];

            // Validar campos requeridos y correo electrónico
            $validator = Validator::make(
                $request->all(),
                [
                    'txtCorreo' => 'required|email',
                    'txtPassword' => 'required',
                ],
                [
                    'txtCorreo.required' => 'El campo "correo" es requerido.',
                    'txtCorreo.email' => 'El campo "correo" debe ser un correo válido.',
                    'txtPassword.required' => 'El campo "password" es requerido.',
                ]
            );

            if ($validator->fails()) {
                // Recoger mensajes de error de la validación
                $errors = $validator->errors();
                if ($errors->has('txtCorreo')) {
                    $listMessage[] = $errors->first('txtCorreo');
                }
                if ($errors->has('txtPassword')) {
                    $listMessage[] = $errors->first('txtPassword');
                }
            } else {
                // Validar credenciales en la base de datos
                $correo = $request->input('txtCorreo');
                $password = $request->input('txtPassword');

                // Buscar usuario por correo
                $user = User::where('email', $correo)->first();

                if ($user) {
                    if ($password === $user->password) { // Comparación directa, no encriptada
                        // Credenciales válidas
                        $sessionManager->flash('listMessage', ['Inicio de sesión exitoso.']);
                        $sessionManager->flash('typeMessage', 'success');

                        // Aquí puedes redirigir al usuario a su dashboard o página principal
                        return redirect('/home');
                    } else {
                        // Contraseña incorrecta
                        $listMessage[] = 'La contraseña ingresada es incorrecta.';
                    }
                } else {
                    // Usuario no encontrado
                    $listMessage[] = 'El correo electrónico ingresado no está registrado.';
                }
            }

            if (!empty($listMessage)) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');
                return redirect('/home');
            }
        }
        return view('admin/home.home'); // Asegúrate de que la vista esté correcta
    }
}