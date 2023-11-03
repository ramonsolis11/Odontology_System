<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // Método para mostrar el formulario de registro de pacientes
    public function showPatientRegistrationForm() {
        return view('auth.register-patient');
    }

    // Método para registrar un nuevo paciente
    public function registerPatient(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        $user->role = 'patient';  // Asigna el rol de paciente
        $user->save();

        $this->guard()->login($user);

        return redirect($this->redirectPath())->with('success', 'Paciente registrado con éxito');
    }
}

