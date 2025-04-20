<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Data Master', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user';

        $user = Users::all();

        return view('user.index', compact('breadcrumb', 'page', 'activeMenu', 'user'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max: 100',
            'email' => 'required|string|min:3|unique:users,email',
            'password' => 'required|min:5'
        ]);

        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)

        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    // Update data user
    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // ignore email sendiri
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'User berhasil diperbarui.');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
