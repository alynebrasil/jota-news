<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {

        $news = News::orderBy('created_at', 'desc')->paginate(10);

        $newsVersions = News::orderBy('created_at', 'desc')->take(5)->get();

        return view('news.index', compact('news', 'newsVersions'));
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
            'image' => 'required|image',
            'content' => 'required|string',
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->subtitle = $request->input('subtitle');
        $news->content = $request->input('content');
        $news->fk_user = auth()->id();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $news->image = $imagePath;
        }

        $news->save();

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
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
        ]);

        $news->title = $request->input('title');
        $news->subtitle = $request->input('subtitle');

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $path = $request->file('image')->store('images', 'public');
            $news->image = $path;
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
