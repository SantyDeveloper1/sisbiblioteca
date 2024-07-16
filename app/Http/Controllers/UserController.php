<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
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
}
