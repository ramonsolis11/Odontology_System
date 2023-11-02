@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Usuario</h2>
    <!-- Formulario para crear un nuevo usuario -->
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
        <label for="role">Rol</label>
        <select class="form-control" id="role" name="role">
            <option value="admin">Administrador</option>
            <option value="doctor">Doctor</option>
            <option value="assistant">Asistente</option>
            <option value="receptionist">Recepcionista</option>
            <option value="patient">Paciente</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Crear Usuario</button>
</form>

</div>
@endsection
