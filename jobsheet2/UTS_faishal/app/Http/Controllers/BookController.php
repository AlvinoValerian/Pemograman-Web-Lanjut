<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Buku',
            'list' => ['Data Master', 'Buku']
        ];

        $page = (object) [
            'title' => 'Daftar buku yang tersedia dalam sistem'
        ];

        $activeMenu = 'books';

        $books = Books::all();

        return view('book.index', compact('breadcrumb', 'page', 'activeMenu', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:1'
        ]);

        Books::create([
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock
        ]);

        return redirect('/books')->with('success', 'Buku berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $book = Books::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:1'
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock
        ]);

        return redirect()->back()->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $book = Books::findOrFail($id);
        $book->delete();

        return redirect()->back()->with('success', 'Buku berhasil dihapus.');
    }
}
