<?php

namespace App\Http\Controllers;

use App\nasabah;
use App\rekening;
use App\pegawai;
use App\cabang_bank;
use App\kartu;
use App\jenis;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public $attributes;

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
        $nasabah = nasabah::paginate(5);
        // foreach ($nasabah as $data) {
                // $con = $data->pegawai->unique()->values()->all();
                // dd($mm);
        // }
        // foreach ($nasabah as $data) {
        //     foreach ($data->pegawai as $key) {
        //         if () {
        //             # code...
        //         }
        //     }
        // }
        return view('nasabah.index',compact('nasabah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nasabah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->nama;
        $alamat = $request->alamat;
        $no_telp = $request->no_telepon;
        $tgl_lahir = $request->tgl_lahir;
        $pekerjaan = $request->pekerjaan;
        $membuat = $request->membuat;
        $array = array($nama,$alamat,$no_telp,$tgl_lahir,$pekerjaan,$membuat);
        $implode = implode(',',$array);
        return redirect()->route('rekening.create', ['implode'=>$implode]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $nasabah = nasabah::findorfail($id);
            $kartu = [];
            $jenis = [];
            foreach($nasabah->rekening as $data => $value){
                $kartu[] = kartu::findorfail($value->id_kartu);
                $jenis[] = jenis::findorfail($value->id_jenis);

            }
            // foreach ($nasabah->pegawai as $key) {
                // $cuma = $key->pegawai->unique()->values()->all();
            // }
            // dd($nasabah->pegawai->unique());
            $cuma = $nasabah->pegawai->unique();
            // $kartu = implode(',',$kartu1);
            // dd($implode_kartu);


            // if(array_unique($bank)){
            //     dd($bank);
            // }
            // dd($kartu,$jenis,$bank);
            return view('nasabah.show',compact('nasabah','cuma','kartu','jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nasabah = nasabah::findorfail($id);
            $kartu = [];
            // $jenis = [];
            // $bank = [];
            foreach($nasabah->rekening as $data => $value){
                $kartu[] = kartu::findorfail($value->id_kartu);
            //     $jenis[] = jenis::findorfail($value->id_jenis);

            }
            // foreach($nasabah->pegawai as $item){
            //     $bank[] = cabang_bank::findorfail($item->id_bank);
            // }
        return view('nasabah.edit',compact('nasabah','bank','kartu','jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $nasabah = nasabah::findorfail($id);
        $nasabah->nama = $request->nama;
        $nasabah->alamat = $request->alamat;
        $nasabah->no_telepon = $request->no_telepon;
        $nasabah->tgl_lahir = $request->tgl_lahir;
        $nasabah->pekerjaan = $request->pekerjaan;
        $nasabah->update();
        return redirect()->route('nasabah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nasabah = nasabah::findorfail($id);
        foreach ($nasabah->rekening as $data) {
            $rekening = rekening::findorfail($data->id);
            $kartu = kartu::findorfail($rekening->id_kartu);
            $kartu->delete();
        }
        $nasabah->Rekening()->detach();
        $nasabah->delete();
        return redirect()->route('nasabah.index');
    }

    public function pdf()
    {
        try {
            $nasabah = nasabah::all();
            if ($nasabah != null || $nasabah != false) {
                $body = view('nasabah.print', compact('nasabah'))->render();

                $pdf = new Dompdf();
                $pdf->loadHtml($body);
                $pdf->setPaper('A4', 'portrait');
                $pdf->render();

                return $pdf->stream('document.pdf');
            }
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'Failed to See data'
            ], 400);
        }

    }
}
