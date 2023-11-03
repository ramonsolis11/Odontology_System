@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gestión de Pacientes</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Crear Paciente</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Editar</a>
                        <!-- Aquí puedes agregar un botón para eliminar el paciente -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

