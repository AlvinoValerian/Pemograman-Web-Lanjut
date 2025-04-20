<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use App\Models\Books;
use App\Models\Users;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Rental',
            'list' => ['Data Transaksi', 'Rental']
        ];

        $page = (object) [
            'title' => 'Daftar peminjaman buku'
        ];

        $activeMenu = 'rentals';

        $rentals = Rentals::with('books', 'user')->get();
        $books = Books::all();
        $users = Users::all();

        return view('rental.index', compact('breadcrumb', 'page', 'activeMenu', 'rentals', 'books', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'book_id' => 'required|exists:books,book_id',
            'rental_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:rental_date',
            'status' => 'required|in:dipinjam,dikembalikan'
        ]);

        $book = Books::findOrFail($request->book_id);

        if ($request->status === 'dipinjam') {
            if ($book->stock <= 0) {
                return redirect()->back()->with('error', 'Stok buku habis, tidak bisa dipinjam.');
            }
            $book->decrement('stock'); // kurangi stok
        }

        Rentals::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'rental_date' => $request->rental_date,
            'return_date' => $request->return_date,
            'status' => $request->status
        ]);

        return redirect('/rentals')->with('success', 'Rental berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $rental = Rentals::findOrFail($id);

        $request->validate([
            'status' => 'required|in:dipinjam,dikembalikan',
            'return_date' => 'nullable|date|after_or_equal:rental_date'
        ]);

        $book = Books::findOrFail($rental->book_id);

        if ($rental->status !== $request->status) {
            // status berubah
            if ($request->status === 'dikembalikan') {
                $book->increment('stock'); // balikin stok
            } elseif ($request->status === 'dipinjam') {
                if ($book->stock <= 0) {
                    return redirect()->back()->with('error', 'Stok buku habis, tidak bisa mengubah status ke dipinjam.');
                }
                $book->decrement('stock'); // kurangi stok
            }
        }

        $rental->update([
            'status' => $request->status,
            'return_date' => $request->return_date
        ]);

        return redirect()->back()->with('success', 'Rental berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rental = Rentals::findOrFail($id);

        if ($rental->status === 'dipinjam') {
            $book = Books::find($rental->book_id);
            if ($book) {
                $book->increment('stock'); // Kalau masih dipinjam dan dihapus, balikin stok
            }
        }

        $rental->delete();

        return redirect()->back()->with('success', 'Rental berhasil dihapus.');
    }
}
