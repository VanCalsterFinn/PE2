<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    //Route function to redirect to the register page through this controller
    public function index()
    {
        return view('auth.register');
    }
    //Route function that takes the form object from the register form and uses this function to store it in the database
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'name' => 'required|max:255|',
            'username' => 'required|max:255|',
            'email' => 'required|email|max:255|',
            'password' => 'required|confirmed', //The confirmed rule that has been passed will look for any other data members with the "_confirmed" name and check if the values are the same
        ]);

        //Creating the user object with the given validated parameters
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Sign this user in - Method 1
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);
            auth()->attempt($request->only('email', "password"));
        //Redirect to
        return redirect()->route('home');
    }
}
