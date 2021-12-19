<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\KategoriMenu;
use Illuminate\Http\Request;


class KategoriMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriMenu = KategoriMenu::all();
        return view('admin.kategori_menu.index', compact('kategoriMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_menu.create');
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
        $kategoriMenu = KategoriMenu::create($request->all());
        toastr()->success('Berhasil Menambahkan kategori');
       
        return redirect()->route('kategori.index');
        
     } catch (\Throwable $th) {
         throw $th;
     }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriMenu  $kategoriMenu
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriMenu $kategoriMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriMenu  $kategoriMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriMenu = KategoriMenu::find($id);
        return view('admin.kategori_menu.edit', compact('kategoriMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriMenu  $kategoriMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriMenu $kategori)
    {
        try {
            $kategori->update($request->all());
            toastr()->success('Berhasil Merubah Data kategori');
            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            toastr()->error('Gagal Merubah Data kategori');
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriMenu  $kategoriMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            KategoriMenu::destroy($id);
            toastr()->success('Berhasil Menghapus Kategori');
        } catch (\Throwable $th) {
            toastr()->error('Gagal Menghapus Kategori');
        }
    }
}
