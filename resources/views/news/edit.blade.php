@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Notícia</h1>

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Título:</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $news->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="subtitle" class="form-label">Subtítulo:</label>
        <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ old('subtitle', $news->subtitle) }}" required>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Imagem (opcional):</label>
        <input type="file" class="form-control" name="image" id="image" accept="image/*">
        <small>Se não quiser mudar a imagem, deixe este campo vazio.</small>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Conteúdo:</label>
        <textarea class="form-control" name="content" id="content" required>{{ old('content', $news->content) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>
</div>
@endsection
