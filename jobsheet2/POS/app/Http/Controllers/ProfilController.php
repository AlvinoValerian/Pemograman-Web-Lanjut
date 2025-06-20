<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Akun dan Profil',
            'list' => ['Home', 'Profil']
        ];

        $page = (object) [
            'title' => 'Data Akun Dan Profil Anda'
        ];

        $acticeMenu = 'profil';

        $profil = UserModel::find(Auth::user()->user_id);

        return view('profil.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'profil' => $profil, 'activeMenu' => $acticeMenu]);
    }

    public function editImage($id)
    {
        $user = UserModel::find($id);
        return view('profil.edit_image', compact('user'));
    }

    public function updateImage(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $profil = UserModel::find($id);

            if ($profil) {
                // Hapus gambar lama jika ada
                if ($profil->image && Storage::disk('public')->exists($profil->image)) {
                    Storage::disk('public')->delete($profil->image);
                }

                // Simpan gambar baru
                $path = $request->file('image')->store('uploads', 'public');
                $profil->image = $path;
                $profil->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Gambar berhasil diupdate.',
                    'redirect' => url('/profil')
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan.',
                    'redirect' => url('/profil')
                ]);
            }
        }

        return redirect('/profil');
    }
}