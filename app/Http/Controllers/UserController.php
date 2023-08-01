<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function simpanUser(Request $request) {
        if ($request->id) {
            $user = User::find($request->id);
            $user->name = $request->nama;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->level = $request->level;
            $user->save();
        } else {
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'level' => $request->level
            ]);
        }
        return back();
    }

    public function hapusUser(Request $request) {
        User::find($request->id)->delete();
        return back();
    }
}
