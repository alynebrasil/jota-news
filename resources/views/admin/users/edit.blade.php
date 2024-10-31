@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuário</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="role">Papel:</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
                <option value="reader"  {{ $user->role == 'reader' ? 'selected' : '' }}>Leitor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Salvar Alterações</button>
    </form>
</div>
@endsection
