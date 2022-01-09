<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meja = Meja::get();
        return view('admin.meja.index', compact(['meja']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meja.create');
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
            $user = Meja::create($input);
         
            toastr()->success('Berhasil Menambahkan data Meja');
           
            return redirect()->route('meja.index');
            
         } catch (\Throwable $th) {
             return redirect()->back();
            toastr()->error('Gagal Menambahkan data Meja');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function edit(Meja $meja)
    {

        return view('admin.meja.edit', compact('meja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meja $meja)
    {
        try {

            $input = $request->all();
    
            $meja->fill($input)->save();

            toastr()->success('Berhasil Merubah Data Meja');
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
            toastr()->error('Gagal Merubah Data Meja');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Meja::destroy($id);
            toastr()->success('Berhasil Menghapus Meja');
        } catch (\Throwable $th) {
            toastr()->error('Gagal Menghapus Meja');
            return redirect()->back();
           
        }
    }
}
