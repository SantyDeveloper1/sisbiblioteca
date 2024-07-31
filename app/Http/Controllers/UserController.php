<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function actionInsert(Request $request, SessionManager $sessionManager)
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
    }
    
    public function actionUpdatePassword(Request $request, SessionManager $sessionManager, $id)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];
            $validator = Validator::make($request->all(), 
            [
                'txtPassword' => 'required',
                'txtPassword1' => 'required|min:8',
                'txtPassword2' => 'required|same:txtPassword1',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $value) {
                    $listMessage[] = $value;
                }
                return response()->json(['message' => implode("\n", $listMessage)], 422);
            }

            $user = Auth::user();
            if (!Hash::check($request->input('txtPassword'), $user->password)) {
                $listMessage[] = 'La contraseña actual es incorrecta.';
                return response()->json(['message' => implode("\n", $listMessage)], 422);
                //$sessionManager->flash('typeMessage', 'error');
                //return response()->json(['message' => 'La contraseña Actual es incorrecto.']);
            }

            $user->password = Hash::make($request->input('txtPassword1'));
            $user->save();

             // Cerrar la sesión del usuario
             Auth::logout();
             
            $sessionManager->flash('typeMessage', 'success');
            return response()->json(['message' => 'La contraseña se actualizó correctamente.']);
            
        }

        return response()->json(['message' => 'Método no permitido.'], 405);
    }

    public function getUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado.'], 404);
        }

        return response()->json($user);
    }

    public function actionUpdateUser(Request $request, $id)
    {
        try {
            // Validación de datos
            $validator = Validator::make(
                [
                    'txtFirstName' => trim($request->input('txtFirstName')),
                    'txtSurName' => trim($request->input('txtSurName')),
                    'txtSurNameM' => trim($request->input('txtSurNameM')),
                    'txtDNIName' => trim($request->input('txtDNIName')),
                    'txtEmail' => trim($request->input('txtEmail')),
                ],
                [
                    'txtFirstName' => 'required|string|max:255',
                    'txtSurName' => 'required|string|max:255',
                    'txtSurNameM' => 'required|string|max:255',
                    'txtDNIName' => ['required', 'regex:/^\d{8}$/'], // Verifica que sean 8 números
                    'txtEmail' => 'required|email|max:255',
                ],
                [
                    'txtFirstName.required' => 'El campo "Nombre" es requerido.',
                    'txtSurName.required' => 'El campo "Apellido Paterno" es requerido.',
                    'txtSurNameM.required' => 'El campo "Apellido Materno" es requerido.',
                    'txtDNIName.required' => 'El campo "DNI" es requerido.',
                    'txtDNIName.regex' => 'El DNI debe tener exactamente 8 caracteres numéricos.',
                    'txtEmail.required' => 'El campo "Correo Electrónico" es requerido.',
                    'txtEmail.email' => 'El campo "Correo Electrónico" debe ser una dirección de correo válida.',
                    'txtEmail.max' => 'El campo "Correo Electrónico" no puede tener más de 255 caracteres.',
                ]
            );

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()->all()], 422);
            }

            // Encontrar el usuario y actualizarlo
            $user = User::findOrFail($id);
            $user->name = $request->input('txtFirstName');
            $user->surName = $request->input('txtSurName');
            $user->surNameM = $request->input('txtSurNameM');
            $user->Surdni = $request->input('txtDNIName');
            $user->email = $request->input('txtEmail');
            $user->save();

            return response()->json(['success' => true, 'message' => 'Perfil actualizado correctamente.']);

        } catch (\Exception $e) {
            \Log::error('Error al actualizar el perfil del usuario: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Se produjo un error al actualizar el perfil.'], 500);
        }
    }

}