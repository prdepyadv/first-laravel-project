<?php

namespace App\Http\Controllers;

use App\Mail\mail_file;
use App\Mail\Welcome;
use App\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        if(Auth::check()){
        return view('welcome');}
        return redirect('/login');

    }
    public function login()
    {


        return view('/auth.login');

    }

    public function register()
    {
        return view('register');

    }

    public function show()
    {

        $users = register::latest()->where('user_id',\auth()->id())->get();
        return view('show',compact('users'));

    }

    public function showbyuserid(register $individual_user)
    {
        return view('show_by_userid',compact('individual_user'));

    }

    public function store()
    {

        $this->validate(request(),[
            'username' => 'required|',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:4|max:10|'
        ]);

        register::create([
        'username' => \request('username'),
            'email' => \request('email'),
            'password' => bcrypt(\request('password')),
            'user_id' => \auth()->id()
        ]);

        $user = \request('email');

        \Mail::to($user)->send(new mail_file(request('username')));

        return redirect('/users');
    }
}
