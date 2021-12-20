<?php

namespace App\Http\Controllers\admin;

use App\DaftarMenu;
use App\Http\Controllers\Controller;
use App\KategoriMenu;
use Illuminate\Http\Request;

class DaftarMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $daftarMenu = DaftarMenu::with('kategoriMenu')->get();
      
     
        return view('admin.daftar_menu.index', compact(['daftarMenu']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriMenu::all();
        
        return view('admin.daftar_menu.create', compact('kategori'));
    
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

            $gambar =  $request->file('gambar');
            $name_uniqe =  uniqid().'-'.now()->timestamp.'.'.$gambar->getClientOriginalExtension();
            $gambar->move('uploads', $name_uniqe);
    
            $harga = preg_replace( '/[^0-9]/', '', $request->harga );

            $input = $request->all();
            $input['harga'] = $harga ;
            $input['gambar'] = $name_uniqe ;
       
            $daftarMenu = DaftarMenu::create($input);
            toastr()->success('Berhasil Menambahkan Daftar Menu Baru');
            return redirect()->route('daftar.index');
            
         } catch (\Throwable $th) {
             dd($th);
            toastr()->success('Gagal Menambahkan Daftar Menu');
         }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DaftarMenu  $daftarMenu
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarMenu $daftarMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DaftarMenu  $daftarMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daftarMenu = DaftarMenu::find($id);
        $kategori = KategoriMenu::all();
        return view('admin.daftar_menu.edit', compact(['daftarMenu','kategori']));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DaftarMenu  $daftarMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarMenu $daftarMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DaftarMenu  $daftarMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            DaftarMenu::destroy($id);
            toastr()->success('Berhasil Menghapus Daftar Menu');
        } catch (\Throwable $th) {
            toastr()->error('Gagal Menghapus Daftar Menu');
        }
    }
}
