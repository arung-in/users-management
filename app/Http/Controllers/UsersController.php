<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
     
    public function createUsers(Request $request) {
        
        return view('register');
        
    }

    public function getUsers(Request $request) {

        if ( $request->input('showdata')) {
            return User::orderBy('created_at', 'desc')->get();
        }
        
        $columns = ['image', 'name', 'email', 'created_at'];
        $length = $request->input('length');
        $column = $request->input('column');
        $search_input = $request->input('search');

        // $query = User::select('name', 'email', 'created_at')
        //                 ->orderBy($columns[$column]);
        
        $query = User::select('name', 'email', 'img', 'created_at');

        if ($search_input) {
            $query->where(function($query) use ($search_input) {
                $query->where('name', 'like', '%' . $search_input . '%')
                    ->orWhere('email', 'like', '%' . $search_input . '%')
                    ->orWhere('created_at', 'like', '%' . $search_input . '%');
                });
        }
        
        $users = $query->paginate($length);


        //return view('users', compact('users'));
        return view('users', ['data' => $users]);
        //return ['data' => $users];
    }

    public function deleteUser(User $user) {
        
        if($user) {
            $user->delete();
        }
        return 'user deleted';
    }

    public function storeUsers(Request $request) {
        
        dd("hi");
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        return view('users');
    }
}
