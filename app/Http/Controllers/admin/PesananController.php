<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Pesanan;
use App\PesananDetail;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::with('meja')->get();
        
        return view('admin.pesanan.index', compact(['pesanan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        $pesanan = Pesanan::with('meja', 'pesanan_detail.daftar_menu')
        ->where("id", $pesanan->id)->first();

     

        return view('admin.pesanan.detail', compact(['pesanan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        
    }

    public function updateStatusPesanan($id,$status){
        try {
            Pesanan::where('id', $id)
            ->update(['status' => $status]);
            toastr()->success('Berhasil Merubah Status Pesanan');
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error('Gagal Merubah Status Pesanan kategori');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
