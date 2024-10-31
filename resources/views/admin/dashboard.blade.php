@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Painel de Administração</h1>
    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Gerenciar Usuários</a>
</div>
@endsection
