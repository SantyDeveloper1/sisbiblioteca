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
}


