@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $news->title }}</h1>
    <h4>{{ $news->subtitle }}</h4>
    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid">
    <p>{{ $news->content }}</p>

    @can('update', $news)
        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">Editar</a>
    @endcan

    @can('delete', $news)
        <form action="{{ route('news.destroy', $news->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta notícia?')">Deletar</button>
        </form>
    @endcan

    <a href="{{ route('news.index') }}" class="btn btn-secondary">Voltar para a lista de notícias</a>
</div>
@endsection
