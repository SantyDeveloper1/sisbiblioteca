<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller {
    public function actionHome(Request $request, SessionManager $sessionManager)
    {
        
        return view('admin/home.home'); // Asegúrate de que la vista esté correcta
    }
}