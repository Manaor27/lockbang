<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $level = Auth::user()->level;
        if($level == "Admin"){
            return redirect()->to('admin');
        } else if($level == "Wali"){
            return redirect()->to('wali');
        } else if($level == "Guru"){
            return redirect()->to('guru');
        } else {
            return redirect()->to('logout');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
