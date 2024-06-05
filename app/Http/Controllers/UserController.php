<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Maneja la autenticación del usuario.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si las credenciales son válidas, redirige al usuario a la página de inicio
            return redirect()->intended('/');
        } else {
            // Si las credenciales son inválidas, vuelve al formulario de inicio de sesión con un mensaje de error
            return redirect()->back()->withInput()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.']);
        }
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Muestra el formulario de registro de usuario.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Maneja el registro de un nuevo usuario.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->intended('/');
    }
}
