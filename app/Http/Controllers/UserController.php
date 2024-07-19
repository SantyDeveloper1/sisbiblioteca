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
    
    public function actionUpdatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'txtPassword' => 'required',
            'txtPassword1' => 'required|min:8',
            'txtPassword2' => 'required|same:txtPassword1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        $user = Auth::user();
        if (!Hash::check($request->input('txtPassword'), $user->password)) {
            return response()->json(['errors' => ['La contraseña actual es incorrecta.']], 422);
        }

        $user->password = Hash::make($request->input('txtPassword1'));
        $user->save();

        return response()->json(['message' => 'La contraseña se actualizó correctamente.']);
    }

}
