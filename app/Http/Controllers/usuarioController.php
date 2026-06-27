<?php

namespace App\Http\Controllers;
use App\Models\Mascota;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
    public function showRegister()
    {
        return view('crearCuenta');
    }

   public function register(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'telefono' => 'required',
        'numero_documento' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed'
    ]);

    $user = User::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'telefono' => $request->telefono,
        'numero_documento' => $request->numero_documento,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'rol' => 'usuario'
    ]);

    Auth::login($user);

    return redirect()->route('home');
}

 public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        if (Auth::user()->rol === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('home');
    }

    return back()->withErrors([
        'email' => 'Correo o contraseña incorrectos.',
    ])->onlyInput('email');
}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login');
}
}