@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Paciente</h2>
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $patient->email }}" required>
        </div>
        <!-- ... otros campos ... -->
        <button type="submit" class="btn btn-primary">Actualizar Paciente</button>
    </form>
</div>
@endsection
