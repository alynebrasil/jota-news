@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Minhas Notícias</h1>

    <div class="mb-3">
        <a href="{{ route('news.create') }}" class="btn btn-success">Criar Nova Notícia</a>
    </div>

    @if ($news->isEmpty())
        <p>Você ainda não criou nenhuma notícia.</p>
    @else
        <div class="row">
            @foreach ($news as $newsItem)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $newsItem->title }}</h5>
                            <p class="card-text">{{ $newsItem->subtitle }}</p>
                            <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-primary">Leia mais</a>
                            <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta notícia?')">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
