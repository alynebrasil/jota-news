@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Meu Perfil</h1>
    <div class="mt-4">
        <p><strong>Nome:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>
    <div class="mt-6">
        <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">Editar Perfil</a>
    </div>
</div>
@endsection
