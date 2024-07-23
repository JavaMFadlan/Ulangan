<?php

namespace App\Http\Controllers;

use App\kartu;
use App\rekening;
use App\nasabah;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class KartuController extends Controller
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
     * @param  \App\kartu  $kartu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kartu = kartu::findorfail($id);
            return view('kartu.show',compact('kartu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kartu  $kartu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kartu = kartu::findorfail($id);
            return view('kartu.edit',compact('kartu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kartu  $kartu
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // dd($request->all());
        $kartu = kartu::findorfail($id);
        $kartu->no_sandi= $request->no_sandi;
        $kartu->update();
        return redirect()->route('nasabah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kartu  $kartu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekening = rekening::where('id_kartu',$id)->get();
        foreach ($rekening as $data) {
            $rekening1 = $data;
        }
        foreach ($rekening1->nasabah as $key) {
            $nasabah = nasabah::findorfail($key->id);
            $rekening1->find($id)->Nasabah()->detach();
            $h = $nasabah->Rekening()->count();

        }
            if ($h == 0) {
                $nasabah->delete();
            }

        $kartu = kartu::findorfail($id);
        $kartu->delete();
        $rekening1->delete();

        return redirect()->route('nasabah.index');
    }

    public function pdf()
    {
        try {
            $nasabah = kartu::all();
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
