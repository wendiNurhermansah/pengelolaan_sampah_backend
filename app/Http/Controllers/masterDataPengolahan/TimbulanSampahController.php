<?php

namespace App\Http\Controllers\masterDataPengolahan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Timbulan_sampah;
use Yajra\DataTables\Facades\DataTables;


class TimbulanSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterDataPengolahan.timbulan.index');
    }

    public function api(){
        $timbulan = Timbulan_sampah::all();
        return DataTables::of($timbulan)
        

            ->addColumn('action', function ($p) {
                return "
                    <a href='". route('MasterDataPengolahan.timbulan_sampah.show', $p->id) ."'  title='Detail'><i class='icon-eye mr-1'></i></a>
                    <a href='". route('MasterDataPengolahan.timbulan_sampah.edit', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })

            ->editColumn('timbul_harian', function($p){
                return number_format($p->timbul_harian, 2, '.', ',');
            })

            ->editColumn('timbul_tahunan', function($p){
                return number_format($p->timbul_tahunan, 2, '.', ',');
            })

            ->editColumn('id_kabupaten', function($p){
                return $p->kabupaten->n_kabupaten;
            })
            ->editColumn('id_kecamatan', function($p){
                return $p->kecamatan->n_kecamatan;
            })

            ->editColumn('alamat', function ($p){
            
                return $p->alamat.','.$p->kelurahan->n_kelurahan.','.$p->kecamatan->n_kecamatan.','.$p->kabupaten->n_kabupaten.','.$p->provinsi->n_provinsi
                ;
            })




            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::where('kode', 36)->get();
        return view('masterDataPengolahan.timbulan.create', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'alamat' => 'required',
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'timbul_harian' => 'required',
            'timbul_tahunan' => 'required',
        ]);

        $timbul = new Timbulan_sampah();
        $timbul->tahun = $request->tahun;
        $timbul->id_provinsi = $request->id_provinsi;
        $timbul->id_kabupaten = $request->id_kabupaten;
        $timbul->id_kecamatan = $request->id_kecamatan;
        $timbul->id_kelurahan = $request->id_kelurahan;
        $timbul->alamat = $request->alamat;
        $timbul->timbul_harian = $request->timbul_harian;
        $timbul->timbul_tahunan = $request->timbul_tahunan;
        $timbul->save();

        return response()->json([
            'message' => 'Data Berhasil di Tambahkan!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timbulan = Timbulan_sampah::find($id);

        return view('masterDataPengolahan.timbulan.show', compact('timbulan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timbulan = Timbulan_sampah::find($id);
        $provinsi = Provinsi::where('kode', 36)->get();
        $kabupaten = Kabupaten::where('provinsi_id', 3)->get();
        $kecamatan = Kecamatan::where('kabupaten_id', $timbulan->id_kabupaten)->get();
        $kelurahan = Kelurahan::where('kecamatan_id', $timbulan->id_kecamatan)->get();

        return view('masterDataPengolahan.timbulan.edit', compact('timbulan','provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'alamat' => 'required',
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'timbul_harian' => 'required',
            'timbul_tahunan' => 'required',
        ]);

        $timbul = Timbulan_sampah::find($id);
        $timbul->update([
            'tahun' => $request->tahun,
            'alamat' => $request->alamat,
            'id_provinsi' => $request->id_provinsi,
            'id_kabupaten' => $request->id_kabupaten,
            'id_kecamatan' => $request->id_kecamatan,
            'id_kelurahan' => $request->id_kelurahan,
            'timbul_harian' => $request->timbul_harian,
            'timbul_tahunan' => $request->timbul_tahunan,

        ]);

        

        return response()->json([
            'message' => 'Data Berhasil di Rubah!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Timbulan_sampah::destroy($id);

        return response()->json([
            'message' => 'Data Berhasil di Hapus!'
        ]);
    }
}
