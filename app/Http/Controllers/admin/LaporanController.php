<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Pesanan;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request){
        $pesanan = Pesanan::all();

        $tanggal_mulai = null;
        $tanggal_akhir =  null;

        return view('admin.laporan.index', compact(['pesanan', 'tanggal_mulai', 'tanggal_akhir']));
    }

    public function laporanCetak()
    {
        $pesanan = Pesanan::all();
        $data = PDF::loadview('admin.laporan.laporan', ['pesanan' => $pesanan]);
    	return $data->download('laporan.pdf');
    }


    public function laporanFilter(Request $request){
        // dd($request->all());

        $tanggal_mulai =  Carbon::parse($request->tanggal_mulai)->format('d/m/Y');
        $tanggal_akhir =  Carbon::parse($request->tanggal_akhir)->format('d/m/Y');

        // dd($request->tanggal_akhir);

        // $pesanan = Pesanan::whereBetween('created_at',
        // [
        //     Carbon::parse($request->tanggal_mulai)->format('Y-m-d'),
        //     Carbon::parse($request->tanggal_akhir)->format('Y-m-d')
        // ])->get();



        $pesanan = Pesanan::whereDate('waktu', '>=',   Carbon::parse($request->tanggal_mulai)->format('Y-m-d'))
                        ->whereDate('waktu', '<=', Carbon::parse($request->tanggal_akhir)->format('Y-m-d'))
                        ->get();

        return view('admin.laporan.index', compact(['pesanan', 'tanggal_mulai', 'tanggal_akhir' ]));

    }
}
