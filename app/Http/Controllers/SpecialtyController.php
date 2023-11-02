<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:specialties',
        ]);

        $specialty = new Specialty;
        $specialty->name = $request->name;
        $specialty->save();

        return redirect()->route('specialties.index')->with('success', 'Specialty created successfully');
    }

    public function show($id)
    {
        $specialty = Specialty::findOrFail($id);
        return view('specialties.show', compact('specialty'));
    }

    public function edit($id)
    {
        $specialty = Specialty::findOrFail($id);
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:specialties,name,' . $id,
        ]);

        $specialty = Specialty::findOrFail($id);
        $specialty->name = $request->name;
        $specialty->save();

        return redirect()->route('specialties.index')->with('success', 'Specialty updated successfully');
    }

    public function destroy($id)
    {
        $specialty = Specialty::findOrFail($id);
        $specialty->delete();
        return redirect()->route('specialties.index')->with('success', 'Specialty deleted successfully');
    }
}

