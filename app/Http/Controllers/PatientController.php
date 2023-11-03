<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', ['patients' => $patients]);
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:patients',
            // ... otras validaciones
        ]);

        $patient = new Patient;
        $patient->name = $request->name;
        $patient->email = $request->email;
        // ... asignar otros campos
        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Paciente creado con éxito');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:patients,email,' . $id,
            // ... otras validaciones
        ]);

        $patient = Patient::findOrFail($id);
        $patient->name = $request->name;
        $patient->email = $request->email;
        // ... actualizar otros campos
        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado con éxito');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Paciente eliminado con éxito');
    }
}

