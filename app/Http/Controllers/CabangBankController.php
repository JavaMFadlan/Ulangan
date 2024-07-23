<?php

namespace App\Http\Controllers;

use App\cabang_bank;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class CabangBankController extends Controller
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
        $bank = cabang_bank::all();
            return view('bank.index',compact('bank'));
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
        $bank = new cabang_bank;
        $bank->nama_bank = $request->nama;
        $bank->alamat_bank = $request->alamat_bank;
        $array = array($request->fungsi,$request->operasi,$request->kepemilikan);
        $alpha = implode(",",$array);
        $bank->jenis_bank = $alpha;
        $bank->status_bank = $request->status;
        $bank->save();
        return redirect()->route('bank.index')->with(['message' => 'Data Berhasil Dimasukkan']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cabang_bank  $cabang_bank
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = cabang_bank::findorfail($id);
        return view('bank.show',compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cabang_bank  $cabang_bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = cabang_bank::findorfail($id);
        return view('bank.edit',compact('bank'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cabang_bank  $cabang_bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bank = cabang_bank::findorfail($id);
        $bank->nama_bank = $request->nama;
        $bank->alamat_bank = $request->alamat_bank;
        $array = array($request->fungsi,$request->operasi,$request->kepemilikan);
        $alpha = implode(",",$array);
        $bank->jenis_bank = $alpha;
        $bank->status_bank = $request->status;
        $bank->save();
        return redirect()->route('bank.index')->with(['message' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cabang_bank  $cabang_bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = cabang_bank::findorfail($id)->delete();
        return redirect()->route('bank.index')->with(['message1' => 'Data Berhasil Dihapus']);
    }

    public function pdf()
    {
        try {
            $nasabah = cabang_bank::all();
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
