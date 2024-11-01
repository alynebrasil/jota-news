@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Editar Perfil</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mt-4">
            <label for="name" class="block">Nome</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="border rounded p-2 w-full" required>
        </div>
        <div class="mt-4">
            <label for="email" class="block">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="border rounded p-2 w-full" required>
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white rounded p-2">Salvar</button>
        </div>
    </form>
</div>
@endsection
