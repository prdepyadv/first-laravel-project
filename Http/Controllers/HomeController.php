<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! auth()->attempt([
            'name' => \request('username'),
            'password' => \request('password'),
        ])){
            return back();
        }
        return view('welcome');
    }
    public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->forget('user_id');
        return redirect('/');
    }
}
