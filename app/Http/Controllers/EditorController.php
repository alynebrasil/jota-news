<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function index()
    {
        $news = News::where('fk_user', Auth::id())->get();

        return view('editor.dashboard', compact('news'));
    }
}
