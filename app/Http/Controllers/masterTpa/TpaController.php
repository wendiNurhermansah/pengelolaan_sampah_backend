<?php

namespace App\Http\Controllers\masterTpa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data_oprasional_tpa;
use App\Models\Jenis_tpa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Sampah_terkelola;
use App\Models\Status_tpa;
use App\Models\Tpa;
use PhpParser\Node\Expr\New_;
use Yajra\DataTables\Facades\DataTables;

class TpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterTpa.tpa');
    }


    public function api(){
        $tpa = Tpa::orderBy('id', 'DESC')->get();
        return DataTables::of($tpa)
        

            ->addColumn('action', function ($p) {
                return "
                    <a href='". route('MasterTpa.tpa.show', $p->id) ."'  title='Detail'><i class='icon-eye mr-1'></i></a>
                    <a href='". route('MasterTpa.tpa.edit', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus'><i class='icon-remove'></i></a>";
            })

            ->editColumn('id_jenis_tpa', function($p){
                return $p->jenis->nama;
            })

            ->editColumn('id_status_tpa', function($p){
                return $p->status->nama;
            })

            ->editColumn('alamat', function ($p){
                
                return $p->alamat.','.$p->kelurahan->n_kelurahan.','.$p->kecamatan->n_kecamatan.','.$p->kabupaten->n_kabupaten.','.$p->provinsi->n_provinsi
                ;
            })
            ->editColumn('sampah_masuk', function($p){
                return number_format($p->sampah_masuk, 2, '.', ',');
            })

            ->editColumn('sampah_landfil', function($p){
                return number_format($p->sampah_landfil, 2, '.', ',');
            })


            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

     /**
     * Alamat
     *
     */

    public function kabupatenByProvinsi($provinsi_id)
    {
        return Kabupaten::select('id', 'n_kabupaten')->where('provinsi_id', $provinsi_id)->get();
    }

    public function kecamatanByKabupaten($kabupaten_id)
    {
        return Kecamatan::select('id', 'n_kecamatan')->where('kabupaten_id', $kabupaten_id)->get();
    }

    public function kelurahanByKecamatan($kecamatan_id)
    {
        return Kelurahan::select('id', 'n_kelurahan')->where('kecamatan_id', $kecamatan_id)->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_tpa = Jenis_tpa::all();
        $status_tpa = Status_tpa::all();
        $provinsi = Provinsi::where('kode', 36)->get();
        return view('masterTpa.tambah_tpa', compact('jenis_tpa', 'status_tpa', 'provinsi'));
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
            'nama_fasilitas' => 'required',
            'id_jenis_tpa' => 'required',
            'id_status_tpa' => 'required',
            'alamat' => 'required',
            'id_kabupaten' => 'required',
            'id_kelurahan' => 'required',
            'id_provinsi' => 'required',
            'id_kecamatan' => 'required',
            'tahun' => 'required',
            'sampah_masuk' => 'required',
            'sampah_landfil' => 'required',
            'pengelola' => 'required',
        
        ]);
        
        //tpa
        $tpa = New Tpa();
        $tpa->nama_fasilitas = $request->nama_fasilitas;
        $tpa->id_jenis_tpa = $request->id_jenis_tpa; 
        $tpa->id_status_tpa = $request->id_status_tpa; 
        $tpa->alamat = $request->alamat; 
        $tpa->id_kabupaten = $request->id_kabupaten; 
        $tpa->id_kelurahan = $request->id_kelurahan; 
        $tpa->id_provinsi = $request->id_provinsi; 
        $tpa->id_kecamatan = $request->id_kecamatan; 
        $tpa->tahun = $request->tahun; 
        $tpa->sampah_masuk = $request->sampah_masuk; 
        $tpa->sampah_landfil = $request->sampah_landfil; 
        $tpa->pengelola = $request->pengelola; 
        $tpa->save();

        //data sampah terkelola
        $terkelola = New Sampah_terkelola();
        $terkelola->id_tpa = $tpa->id;
        $terkelola->sampah_organik = $request->sampah_organik;
        $terkelola->sampah_an_organik = $request->sampah_an_organik;
        $terkelola->recovery_pemulung = $request->recovery_pemulung;
        $terkelola->energy = $request->energy;
        $terkelola->save();

        //data Oprasional
        $oprational = New Data_oprasional_tpa();
        $oprational->id_tpa = $tpa->id;
        $oprational->awal_beroprasi = $request->awal_beroprasi;
        $oprational->luas = $request->luas;
        $oprational->luas_landfil_aktif = $request->luas_landfil_aktif;
        $oprational->pencatatan = $request->pencatatan;
        $oprational->jembatan_timbang = $request->jembatan_timbang;
        $oprational->penutupan_sampah_aktif = $request->penutupan_sampah_aktif;
        $oprational->jumlah_sumur_pantau = $request->jumlah_sumur_pantau;
        $oprational->ipl = $request->ipl;
        $oprational->uji_lindi = $request->uji_lindi;
        $oprational->drainase = $request->drainase;
        $oprational->gas_metana = $request->gas_metana;
        $oprational->jumlah_kk = $request->jumlah_kk;
        $oprational->save();

        // dd($oprational);

        return response()->json([
            'message' => 'Data Berhasil Disimpan.'
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
        $tpa = Tpa::findOrFail($id);

        return view ('masterTpa.detail', compact('tpa'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tpa = Tpa::findOrFail($id);
        $provinsi = Provinsi::where('kode', 36)->get();
        $kabupaten = Kabupaten::where('provinsi_id', 3)->get();
        $kecamatan = Kecamatan::where('kabupaten_id', $tpa->id_kabupaten)->get();
        $kelurahan = Kelurahan::where('kecamatan_id', $tpa->id_kecamatan)->get();
        // dd($kelurahan);
        $jenis_tpa = Jenis_tpa::all();
        $status_tpa = Status_tpa::all();
       


        return view ('masterTpa.edit', compact('tpa', 'provinsi', 'jenis_tpa', 'status_tpa', 'kabupaten', 'kecamatan', 'kelurahan'));
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
        Tpa::destroy($id);

        Data_oprasional_tpa::where('id_tpa', $id)->delete();
        Sampah_terkelola::where('id_tpa', $id)->delete();

        return response()->json([
            'message' => 'Data TPA Berhasil di Hapus.'
        ]);
    }
}
