@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Editar Perfil</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mt-6">
            <label for="name" class="block text-gray-700">Nome:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control mt-2" style="background-color: white; width: 50%;" required>
        </div>
        <div class="mt-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control mt-2" style="background-color: white; width: 50%;" required>
        </div>
        <div class="mt-6">
            <button type="submit" class="btn btn-primary mt-4">Salvar</button>
        </div>
    </form>
</div>
@endsection
