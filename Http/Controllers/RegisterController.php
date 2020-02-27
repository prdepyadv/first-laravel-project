<?php

namespace App\Http\Controllers;

use App\Mail\mail_file;
use App\Mail\Welcome;
use App\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class RegisterController extends Controller
{
    public function index()
    {
        if(Auth::check()){
        return view('welcome');}
        return view('auth.login');

    }
    public function login()
    {


        return view('/auth.login');

    }
    public function trylogin(Request $request)
    {
        $var = $request->session()->get('user_id');
        if(! $var) {
            return view('/new.login');
        }
        else{
            $users = register::latest()->where('id',$var)->get();
            $individual_user= $users[0];
            return view("show_by_userid",compact('individual_user'));
        }

    }

    public function tryloginpost(Request $request)
    {

        try
        {
            $users = register::latest()->where([
                'username' => \request('username'),
                'user_id' => \auth()->id()
            ])->get();
            //echo $users."   ".Hash::check(\request('password'),$users[0]['password']);exit();
            if($users == "[]"){
                return redirect('/try');
            }
            else if(Hash::check(\request('password'), $users[0]['password'])) {
                $individual_user = $users[0];
                $request->session()->put('user_id', $users[0]['id']);
                session(['user_id' => $users[0]['id']]);
                return view("show_by_userid", compact('individual_user'));
            } else {
                return redirect('/try');
            }
        }
        catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        $request->session()->forget('user_id');
        return redirect('/try');
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

    //try in here

    public function store_new()
    {
        register::create([
            'username' => \request('username'),
            'email' => \request('email'),
            'password' => bcrypt(\request('password')),
            'user_id' => \auth()->id()
        ]);
    }

    public function validate_username(Request $request){

        $users = register::latest()->where('username',\request('username'))->get();
        if($users == "[]"){
            echo true;
            die();
        }
        echo false;
        die();
    }

}
