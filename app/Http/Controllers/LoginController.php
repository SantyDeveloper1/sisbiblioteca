<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller {

    public function actionLogin()
    {
        return view('login.login');
    }

    public function actionLoginSesion(Request $request, SessionManager $sessionManager)
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

                // Intentar autenticar al usuario
                $credentials = [
                    'email' => $correo,
                    'password' => $password,
                ];

                if (Auth::attempt($credentials)) {
                    // Credenciales válidas
                    $sessionManager->flash('listMessage', ['Inicio de sesión exitoso.']);
                    $sessionManager->flash('typeMessage', 'success');

                    // Redirigir al usuario a su dashboard o página principal
                    return redirect()->intended('/home');
                } else {
                    // Contraseña incorrecta o usuario no encontrado
                    $listMessage[] = 'Correo electrónico o contraseña incorrectos.';
                }
            }

            if (!empty($listMessage)) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');
                return redirect('/login')->withInput(); // Mantener datos del formulario en caso de error
            }
        }

        return view('admin/login.login'); // Asegúrate de que la vista esté correcta
    }
    
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}