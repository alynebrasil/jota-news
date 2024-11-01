@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Meu Perfil</h1>
    <div class="mt-4">
        <p class="mt-2"><strong>Nome:</strong> {{ $user->name }}</p>
        <p class="mt-2"><strong>Email:</strong> {{ $user->email }}</p>
    </div>
    <div class="mt-6">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a> <!-- Atualizado para usar a classe btn do Bootstrap -->
    </div>
</div>
@endsection
