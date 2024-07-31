<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller {
    public function actionHome(Request $request)
    {
        // Obtén el ID del usuario autenticado
       // $authenticatedUserId = Auth::id();
        
        // Filtra los usuarios excluyendo al usuario autenticado
       // $users = User::where('id', '!=', $authenticatedUserId)->get();
        
        // Pasa los usuarios filtrados a la vista
        return view('admin/home.home');
    }
}
