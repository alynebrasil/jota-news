@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Notícias</h1>

    @can('create', App\Models\News::class)
        <a href="{{ route('news.create') }}" class="btn btn-success mb-3">Criar Nova Notícia</a>
    @endcan

    <div class="row">
        @foreach ($news as $newsItem)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($newsItem->image) <!-- Corrigido de $item->image para $newsItem->image -->
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $newsItem->title }}</h5>
                        <p class="card-text">{{ $newsItem->subtitle }}</p>
                        <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-primary">Leia mais</a>

                        @can('update', $newsItem)
                            <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning">Editar</a>
                        @endcan

                        @can('delete', $newsItem)
                            <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta notícia?')">Deletar</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
