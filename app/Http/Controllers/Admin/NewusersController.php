<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class NewusersController extends Controller
{ 
    public function index()
    { 
       
    }
 
    public function create()
    { 
        
        return view('users.create');
    }
 
    public function store(StoreUsersRequest $request)
    { 
        $fileName = null;
        $filePath = null;
        $fileExt = null;
         
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']), 
        ]);
        if($request->hasFile('image')){
            $file     = $request->image;
            $fileName = $file->getClientOriginalName();
            $filePath = "/uploads/" . date("Y") . '/' . date("m") . "/" . $fileName;
            $fileName = $file->store($filePath, ['disk' => 'public']); 
            $fileExt = $file->getClientOriginalExtension();

            $user->img = $fileName;
            $user->path = $filePath;
            $user->ext = $fileExt;
            $user->save();
        }
         
        return redirect()->route('home');
    }

 
    public function edit($id)
    { 
        $user = User::findOrFail($id); 
        return view('users.edit', compact('user'));
    }
 
    public function update(UpdateUsersRequest $request, $id)
    {    
        $fileName = null;
        $filePath = null;
        $fileExt = null; 

        $user = User::findOrFail($id); 
        if ($user != null) {           
 
            if($request->hasFile('image')){
                $file     = $request->image;
                $fileName = $file->getClientOriginalName();
                $filePath = "/uploads/" . date("Y") . '/' . date("m") . "/" . $fileName;
                $fileName = $file->store($filePath, ['disk' => 'public']);
                $fileExt = $file->getClientOriginalExtension();
                $user->img = $fileName;
                $user->path = $filePath;
                $user->ext = $fileExt;
                $user->save();
  
            }
            
            $password = trim($request->password, " ");            
            if(empty($password) || $password == null) {
                $password = $user->password; 
            } else {
                $password = $request->has('password') ? Hash::make($password) : null; 
            }

            $user->fill([
            'name' => $request->name, 
            'password' => $password,
            ])->save();
 
            return redirect()->route('home');
        } 
    }

 
    public function show($id)
    {
          
    }

 
    public function destroy($id)
    {  
        
    }
  
}
