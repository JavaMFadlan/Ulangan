<?php

namespace App\Http\Controllers;

use App\rekening;
use App\pegawai;
use App\jenis;
use App\cabang_bank;
use App\nasabah;
use App\nasabah_rekening_pegawai;
use App\kartu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RekeningController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $var= app('request')->get('gg');
        // dd($_GET['implode']);
        $explode = array(explode(',',$_GET['implode']));
        $jenis = jenis::all();
        $pegawai = pegawai::all();
        // for ($i = 0;$i<) {
        //     dd($key);
        // }
        // dd($explode);
        return view('rekening.create',compact('explode','jenis','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nasabah = new nasabah();
        $nasabah->nama = $request->nama;
        $nasabah->alamat = $request->alamat;
        $nasabah->no_telepon = $request->no_telepon;
        $nasabah->tgl_lahir = $request->tgl_lahir;
        $nasabah->pekerjaan = $request->pekerjaan;
        $nasabah->save();
        $data = array();
        $data1 = array();
        $input = $request->all();
        for ($i=0;$i<$input['buat'];$i++) {
            $ss = carbon::now()->addYears(2)->format('y-m-d');
            $data1 = [
                'no_kartu' => mt_rand(100000,999999),
                'no_sandi' => $input['sandi'][$i],
                'masa_berlaku' => $ss,
                'kode_cvv' => mt_rand(000,999)
            ];
            kartu::create($data1);
            $kar = kartu::orderby('id','desc')->get('id')->first()->id;
            $pegawai1 = pegawai::findorfail($input['pegawai'][$i]);
            $data = [
                'no_rekening' => mt_rand(000000,999999),
                'id_kartu' => $kar,
                'id_jenis' => $input['jenis_rekening'][$i],
                'id_bank' => $pegawai1->id_bank,
                'saldo' => $input['saldo'][$i],
                'aktif' => 'aktif',
                'masa_pakai' => $ss
            ];
            rekening::create($data);
            $rek = rekening::orderby('id','desc')->get('id')->first()->id;
            $pegawai = pegawai::findorfail($input['pegawai'][$i]);
            $nasabah->Rekening()->attach($rek,['id_pegawai' => $pegawai->id]);
        }
        return redirect()->route('nasabah.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rekening = rekening::findorfail($id);
        $jenis = jenis::findorfail($rekening->id_jenis);
        $kartu = kartu::findorfail($rekening->id_kartu);
            return view('rekening.show',compact('rekening','kartu','jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekening = rekening::findorfail($id);
        $jenis = jenis::all();
        $kartu = kartu::findorfail($rekening->id_kartu);
        
            return view('rekening.edit',compact('rekening','kartu','jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rekening = rekening::findorfail($id);
        $aktif = '';
        if ($request->aktif == NULL) {
            $aktif = 'Terblokir';
        }
        else{
            $aktif = 'aktif';
        }
        $rekening->id_jenis = $request->jenis_rekening;
        $rekening->saldo = $request->saldo;
        $rekening->masa_pakai = $request->masa_berlaku;
        $rekening->aktif = $aktif;
        $rekening->update();
        $kartu = kartu::findorfail($rekening->id_kartu);
        $kartu->masa_berlaku= $request->masa_berlaku;
        $kartu->update();
        // dd($request->all());
        return redirect()->route('nasabah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekening = rekening::findorfail($id);
        foreach ($rekening->nasabah as $key) {
            $nasabah = nasabah::findorfail($key->id);
            $rekening->find($id)->Nasabah()->detach();
            $h = $nasabah->Rekening()->count();
            
        }
            if ($h == 0) {
                $nasabah->delete();
            }
        
        $kartu = kartu::findorfail($rekening->id_kartu);
        $kartu->delete();
        $rekening->delete();
        
        return redirect()->route('nasabah.index');
    }
}