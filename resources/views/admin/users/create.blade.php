@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Usuário</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmação da Senha:</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">Papel:</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
                <option value="reader">Leitor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Criar Usuário</button>
    </form>
</div>
@endsection
