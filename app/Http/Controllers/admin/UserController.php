<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
      
        return view('admin.users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        
        return view('admin.users.create', compact('roles'));
    
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {

            $input = $request->all();
            $user = User::create($input);
         
            toastr()->success('Berhasil Menambahkan data User');
           
            return redirect()->route('user.index');
            
         } catch (\Throwable $th) {
            toastr()->error('Gagal Menambahkan data user');
        }
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact(['roles','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        try {

            $input = $request->all();
            $user->fill($input)->save();

            toastr()->success('Berhasil Merubah Data User');
            return redirect()->back();
        } catch (\Throwable $th) {
           
            toastr()->error('Gagal Merubah Data User');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::destroy($id);
            toastr()->success('Berhasil Menghapus user');
        } catch (\Throwable $th) {
            toastr()->error('Gagal Menghapus user');
            return redirect()->back();
           
        }
    }

    public function showUpdatePassword($id){
        $user = User::find($id);
        return view('admin.users.password', compact('user'));
    }

    public function UpdatePassword(Request $request){

        try {
                $user = User::find($request->id);
                $user->password = $request->password_baru;
                $user->save();
                toastr()->success('Berhasil Mengubah Password user');
                return redirect()->route('user.index');
        } catch (\Throwable $th) {
          
            toastr()->error('Gagal Mengupdate Password User');
            return redirect()->back();
        }
       
        return view('admin.users.password', compact('user'));
    }


    // public function UpdatePassword(Request $request){

    //     try {
 

    //         if (Hash::check($request->password, User::find($request->id)->password)) {

              
    //             $user = User::find($request->id);
    //             $user->password = $request->password_baru;
    //             $user->save();

    //             toastr()->success('Berhasil Mengubah Password user');
    //              return redirect()->route('user.index');
    //         } else {
    //             toastr()->error('Password Lama Tidak Cocok');
    //             return redirect()->back();
    //         }
    //     } catch (\Throwable $th) {
          
    //         toastr()->error('Gagal Mengupdate Password User');
    //         return redirect()->back();
    //     }
       
    //     return view('admin.users.password', compact('user'));
    // }




}
