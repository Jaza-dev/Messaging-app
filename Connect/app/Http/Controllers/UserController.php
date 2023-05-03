<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showRegisterForm(){
        return view('register');
    }
    public function showLoginForm(){
        return view('login');
    }
    public function showMyProfile(){
        return view('profile');
    }

    public function registerNewUser(Request $request){
        $request->validate([
            'email' => 'max:45|email|unique:user',
            'username' => 'max:45|min:4',
            'password' => 'max:45|min:3',
            'repeat_password' => 'max:45|min:3',
            'name' => 'max:45|min:3|regex:/^[a-zA-Z]*$/',
            'surname' => 'max:45|min:3|regex:/^[a-zA-Z]*$/'
        ], [
            'max' => "Field :attribute is too long.",
            'min' => "Field :attribute is too short.",
            'unique' => "User with that email already exists."
        ]);



        UserModel::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'name' => $request->name,
            'surname' => $request->surname,
            'role' => '0'
        ]);

        return redirect()->route('showLoginForm');
    }

    public function loginUser(Request $request){
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'Email or password are wrong.')->withInput();
        }else{
            return redirect()->route('showFeed');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('showLoginForm');
    }

    public function updateProfile(Request $request){

        if($request->password != ""){
            if($request->password == $request->repeat_password){
                $request->validate([
                    'password' => 'max:45|min:3',
                    'repeat_password' => 'max:45|min:3',
                ], [
                    'max' => "Field :attribute is too long.",
                    'min' => "Field :attribute is too short."
                ]);
    
                UserModel::where('email', "like", $request->email)->update([
                    'password' => $request->password
                ]);
            }else{
                session(['profileUpdateSuccess' => 2]);
                return redirect()->route('myProfile');
            }
        }

        $request->validate([
            'email' => 'max:45|email',
            'username' => 'max:45|min:4',
            'name' => 'max:45|min:3|regex:/^[a-zA-Z]*$/',
            'surname' => 'max:45|min:3|regex:/^[a-zA-Z]*$/'
        ], [
            'max' => "Field :attribute is too long.",
            'min' => "Field :attribute is too short."
        ]);

        UserModel::where('email', "like", $request->email)->update([
            'email' => $request->email,
            'username' => $request->username,
            'name' => $request->name,
            'surname' => $request->surname,
        ]);

        $user = UserModel::where('email', "like", $request->email)->first();
        session(['user' => $user]);
        session(['profileUpdateSuccess' => 1]);
        return redirect()->route('myProfile');
    }

}
