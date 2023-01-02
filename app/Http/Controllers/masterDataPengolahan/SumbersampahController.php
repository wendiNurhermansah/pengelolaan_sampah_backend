<?php

namespace App\Http\Controllers\masterDataPengolahan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Sumber_sampah;
use App\Models\Timbulan_sampah;
use Yajra\DataTables\Facades\DataTables;

class SumbersampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabupaten = Kabupaten::where('provinsi_id', 3)->get();
        return view('masterDataPengolahan.sumber_sampah.index', compact('kabupaten'));
    }

    public function api(Request $request){

        
        $tahun = $request->tahun;
        $kabupaten = $request->kabupaten;
        $kecamatan = $request->kecamatan;

        if($tahun != null){
          $sumber = Sumber_sampah::where('tahun', 'like', "%". $tahun ."%")->get();
        }elseif($kabupaten != null){
          $sumber = Sumber_sampah::where('id_kabupaten',$kabupaten)->get();
        }elseif($kecamatan != null){
            $sumber = Sumber_sampah::where('id_kecamatan',$kecamatan)->get();
        }else{
            $sumber = Sumber_sampah::orderBy('id', 'DESC')->get();
        }
       
       
        return DataTables::of($sumber)
        

            ->addColumn('action', function ($p) {
                return "
                    <a href='". route('MasterDataPengolahan.sumber_sampah.show', $p->id) ."'  title='Detail'><i class='icon-eye'></i></a>
                    <a href='". route('MasterDataPengolahan.sumber_sampah.edit', $p->id) ."'  title='Edit'><i class='icon-pencil ml-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })

            ->editColumn('rumah_tangga', function($p){
                return number_format($p->rumah_tangga, 2, '.', ',');
            })

            ->editColumn('perkantoran', function($p){
                return number_format($p->perkantoran, 2, '.', ',');
            })

            ->editColumn('pasar', function($p){
                return number_format($p->pasar, 2, '.', ',');
            })

            ->editColumn('perniagaan', function($p){
                return number_format($p->perniagaan, 2, '.', ',');
            })
            ->editColumn('publik', function($p){
                return number_format($p->publik, 2, '.', ',');
            })

            ->editColumn('kawasan', function($p){
                return number_format($p->kawasan, 2, '.', ',');
            })

            ->editColumn('lainnya', function($p){
                return number_format($p->lainnya, 2, '.', ',');
            })

            ->editColumn('id_kabupaten', function($p){
                return $p->kabupaten->n_kabupaten;
            })

            ->editColumn('id_kecamatan', function($p){
                return $p->kecamatan->n_kecamatan;
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
        return view('masterDataPengolahan.sumber_sampah.create', compact('provinsi'));
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
        ]);

        $sumber = New Sumber_sampah();
        $sumber->tahun = $request->tahun;
        $sumber->id_provinsi = $request->id_provinsi;
        $sumber->id_kecamatan = $request->id_kecamatan;
        $sumber->id_kelurahan = $request->id_kelurahan;
        $sumber->id_kabupaten = $request->id_kabupaten;
        $sumber->alamat = $request->alamat;
        $sumber->rumah_tangga = $request->rumah_tangga;
        $sumber->perkantoran = $request->perkantoran;
        $sumber->pasar = $request->pasar;
        $sumber->perniagaan = $request->perniagaan;
        $sumber->publik = $request->publik;
        $sumber->kawasan = $request->kawasan;
        $sumber->lainnya = $request->lainnya;
        $sumber->save();


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
        $sumber = Sumber_sampah::Find($id);

        return view('masterDataPengolahan.sumber_sampah.show', compact('sumber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sumber = Sumber_sampah::find($id);
        $provinsi = Provinsi::where('kode', 36)->get();
        $kabupaten = Kabupaten::where('provinsi_id', 3)->get();
        $kecamatan = Kecamatan::where('kabupaten_id', $sumber->id_kabupaten)->get();
        $kelurahan = Kelurahan::where('kecamatan_id', $sumber->id_kecamatan)->get();

        return view('masterDataPengolahan.sumber_sampah.edit', compact('sumber','provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
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
            
        ]);

        $timbul = Sumber_sampah::find($id);
        $timbul->update([
            'tahun' => $request->tahun,
            'alamat' => $request->alamat,
            'id_provinsi' => $request->id_provinsi,
            'id_kabupaten' => $request->id_kabupaten,
            'id_kecamatan' => $request->id_kecamatan,
            'id_kelurahan' => $request->id_kelurahan,
            'rumah_tangga' => $request->rumah_tangga,
            'pasar' => $request->pasar,
            'perniagaan' => $request->perniagaan,
            'publik' => $request->publik,
            'kawasan' => $request->kawasan,
            'lainnya' => $request->lainnya,

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
        Sumber_sampah::destroy($id);

        return response()->json([
            'message' => 'Data Berhasil di Hapus!'
        ]);
    }
}
