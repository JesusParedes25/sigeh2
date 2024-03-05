<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //brian protected $redirectTo = '/home';
    protected function authenticated(Request $request, $user)
    {
        // Verificar la variable específica en el usuario
        if ($user->tipo === 'ciudadania') {
            // Redirigir a la ruta para el administrador
            return redirect()->route('projects');
        } elseif ($user->tipo === 'dependencia') {
            // Redirigir a la ruta para el cliente
            return redirect()->route('/home');
        }

        // Redirigir a una ruta por defecto si no hay una coincidencia de roles
        return redirect()->route('default.dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
