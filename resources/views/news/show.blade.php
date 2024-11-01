@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="text-center" style="max-width: 700px;">
        <h1 class="my-4">{{ $news->title }}</h1>
        <h4 class="mb-4">{{ $news->subtitle }}</h4>

        @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid mb-3" style="width: 100%;">
        @endif

        <p class="text-justify">{{ $news->content }}</p>

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

        <a href="{{ route('news.index') }}" class="btn btn-secondary mt-3">Voltar para a lista de notícias</a>
    </div>
</div>
@endsection
