<?php

namespace App\Http\Controllers;

use App\Kembali;
use App\Rental;
use App\Mobil;
use App\Supir;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;


class KembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $kembali = Kembali::all();
        return view('kembali.index',compact('kembali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kembali = Kembali::all();
        $rental = Rental::all();
        return view('kembali.create',compact('kembali','rental'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            
            'tgl_kembali_akhir'=>'required|',
            'rental_id'=>'required|'
                
                
        ]);

        $kembali = new Kembali;
        $kembali->tgl_kembali_akhir = $request->tgl_kembali_akhir;
        
        
        
        $awal = new Carbon($kembali->rental_id = $request->tgl_sewa);
        $akhir = new Carbon ($request->tgl_kembali_akhir);
        $hasil = "{$awal->diffInDays($akhir)}";
        $kembali->jumlah_hari = $hasil;

        $kembali->telat = $hasil- ($kembali->rental_id = $request->jumlah_hari);

        // $denda=($hasil * ($request->harga_sewa + $request->harga_sewasupir))- $request->total_sewa;
        // $rental->denda=$denda;
        // $rental->total_harga= $hasil * ($request->harga_mobil + $request->harga_supir);

        
        $kembali->rental_id = $request->rental_id;
        
        // return $kembali;
        $kembali->save();
        return redirect()->route('kembali.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kembali = Kembali::findOrFail($id);
        return view('kembali.show',compact('kembali'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function edit(Kembali $kembali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kembali $kembali)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kembali = Kembali::findOrFail($id);
        $kembali->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('kembali.index');
    
    }
}
