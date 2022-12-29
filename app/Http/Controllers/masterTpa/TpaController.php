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
        $tpa = Tpa::all();
        return DataTables::of($tpa)
        

        ->addColumn('action', function ($p) {
            return "
                <a href='". route('MasterTpa.tpa.show', $p->id) ."'  title='Detail'><i class='icon-eye mr-1'></i></a>
                <a href='". route('MasterTpa.tpa.edit', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus'><i class='icon-remove'></i></a>";
        })

        
        
        ->editColumn('id_status', function($p){
            if ($p->id_status == 1) {
               return "Fasum";
            } else {
                return "Pinjam Pakai";
            }
            
        })

        ->editColumn('id_jenis', function($p){
            if ($p->id_status == 1) {
               return "TPA Swasta";
            } else {
                return "TPA Pemda";
            }
            
        })

        ->editColumn('sumber_dana', function($p){
            if ($p->sumber_dana == 1) {
               return "APBD";
            } else {
                return "APBN";
            }
            
        })

        ->editColumn('alamat', function ($p){
            
            return $p->alamat.','.$p->kelurahan->n_kelurahan.','.$p->kecamatan->n_kecamatan.','.$p->kabupaten->n_kabupaten.','.$p->provinsi->n_provinsi
            ;
        })

        ->editColumn('luas', function($p){
            return number_format($p->luas, 2, '.', ',');
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
        
        $provinsi = Provinsi::where('kode', 36)->get();
        return view('masterTpa.tambah_tpa', compact('provinsi'));
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
            'alamat' => 'required',
            'id_kelurahan' => 'required',
            'id_kecamatan' => 'required',
            'id_kabupaten' => 'required',
            'id_provinsi' => 'required',
            'telepon' => 'required',
            'kordinat' => 'required',
            'pengurus' => 'required',
            'operator' => 'required',
            'jumlah_kk' => 'required',
            'id_status' => 'required',
            'id_jenis' => 'required',
            'sumber_dana' => 'required',
            'keaktifan' => 'required',
            'luas' => 'required',
        ]);

        if($request->foto != null){
            $image = $request->file('foto');
            $nameFoto = rand() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar_tpa', $nameFoto, 'sftp', 'public');
        }

        //kode
        //kode urut
        $data = Tpa::all()->max('kode');
        // $kode_terbesar = $data_tpa->kode;
        $urutan = substr($data, -3, 3);
        $urutan++;
        $no_urut =  sprintf("%04s", $urutan);

        // dd('urutan='.$no_urut);
        $id_jenis = sprintf("%02s", $request->id_jenis);
        // dd($id_jenis)

         $kode = "$id_jenis$request->id_kecamatan$no_urut";
        //  dd($kode);

        $tpa = new Tpa();
        $tpa->nama_fasilitas = $request->nama_fasilitas;
        $tpa->foto = $nameFoto;
        $tpa->alamat = $request->alamat;
        $tpa->id_kelurahan = $request->id_kelurahan;
        $tpa->id_kecamatan = $request->id_kecamatan;
        $tpa->id_kabupaten = $request->id_kabupaten;
        $tpa->id_provinsi = $request->id_provinsi;
        $tpa->telepon = $request->telepon;
        $tpa->kordinat = $request->kordinat;
        $tpa->pengurus = $request->pengurus;
        $tpa->operator = $request->operator;
        $tpa->jumlah_kk = $request->jumlah_kk;
        $tpa->id_status = $request->id_status;
        $tpa->id_jenis = $request->id_jenis;
        $tpa->sumber_dana = $request->sumber_dana;
        $tpa->keaktifan = $request->keaktifan;
        $tpa->luas = $request->luas;
        $tpa->kode = $kode;
        $tpa->save();

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
        $request->validate([
            'nama_fasilitas' => 'required',
            'alamat' => 'required',
            'id_kelurahan' => 'required',
            'id_kecamatan' => 'required',
            'id_kabupaten' => 'required',
            'id_provinsi' => 'required',
            'telepon' => 'required',
            'kordinat' => 'required',
            'pengurus' => 'required',
            'operator' => 'required',
            'jumlah_kk' => 'required',
            'id_status' => 'required',
            'id_jenis' => 'required',
            'sumber_dana' => 'required',
            'keaktifan' => 'required',
            'luas' => 'required',
        ]);

        $tpa = Tpa::findOrFail($id);

        if($request->foto != null){
            $image = $request->file('foto');
            $nameFoto = rand() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar_tpa', $nameFoto, 'sftp', 'public');

            $tpa->update([

                'nama_fasilitas' => $request->nama_fasilitas,
                'foto' => $nameFoto,
                'alamat' => $request->alamat,
                'id_kelurahan' => $request->id_kelurahan,
                'id_kecamatan' => $request->id_kecamatan,
                'id_kabupaten' => $request->id_kabupaten,
                'id_provinsi' => $request->id_provinsi,
                'telepon' => $request->telepon,
                'kordinat' => $request->kordinat,
                'pengurus' => $request->pengurus,
                'operator' => $request->operator,
                'jumlah_kk' => $request->jumlah_kk,
                'id_status' => $request->id_status,
                'id_jenis' => $request->id_jenis,
                'sumber_dana' => $request->sumber_dana,
                'keaktifan' => $request->keaktifan,
                'luas' => $request->luas,
                'kode' => $request->kode,
        
            ]);
        }

        

        $tpa->update([

        'nama_fasilitas' => $request->nama_fasilitas,
        'alamat' => $request->alamat,
        'id_kelurahan' => $request->id_kelurahan,
        'id_kecamatan' => $request->id_kecamatan,
        'id_kabupaten' => $request->id_kabupaten,
        'id_provinsi' => $request->id_provinsi,
        'telepon' => $request->telepon,
        'kordinat' => $request->kordinat,
        'pengurus' => $request->pengurus,
        'operator' => $request->operator,
        'jumlah_kk' => $request->jumlah_kk,
        'id_status' => $request->id_status,
        'sumber_dana' => $request->sumber_dana,
        'keaktifan' => $request->keaktifan,
        'luas' => $request->luas,
        'kode' => $request->kode,

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
        Tpa::destroy($id);
        Sampah_terkelola::where('id_tpa', $id)->delete();
        

        return response()->json([
            'message' => 'Data TPA Berhasil di Hapus.'
        ]);
    }


    public function api_detail(Request $request){

        $id_tpa = $request->data_detail_id;

        $tpa_detail = Sampah_terkelola::where('id_tpa', $id_tpa)
        ->orderBy('tahun', 'DESC')
        ->get();
        // dd($tpa_detail);
        return DataTables::of($tpa_detail)
        

        ->addColumn('action', function ($p) {
            return "
               
                <a href='". route('MasterTpa.tpa.edit_detail', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
                <a href='#' onclick='remove_detail(" . $p->id . ")' class='text-danger' title='Hapus'><i class='icon-remove'></i></a>";
        })

        
        
        ->editColumn('sampah_masuk', function($p){
            return number_format($p->sampah_masuk, 2, '.', ',');
        })

        ->editColumn('sampah_landfil', function($p){
            return number_format($p->sampah_landfil, 2, '.', ',');
        })

        ->editColumn('sampah_organik', function($p){
            return number_format($p->sampah_organik, 2, '.', ',');
        })

        ->editColumn('sampah_an_organik', function($p){
            return number_format($p->sampah_an_organik, 2, '.', ',');
        })

        ->editColumn('energy', function($p){
            return number_format($p->energy, 2, '.', ',');
        })

        ->editColumn('recovery_pemulung', function($p){
            return number_format($p->recovery_pemulung, 2, '.', ',');
        })

        

        


        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
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
            'tahun' => 'required',
            'sampah_masuk' => 'required',
            'sampah_landfil' => 'required'

        ]);

        foreach($request->sampah_organik as $key => $terkelola){

        

        $terkelola = New Sampah_terkelola();
        $terkelola->id_tpa = $request->id_tpa;
        $terkelola->sampah_organik = $request->sampah_organik[$key];
        $terkelola->sampah_an_organik = $request->sampah_an_organik[$key];
        $terkelola->recovery_pemulung = $request->recovery_pemulung[$key];
        $terkelola->energy = $request->energy[$key];
        $terkelola->tahun = $request->tahun[$key];
        $terkelola->sampah_masuk = $request->sampah_masuk[$key];
        $terkelola->sampah_landfil = $request->sampah_landfil[$key];
        $terkelola->save();

    }

        

        return response()->json([
            'message' => 'Data Berhasil di Tambahkan!'
        ]);


    }


    

    
    public function edit_detail($id){
        // dd($id);
        $terkelola = Sampah_terkelola::find($id);
        // dd($terkelola);

        return view('masterTpa.edit_pengolahan', compact('terkelola'));
    }


    public function pengolahan_update(Request $request){

        $request->validate([
            'sampah_organik' => 'required',
            'sampah_an_organik' => 'required',
            'recovery_pemulung' => 'required',
            'energy' => 'required',
            'tahun' => 'required',
            'sampah_masuk' => 'required',
            'sampah_landfil' => 'required'

        ]);

        $terkelola = Sampah_terkelola::where('id', $request->id)->first();

        $terkelola->update([
            
            'sampah_organik' => $request->sampah_organik,
            'sampah_an_organik' => $request->sampah_an_organik,
            'recovery_pemulung' => $request->recovery_pemulung,
            'energy' => $request->energy,
            'tahun' => $request->tahun,
            'sampah_masuk' => $request->sampah_masuk,
            'sampah_landfil' => $request->sampah_landfil

        ]);

        return response()->json([
            'message' => 'Data Berhasil di Rubah!'
        ]);
       
    }

    public function destroy_detail($id)
    {
        // dd($id);
        $kelola = Sampah_terkelola::find($id);
        $kelola->delete();

        return response()->json([
            'message' => 'Data TPA Berhasil di Hapus.'
        ]);
    }



  

}
