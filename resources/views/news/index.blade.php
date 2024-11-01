@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Notícias</h1>

    @can('create', App\Models\News::class)
        <a href="{{ route('news.create') }}" class="btn btn-success mb-3">Criar Nova Notícia</a>
    @endcan

    <div class="row">
        <!-- Feed principal de notícias -->
        <div class="col-md-8">
            <div class="news-feed">
                @foreach ($news as $newsItem)
                    <div class="news-item mb-4 p-3 border-bottom">
                        @if($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid mb-2" style="max-height: 200px; width: 100%; object-fit: cover;">
                        @endif
                        <h3>{{ $newsItem->title }}</h3>
                        <p class="text-muted">{{ $newsItem->subtitle }}</p>
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
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $news->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>

        <!-- Barra lateral -->
        <div class="col-md-4">
            <!-- Seletor para notícias do dia -->
            <div class="mb-4">
                <h5>Notícias do Dia</h5>
                <form method="GET" action="{{ route('news.index') }}">
                    <input type="date" name="date" class="form-control mb-2" value="{{ request('date') }}">
                    <button type="submit" class="btn btn-outline-primary w-100">Filtrar</button>
                </form>
            </div>

            <!-- Lista de versões com thumbs -->
            <div class="news-versions">
                <h5>Outras Notícias</h5>
                @foreach ($newsVersions as $version)
                    <div class="card mb-3">
                        @if($version->thumbnail)
                            <img src="{{ asset('storage/' . $version->thumbnail) }}" alt="{{ $version->title }}" class="card-img-top" style="max-height: 100px; object-fit: cover;">
                        @endif
                        <div class="card-body p-2">
                            <h6 class="card-title">{{ $version->title }}</h6>
                            <a href="{{ route('news.show', $version->id) }}" class="btn btn-sm btn-primary">Ver</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
