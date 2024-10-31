@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Criar Nova Notícia</h1>

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="subtitle">Subtítulo</label>
        <input type="text" name="subtitle" id="subtitle" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image">Imagem</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
    </div>

    <div class="form-group">
        <label for="content">Conteúdo</label>
        <textarea name="content" id="content" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

</div>
@endsection
