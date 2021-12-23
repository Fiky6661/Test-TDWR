<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 2){
                return redirect()->intended('product')->with(['type' => 'success', 'message' => 'Login Success !']);
            }else{
                return redirect()->intended('dashboard')->with(['type' => 'success', 'message' => 'Login Success !']);
            }
        }
  
        return redirect("dashboard")->withSuccess('Login details are not valid');
    }

    public function register()
    {
        return view('register');
    }
      

    public function registration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
           
        $data = $request->except('_token');
        $check = $this->create($data);
         
        return redirect("/")->with(['type' => 'success', 'message' => 'Register Success !']);
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => $data['role']
      ]);
    }
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
    }
    

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
