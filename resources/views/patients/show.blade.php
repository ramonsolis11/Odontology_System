@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Paciente</h2>
    <p><strong>Nombre:</strong> {{ $patient->name }}</p>
    <p><strong>Email:</strong> {{ $patient->email }}</p>
    <!-- ... otros campos ... -->
</div>
@endsection
