<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $allNews = News::with('user')->orderBy('created_at', 'desc')->get();

        $adminNews = News::where('fk_user', auth()->id())->orderBy('created_at', 'desc')->get();

        $users = User::paginate(10);

        return view('admin.dashboard', compact('allNews', 'adminNews', 'users'));
    }

    public function indexUsers()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
