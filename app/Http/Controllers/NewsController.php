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

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($news->image);

            $path = $request->file('image')->store('images', 'public');
            $news->image = $path;
        }

        $news->title = $request->title;
        $news->subtitle = $request->subtitle;
        $news->content = $request->content;

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
