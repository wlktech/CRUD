<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register(){
        return view("users.create");
    }
    public function create(Request $request){
        $request->validate([
            'name'=>'required', 
            'email'=>'required', 
            'password'=> 'required',
            'phone'=> 'required',
            'address'=> 'required'
        ]);
        User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address'),
        ]);
        return redirect('/users')->with('status', "User has been created successfully.");
    }

    //read
    public function read(){
        $users = User::all();
        return view('users.read', ['users'=> $users]);
    }

    //get
    public function show($id){
        $user = User::find($id);
        return view("users.update", ['user'=>$user]);
    }

    //update
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required', 
            'phone' => 'required',
            'address' => 'required'
        ]);
        User::find($id)->update([
            'name' => $request->input('name'),
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect('users')->with('status', 'User has been updated successfully.');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect('users')->with('status', 'User has been deleted successfully.');
    }

    public function login(){
        return view('users.login');
    }

    public function check(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            return redirect('posts');
        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
