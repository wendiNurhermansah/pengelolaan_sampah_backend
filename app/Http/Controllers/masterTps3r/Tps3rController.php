<?php

namespace App\Http\Controllers\masterTps3r;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelola_tps3r;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Tps3r;
use Yajra\DataTables\Facades\DataTables;


class Tps3rController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterTps3r.tps3r');
    }

    public function api(){
        $tps3r = Tps3r::orderBy('id', 'DESC')->get();
        return DataTables::of($tps3r)
        

            ->addColumn('action', function ($p) {
                return "
                    <a href='". route('MasterTps3r.tps3r.show', $p->id) ."'  title='Detail'><i class='icon-eye mr-1'></i></a>
                    <a href='". route('MasterTps3r.tps3r.edit', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus'><i class='icon-remove'></i></a>";
            })

            
            
            ->editColumn('id_status', function($p){
                if ($p->id_status == 1) {
                   return "Fasum";
                } else {
                    return "Pinjam Pakai";
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
        return view('masterTps3r.tambah_tps3r', compact('provinsi'));
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
            'keaktifan_tps' => 'required',
            'luas' => 'required',
        ]);

        if($request->foto != null){
            $image = $request->file('foto');
            $nameFoto = rand() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar_tps3r', $nameFoto, 'sftp', 'public');
        }

        //kode
        //kode urut
        $data_tps3r = Tps3r::all()->max('kode');
        // $kode_terbesar = $data_tpa->kode;
        $urutan = substr($data_tps3r, -3, 3);
        $urutan++;
        $no_urut =  sprintf("%04s", $urutan);

        // dd('urutan='.$no_urut);
        $id_jenis = sprintf("%02s", $request->id_jenis);
        // dd($id_jenis)

         $kode = "$id_jenis$request->id_kecamatan$no_urut";
        //  dd($kode);

        $tps = new Tps3r();
        $tps->nama_fasilitas = $request->nama_fasilitas;
        $tps->foto = $nameFoto;
        $tps->alamat = $request->alamat;
        $tps->id_kelurahan = $request->id_kelurahan;
        $tps->id_kecamatan = $request->id_kecamatan;
        $tps->id_kabupaten = $request->id_kabupaten;
        $tps->id_provinsi = $request->id_provinsi;
        $tps->telepon = $request->telepon;
        $tps->kordinat = $request->kordinat;
        $tps->pengurus = $request->pengurus;
        $tps->operator = $request->operator;
        $tps->jumlah_kk = $request->jumlah_kk;
        $tps->id_status = $request->id_status;
        $tps->id_jenis = $request->id_jenis;
        $tps->sumber_dana = $request->sumber_dana;
        $tps->keaktifan_tps = $request->keaktifan_tps;
        $tps->luas = $request->luas;
        $tps->kode = $kode;
        $tps->save();

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
        $tps = Tps3r::findOrFail($id);

        return view('masterTps3r.detail', compact('tps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tps = Tps3r::findOrFail($id);
        $provinsi = Provinsi::where('kode', 36)->get();
        $kabupaten = Kabupaten::where('provinsi_id', 3)->get();
        $kecamatan = Kecamatan::where('kabupaten_id', $tps->id_kabupaten)->get();
        $kelurahan = Kelurahan::where('kecamatan_id', $tps->id_kecamatan)->get();
        return view('masterTps3r.edit', compact('tps','provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
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
            'keaktifan_tps' => 'required',
            'luas' => 'required',
        ]);

        $tps = Tps3r::findOrFail($id);

        if($request->foto != null){
            $image = $request->file('foto');
            $nameFoto = rand() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar_tps3r', $nameFoto, 'sftp', 'public');

            $tps->update([

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
                'keaktifan_tps' => $request->keaktifan_tps,
                'luas' => $request->luas,
                'kode' => $request->kode,
        
            ]);
        }

        

        $tps->update([

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
        'keaktifan_tps' => $request->keaktifan_tps,
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

        Tps3r::destroy($id);
        Kelola_tps3r::where('id_tps3r', $id)->delete();

        return response()->json([
            'message' => 'Data berhasil di hapus!'
        ]);
    }


    public function api_detail(Request $request){

        $tps3r = $request->data_detail_id;

        $tps3r = Kelola_tps3r::where('id_tps3r', $tps3r)
        ->orderBy('tahun', 'DESC')
        ->get();
        // dd($tpa_detail);
        return DataTables::of($tps3r)
        

        ->addColumn('action', function ($p) {
            return "
               
                <a href='". route('MasterTps3r.tps3r.kelola_edit', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
                <a href='#' onclick='remove_detail(" . $p->id . ")' class='text-danger' title='Hapus'><i class='icon-remove'></i></a>";
        })

        
        
        ->editColumn('sampah_masuk', function($p){
            return number_format($p->sampah_masuk, 2, '.', ',');
        })

        ->editColumn('sampah_landfil', function($p){
            return number_format($p->sampah_landfil, 2, '.', ',');
        })

        ->editColumn('pakan_ternak', function($p){
            return number_format($p->pakan_ternak, 2, '.', ',');
        })

        ->editColumn('kompos', function($p){
            return number_format($p->kompos, 2, '.', ',');
        })

        ->editColumn('up_cycle', function($p){
            return number_format($p->up_cycle, 2, '.', ',');
        })

        ->editColumn('daur_ulang', function($p){
            return number_format($p->daur_ulang, 2, '.', ',');
        })

        ->editColumn('sumber_energi', function($p){
            return number_format($p->sumber_energi, 2, '.', ',');
        })

        

        


        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }


    public function kelola($id){

        $tps = Tps3r::findOrfail($id);
        

        return view('masterTps3r.kelola_tps3r', compact('tps'));

    }

    public function kelola_store(Request $request){

        $request->validate([
            'sampah_masuk'=>'required',
            'tahun'=>'required',
            'sampah_landfil'=>'required',
            'pakan_ternak'=>'required',
            'kompos'=>'required',
            'sumber_energi'=>'required',
            'up_cycle'=>'required',
            'daur_ulang'=>'required',
        ]);

        foreach($request->tahun as $key => $kelola){

            $kelola = new Kelola_tps3r();
            $kelola->id_tps3r = $request->id_tps3r;
            $kelola->tahun = $request->tahun[$key];
            $kelola->sampah_masuk = $request->sampah_masuk[$key];
            $kelola->sampah_landfil = $request->sampah_landfil[$key];
            $kelola->pakan_ternak = $request->pakan_ternak[$key];
            $kelola->kompos = $request->kompos[$key];
            $kelola->sumber_energi = $request->sumber_energi[$key];
            $kelola->daur_ulang = $request->daur_ulang[$key];
            $kelola->up_cycle = $request->up_cycle[$key];
            $kelola->save();
        }


        return response()->json([
            'message' => 'Data Berhasil di Tambahkan!'
        ]);


    }

    public function kelola_edit($id){
        $tps = Kelola_tps3r::find($id);

        return view('masterTps3r.kelola_edit', compact('tps'));
            
    }

    public function kelola_update(Request $request){

        $tps = Kelola_tps3r::where('id', $request->id)->first();

        $request->validate([
            'sampah_masuk'=>'required',
            'tahun'=>'required',
            'sampah_landfil'=>'required',
            'pakan_ternak'=>'required',
            'kompos'=>'required',
            'sumber_energi'=>'required',
            'up_cycle'=>'required',
            'daur_ulang'=>'required',
        ]);

        $tps->update([
            'sampah_masuk'=>$request->sampah_masuk,
            'tahun'=>$request->tahun,
            'sampah_landfil'=>$request->sampah_landfil,
            'pakan_ternak'=>$request->pakan_ternak,
            'kompos'=>$request->kompos,
            'sumber_energi'=>$request->sumber_energi,
            'up_cycle'=>$request->up_cycle,
            'daur_ulang'=>$request->daur_ulang,
            'id_tps3r'=>$request->id_tps3r,

        ]);

        return response()->json([
            'message' => 'Data Berhasil di Rubah!',
        ]);

        

            
    }

    public function destroy_detail($id)
    {
        // dd($id);
        $kelola = Kelola_tps3r::find($id);
        $kelola->delete();

        return response()->json([
            'message' => 'Data TPA Berhasil di Hapus.'
        ]);
    }
}
