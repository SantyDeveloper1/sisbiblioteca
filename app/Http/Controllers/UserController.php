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
        // Obtener todos los usuarios de la base de datos
        $users = User::all();

        // Pasar los usuarios a la vista
        return view('admin.users.users', compact('users')); // Asegúrate de que la vista esté correcta
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
                return response(implode("\n", $listMessage), 422);  // Devuelve los mensajes de error
            }

            $user = Auth::user();
            if (!Hash::check($request->input('txtPassword'), $user->password)) {
                $listMessage[] = 'La contraseña actual es incorrecta.';
                return response(implode("\n", $listMessage), 422);  // Devuelve el mensaje de error
            }

            $user->password = Hash::make($request->input('txtPassword1'));
            $user->save();
            $sessionManager->flash('listMessage', ['Actualización realizada correctamente.']);
            $sessionManager->flash('typeMessage', 'success');
           // return response('La contraseña se actualizó correctamente.');  // Devuelve mensaje de éxito
        }

        return response('Método no permitido.', 405);
    }

}
