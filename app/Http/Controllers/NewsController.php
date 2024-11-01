<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);

        return view('news.show', compact('news'));
    }

    public function create()
    {
        $this->authorize('create', News::class);
        return view('news.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);

        $path = $request->file('image')->store('images', 'public');

        News::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $path,
            'content' => $request->content,
        ]);

        return redirect()->route('news.index')->with('success', 'Notícia criada com sucesso!');
    }

    public function edit(News $news)
    {
        $this->authorize('update', $news);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
    
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Apenas imagens, tamanho máximo de 2MB
            'content' => 'required|string',
        ]);
    
        // Atualizando os campos da notícia
        $news->title = $request->input('title');
        $news->subtitle = $request->input('subtitle');
    
        // Verifica se uma nova imagem foi carregada
        if ($request->hasFile('image')) {
            // Remove a imagem antiga, se existir
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
    
            // Salva a nova imagem e armazena o caminho
            $path = $request->file('image')->store('images', 'public');
            $news->image = $path; // Salva o caminho no banco de dados
        }
    
        $news->content = $request->input('content');
        $news->save();
    
        return redirect()->route('news.index')->with('success', 'Notícia atualizada com sucesso!');
    }
    

    public function destroy(News $news)
    {
        $this->authorize('delete', $news);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'Notícia excluída com sucesso!');
    }
}
