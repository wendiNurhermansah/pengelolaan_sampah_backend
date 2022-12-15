<?php

namespace App\Http\Controllers\masterTps3r;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Tps3r;
use Yajra\DataTables\Facades\DataTables;

use function Ramsey\Uuid\v1;

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
                if ($p->id_status == 1) {
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
            'sumber_dana' => 'required',
            'keaktifan_tps' => 'required',
            'luas' => 'required',
        ]);

        if($request->foto != null){
            $image = $request->file('foto');
            $nameFoto = rand() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar_tps3r', $nameFoto, 'sftp', 'public');
        }

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
        $tps->sumber_dana = $request->sumber_dana;
        $tps->keaktifan_tps = $request->keaktifan_tps;
        $tps->luas = $request->luas;

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
        $tps = Tps3r::findOrFail($id)->get();

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
        $tps = Tps3r::findOrFail($id)->get();
        return view('masterTps3r.edit', compact('tps'));
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

        Tps3r::destroy($id);

        return response()->json([
            'message' => 'Data berhasil di hapus!'
        ]);
    }
}
