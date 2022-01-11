<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        try {
            $user = User::find((Auth::user()->id));
            $user->password = $request->password_baru;
            $user->save();
            toastr()->success('Berhasil Mengubah Password');
            return redirect()->route('profile');
        } catch (\Throwable $th) {
            toastr()->error('Gagal Mengupdate Password');
            return redirect()->back();
        }
    }
}
