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
            // 'level_id' =>5,
            // 'username' => 'manager_tiga',
            // 'nama' => 'Manager 3',
            // 'password' => Hash::make('12345')
            
        // ];
        // UserModel::create($data);
        // UserModel::where('username','customer-1')->update($data);

        // $user =UserModel::find(1);
        //     return view('user',['data' => $user]);

        $user =UserModel::findOr(28,['username', 'nama'],function(){
            abort(404);
        });
        return view('user', ['data' => $user]);

        // $user =UserModel::all();
        // return view('user',['data' => $user]);
    }
}
