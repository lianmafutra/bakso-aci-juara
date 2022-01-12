<?php

namespace App\Http\Controllers\admin;

use App\DaftarMenu;
use App\Http\Controllers\Controller;
use App\Meja;
use App\Pesanan;
use App\PesananDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::with('meja')->latest()->get();

        return view('admin.pesanan.index', compact(['pesanan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $meja = Meja::all();
        $menu = DaftarMenu::with('kategoriMenu')->get();

        return view('admin.pesanan.create', compact(['meja', 'menu']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

        try {
            $total_harga = 0;
            $collection = collect($request->menu_pesanan);

            foreach ($collection as $key) {
                $total_harga += $key["harga"] * $key["jumlah"];
            }

            $kode_pesanan = 0;
            $kode_pesanan = Pesanan::latest();

            if($kode_pesanan->get()->isEmpty()){
                $kode_pesanan = 1;
            }else{
                $kode_pesanan = ($kode_pesanan->first()->id) +1;
            }



            $pesanan = Pesanan::create([
                'users_id'    => Auth::user()->id,
                'kode'        => 'P-'.$kode_pesanan,
                'meja_id'     => $request->meja_id,
                'no_meja'     => $request->meja_nama,
                'waktu'       => Carbon::now(),
                'pelayan'     => Auth::user()->name,
                'catatan'     => $request->catatan,
                'total' => $total_harga
            ]);

            $pesanan->save();

            foreach ($request->menu_pesanan as $key => $value) {
                PesananDetail::create([
                    'pesanan_id'     =>$pesanan->id,
                    'daftar_menu_id' => $value['id'],
                    'nama'           => $value['nama'],
                    'kategori'       => $value['kategori_id'],
                    'harga'          => $value['harga'],
                    'jumlah'         => $value['jumlah'],
                ]);
            }
            DB::commit();
            // toastr()->success('Berhasil Merubah Status Pesanan');
            return redirect()->route('pesanan.index');
        } catch (\Exception $e) {
            DB::rollback();
            return response('error terjadi kesalahan', 400);

        }


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

    public function updateStatusPesanan($id, $status)
    {
        try {
            Pesanan::where('id', $id)->update(['status' => $status]);
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

    public function cetakStrukPesanan($id){
        $pesanan = Pesanan::with('pesanan_detail')->find($id);

        $data = PDF::loadview('admin.pesanan.struk', ['pesanan' => $pesanan]);
    	// return $data->stream('struk_pesanan.pdf');

       return $data->stream("struk_pesanan_".$id.".pdf", array("Attachment" => false));

    }
}
