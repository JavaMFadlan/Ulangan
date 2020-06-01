<?php

namespace App\Http\Controllers;

use App\pegawai;
use App\nasabah;
use App\rekening;
use App\cabang_bank;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $pegawai = pegawai::with('cabang_bank')->get();
        $bank = cabang_bank::all();
        // foreach ($pegawai as $data) {
        //     foreach ($data->nasabah as $key) {
        //         dd($key);
                
        //     }
        // }
        return view('pegawai.index',compact('pegawai','bank'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pesan = ['no_pegawai.digits' => 'Tidak Bisa Melebihi 20 digit'
        //             ];
        // $this->validate($request,[
        //     'no_pegawai' => 'unique:pegawais|digits:20'
        // ],$pesan);
        $pegawai = new pegawai();
        $pegawai->no_pegawai = $request->no;
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat; 
        $pegawai->tgl_lahir = $request->tgl; 
        $pegawai->id_bank = $request->bank;
        $pegawai->save();
        return redirect()->route('pegawai.index')->with(['message' => 'pegawai Berhasil Didaftarkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = pegawai::findorfail($id);
        $bank = cabang_bank::all();
            return view('pegawai.show',compact('pegawai','bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = pegawai::findorfail($id);
        $bank = cabang_bank::all();
            return view('pegawai.edit',compact('pegawai','bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $pegawai = pegawai::findorfail($id);
        $pegawai->no_pegawai = $request->no;
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat; 
        $pegawai->tgl_lahir = $request->tgl; 
        $pegawai->id_bank = $request->bank;
        $pegawai->update();
        return redirect()->route('pegawai.index')->with(['message' => 'pegawai Berhasil Didaftarkan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = pegawai::findorfail($id)->delete();
        // rekening::findorfail();
        // $nasabah = nasabah::all()->toarray();
        // for ($i=0; $i <= count($nasabah) ; $i++) {
        //     $nasabah1 = nasabah::findorfail($i);
        //     if($nasabah1->pegawai != NULL){
        //     $hitung = $nasabah1->Pegawai()->count();
        //     dd($hitung);
        //     echo 'hello';
        // }
        // }
        // if($nasabah->pegawai != NULL){
        //     $hitung = $nasabah->Pegawai()->count();
        //     dd($hitung);
            // echo 'hello';
        // }
        // if ($pegawai->nasabah != NULL) {
        //     $pegawai1 = pegawai::findorfail($id)->get();
        //     foreach ($pegawai1 as $data) {
        //         # code...
        //         $id_bank = $data->id_bank;
        //         $rekening = rekening::where('id_bank',$id_bank)->get();
        //     dd($rekening);
        //     }
        // }
        // dd($pegawai->nasabah);
        // $null = nasabah:: ;
        // if () {
            # code...
        // }
            return redirect()->route('pegawai.index')->with(['message' => 'pegawai Berhasil Dihapus']);
    }
}