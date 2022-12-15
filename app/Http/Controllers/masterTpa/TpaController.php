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
                if ($p->id_jenis_tpa == 1) {
                    return "TPA SWASTA";
                } else {
                    return "TPA PEMDA";
                }
                
            })

            ->editColumn('id_status_tpa', function($p){
                return $p->status->nama;
            })

            ->editColumn('alamat', function ($p){
                
                return $p->alamat.','.$p->kelurahan->n_kelurahan.','.$p->kecamatan->n_kecamatan.','.$p->kabupaten->n_kabupaten.','.$p->provinsi->n_provinsi
                ;
            })
            ->editColumn('luas', function($p){
                return number_format($p->luas, 2, '.', ',');
            })

            ->editColumn('sampah_masuk', function($p){
                return number_format($p->sampah_masuk, 2, '.', ',');
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
            'sampah_masuk' => 'required',
            'pengelola' => 'required',
            'luas' => 'required',
            'awal_beroprasi' => 'required'
        
        ]);

        //save foto
        if($request->foto != null){
            $image = $request->file('foto');
            $nameFoto = rand() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar_tpa', $nameFoto, 'sftp', 'public');
        }

        //kode urut
        $data_tpa = Tpa::all()->max('kode');
        // $kode_terbesar = $data_tpa->kode;
        $urutan = substr($data_tpa, -3, 3);
        $urutan++;
        $no_urut =  sprintf("%04s", $urutan);

        // dd('urutan='.$no_urut);
        $id_jenis = sprintf("%02s", $request->id_jenis_tpa);
        // dd($id_jenis)

         $kode = "$id_jenis$request->id_provinsi$request->id_kabupaten$request->id_kecamatan$request->kelurahan$no_urut";
        
        // dd($kode);
        //tpa
        $tpa = New Tpa();
        $tpa->nama_fasilitas = $request->nama_fasilitas;
        $tpa->foto = $nameFoto;
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
        $tpa->awal_beroprasi = $request->awal_beroprasi;
        $tpa->luas = $request->luas;
        $tpa->luas_landfil_aktif = $request->luas_landfil_aktif;
        $tpa->pencatatan = $request->pencatatan;
        $tpa->jembatan_timbang = $request->jembatan_timbang;
        $tpa->penutupan_sampah_aktif = $request->penutupan_sampah_aktif;
        $tpa->jumlah_sumur_pantau = $request->jumlah_sumur_pantau;
        $tpa->ipl = $request->ipl;
        $tpa->uji_lindi = $request->uji_lindi;
        $tpa->drainase = $request->drainase;
        $tpa->gas_metana = $request->gas_metana;
        $tpa->jumlah_kk = $request->jumlah_kk;
        $tpa->kordinat = $request->kordinat;
        $tpa->kode = $kode;
        $tpa->save();

        

        // //data sampah terkelola
        // $terkelola = New Sampah_terkelola();
        // $terkelola->id_tpa = $tpa->id;
        // $terkelola->sampah_organik = $request->sampah_organik;
        // $terkelola->sampah_an_organik = $request->sampah_an_organik;
        // $terkelola->recovery_pemulung = $request->recovery_pemulung;
        // $terkelola->energy = $request->energy;
        // $terkelola->save();

       
       
        
        

        // dd($oprational);

        return response()->json([
            'message' => 'Data Berhasil Disimpan.'
        ]);

        
    }

    public function pengolahan(Request $request, $id){
        
        $pengolahan = Tpa::find($id);

        return view('masterTpa.pengolahan', compact('pengolahan'));


    }

    public function pengolahan_store(Request $request){

        
        $request->validate([
            'sampah_organik' => 'required',
            'sampah_an_organik' => 'required',
            'recovery_pemulung' => 'required',
            'energy' => 'required',
            'tahun' => 'required'

        ]);

        $terkelola = New Sampah_terkelola();
        $terkelola->id_tpa = $request->id;
        $terkelola->sampah_organik = $request->sampah_organik;
        $terkelola->sampah_an_organik = $request->sampah_an_organik;
        $terkelola->recovery_pemulung = $request->recovery_pemulung;
        $terkelola->energy = $request->energy;
        $terkelola->tahun = $request->tahun;
        $terkelola->save();

        

        return response()->json([
            'message' => 'Data Berhasil di Tambahkan!'
        ]);


    }


    public function edit_pengolahan($id){
        // dd($id)
        $terkelola = Sampah_terkelola::where('id_tpa', $id)->first();
        // dd($terkelola);

        return view('masterTpa.edit_pengolahan', compact('terkelola'));
    }

    public function pengolahan_update(Request $request){

        $request->validate([
            'sampah_organik' => 'required',
            'sampah_an_organik' => 'required',
            'recovery_pemulung' => 'required',
            'energy' => 'required',
            'tahun' => 'required'

        ]);

        $terkelola = Sampah_terkelola::where('id_tpa', $request->id_tpa)->first();

        $terkelola->update([
            
            'sampah_organik' => $request->sampah_organik,
            'sampah_an_organik' => $request->sampah_an_organik,
            'recovery_pemulung' => $request->recovery_pemulung,
            'energy' => $request->energy,
            'tahun' => $request->tahun,

        ]);

        return response()->json([
            'message' => 'Data Berhasil di Rubah!'
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
        // dd($id);
        $tpa = Tpa::findOrFail($id);
        

        // dd($terkelola);
// 
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
        $tpa = Tpa::findOrFail($id);
        $request->validate([
            'nama_fasilitas' => 'required',
            'id_jenis_tpa' => 'required',
            'id_status_tpa' => 'required',
            'alamat' => 'required',
            'id_kabupaten' => 'required',
            'id_kelurahan' => 'required',
            'id_provinsi' => 'required',
            'id_kecamatan' => 'required',
            'sampah_masuk' => 'required',
            'pengelola' => 'required',
            'luas' => 'required',
            'awal_beroprasi' => 'required'
        
        ]);

         //save foto
         if($request->foto != null){
            $image = $request->file('foto');
            $nameFoto = rand() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar_tpa', $nameFoto, 'sftp', 'public');

            $tpa->update([
                'nama_fasilitas' => $request->nama_fasilitas,
                'foto' => $nameFoto,
                'id_jenis_tpa' => $request->id_jenis_tpa, 
                'id_status_tpa' => $request->id_status_tpa, 
                'alamat' => $request->alamat, 
                'id_kabupaten' => $request->id_kabupaten, 
                'id_kelurahan' => $request->id_kelurahan, 
                'id_provinsi' => $request->id_provinsi, 
                'id_kecamatan' => $request->id_kecamatan, 
                'tahun' => $request->tahun, 
                'sampah_masuk' => $request->sampah_masuk, 
                'sampah_landfil' => $request->sampah_landfil, 
                'pengelola' => $request->pengelola, 
                'awal_beroprasi' => $request->awal_beroprasi,
                'luas' => $request->luas,
                'luas_landfil_aktif' => $request->luas_landfil_aktif,
                'pencatatan' => $request->pencatatan,
                'jembatan_timbang' => $request->jembatan_timbang,
                'penutupan_sampah_aktif' => $request->penutupan_sampah_aktif,
                'jumlah_sumur_pantau' => $request->jumlah_sumur_pantau,
                'ipl' => $request->ipl,
                'uji_lindi' => $request->uji_lindi,
                'drainase' => $request->drainase,
                'gas_metana' => $request->gas_metana,
                'jumlah_kk' => $request->jumlah_kk,
                'kordinat' => $request->kordinat,
                'kode' => $request->kode,
            ]);
        }

        $tpa->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'id_jenis_tpa' => $request->id_jenis_tpa, 
            'id_status_tpa' => $request->id_status_tpa, 
            'alamat' => $request->alamat, 
            'id_kabupaten' => $request->id_kabupaten, 
            'id_kelurahan' => $request->id_kelurahan, 
            'id_provinsi' => $request->id_provinsi, 
            'id_kecamatan' => $request->id_kecamatan, 
            'tahun' => $request->tahun, 
            'sampah_masuk' => $request->sampah_masuk, 
            'sampah_landfil' => $request->sampah_landfil, 
            'pengelola' => $request->pengelola, 
            'awal_beroprasi' => $request->awal_beroprasi,
            'luas' => $request->luas,
            'luas_landfil_aktif' => $request->luas_landfil_aktif,
            'pencatatan' => $request->pencatatan,
            'jembatan_timbang' => $request->jembatan_timbang,
            'penutupan_sampah_aktif' => $request->penutupan_sampah_aktif,
            'jumlah_sumur_pantau' => $request->jumlah_sumur_pantau,
            'ipl' => $request->ipl,
            'uji_lindi' => $request->uji_lindi,
            'drainase' => $request->drainase,
            'gas_metana' => $request->gas_metana,
            'jumlah_kk' => $request->jumlah_kk,
            'kordinat' => $request->kordinat,
            'kode' => $request->kode,
        ]);




        



        return response()->json([
            'message' => 'Data Berhasil Dirubah!'
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
        Tpa::destroy($id);
        Sampah_terkelola::where('id_tpa', $id)->delete();

        return response()->json([
            'message' => 'Data TPA Berhasil di Hapus.'
        ]);
    }
}
