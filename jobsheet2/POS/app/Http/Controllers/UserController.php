<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function show($id, $name)
    // {
    //     return view('user.profile', compact('id', 'name'));
    // }

    public function index(){

        // $data=[
            // 'username' => 'customer-1',
            // 'nama' => 'Pelanggan',
            // 'password' => Hash::make('12345'),
            // 'level_id' => 4
            // 'nama' => 'Pelanggan Pertama',
        //     'level_id' =>5,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
            
        // ];
        // UserModel::insert($data);
        // UserModel::where('username','customer-1')->update($data);

        // $user =UserModel::find(1);
        //     return view('user',['data' => $user]);

        // $user =UserModel::where('level_id',5)->count();
        // dd($user);

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->username = 'manager12';

        // $user->save();
        // $user->isDirty();
        // $user->isClean();
        // dd($user->isDirty());

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // $user =UserModel::all();
        // return view('user',['data' => $user]);
        $user =UserModel::with('level')->get();
        // dd($user);
        return view('user', ['data' => $user]);
    }

    public function tambah(){
        return view('user_tambah');
    }
    public function tambah_simpan(Request $request){
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
            
        ]);
        return redirect('/user');
    }

    public function ubah($id){
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request){
        $user =UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id){
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}
