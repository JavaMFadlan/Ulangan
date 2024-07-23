<?php

namespace App\Http\Controllers;

use App\jenis;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class JenisController extends Controller
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
        $jenis = jenis::all();
            return view('jenis.index',compact('jenis'));
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
        $jenis = new jenis;
        $jenis->jenis_rekening = $request->jenis;
        $jenis->save();
        return redirect()->route('jenis.index')->with(['message' => 'Data Berhasil Dimasukkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenis = jenis::findorfail($request->id);
        $jenis->jenis_rekening = $request->jenis;
        $jenis->save();
        return redirect()->route('jenis.index')->with(['message' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $jenis = jenis::findorfail($id)->delete();
        return redirect()->route('jenis.index')->with(['message1' => 'Data Berhasil Dihapus']);
    }
}
