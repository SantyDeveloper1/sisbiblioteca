<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
 
class UserController extends Controller
{
	public function actionInsert(Request $request, SessionManager $sessionManager)
    {
    
    return view('admin/users.users'); // Asegúrate de que la vista esté correcta
    }
}