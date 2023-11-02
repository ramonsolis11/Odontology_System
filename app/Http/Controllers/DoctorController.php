<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialty;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $users = User::all();
        $specialties = Specialty::all();
        return view('doctors.create', compact('users', 'specialties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialty_ids' => 'required|array',
        ]);

        $doctor = new Doctor;
        $doctor->user_id = $request->user_id;
        $doctor->save();

        $doctor->specialties()->sync($request->specialty_ids);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $users = User::all();
        $specialties = Specialty::all();
        return view('doctors.edit', compact('doctor', 'users', 'specialties'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialty_ids' => 'required|array',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->user_id = $request->user_id;
        $doctor->save();

        $doctor->specialties()->sync($request->specialty_ids);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}

