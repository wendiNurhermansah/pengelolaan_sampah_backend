<?php
namespace App\Http\Controllers\masterDataPengolahan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Komposisi;
use App\Models\Provinsi;
use App\Models\Timbulan_sampah;
use Yajra\DataTables\Facades\DataTables;


class KomposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterDataPengolahan.komposisi.index');
    }

    public function api(){
        $komposisi = Komposisi::all();
        return DataTables::of($komposisi)
        

            ->addColumn('action', function ($p) {
                return "
                    <a href='". route('MasterDataPengolahan.komposisi_sampah.show', $p->id) ."'  title='Detail'><i class='icon-eye mr-1'></i></a>
                    <a href='". route('MasterDataPengolahan.komposisi_sampah.edit', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
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
        return view('masterDataPengolahan.komposisi.create', compact('provinsi'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
