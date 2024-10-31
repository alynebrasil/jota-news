@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard</h2>

    <!-- Seção de Notícias -->
    <h3>Todas as Notícias</h3>
    <a href="{{ route('news.create') }}" class="btn btn-success">Criar Nova Notícia</a>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Criado por</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allNews as $newsItem)
                <tr>
                    <td><a href="{{ route('news.show', $newsItem->id) }}">{{ $newsItem->title }}</a></td>
                    <td>{{ $newsItem->subtitle }}</td>
                    <td>{{ $newsItem->user->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta notícia?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Seção de Notícias do Admin -->
    <h3>Minhas Notícias</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adminNews as $newsItem)
                <tr>
                    <td><a href="{{ route('news.show', $newsItem->id) }}">{{ $newsItem->title }}</a></td>
                    <td>{{ $newsItem->subtitle }}</td>
                    <td>
                        <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta notícia?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Seção de Usuários -->
    <h3>Usuários</h3>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Criar Novo Usuário</a>
    @if ($users->total() > 10)
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary mb-3">Ver Todos os Usuários</a>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Função</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection
