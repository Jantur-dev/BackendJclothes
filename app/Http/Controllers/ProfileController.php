<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index() 
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.index', ['user'=>$user]);
    }

    public function update(Request $request) 
    {
        $this->validate($request, [
            'password' => 'confirmed'
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->noHp = $request->noHp;
        $user->alamat = $request->alamat;
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->update();

        Alert::success('Profile berhasil di update', 'Success');
        return redirect('/profile');
    }
}
