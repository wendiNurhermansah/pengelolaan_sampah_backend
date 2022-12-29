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

use function Ramsey\Uuid\v1;

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
                    <a href='". route('MasterDataPengolahan.komposisi_sampah.show', $p->id) ."'  title='Detail'><i class='icon-eye'></i></a>
                    <a href='". route('MasterDataPengolahan.komposisi_sampah.edit', $p->id) ."'  title='Edit'><i class='icon-pencil ml-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })

            ->editColumn('sisa_makanan', function($p){
                return number_format($p->sisa_makanan, 2, '.', ',');
            })

            ->editColumn('kayu', function($p){
                return number_format($p->kayu, 2, '.', ',');
            })

            ->editColumn('kertas', function($p){
                return number_format($p->kertas, 2, '.', ',');
            })

            ->editColumn('plastik', function($p){
                return number_format($p->plastik, 2, '.', ',');
            })
            ->editColumn('logam', function($p){
                return number_format($p->logam, 2, '.', ',');
            })

            ->editColumn('kain', function($p){
                return number_format($p->kain, 2, '.', ',');
            })

            ->editColumn('karet', function($p){
                return number_format($p->karet, 2, '.', ',');
            })

            ->editColumn('kulit', function($p){
                return number_format($p->kulit, 2, '.', ',');
            })

            ->editColumn('kaca', function($p){
                return number_format($p->kaca, 2, '.', ',');
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
        $request->validate([
            'tahun' => 'required',
            'alamat' => 'required',
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
        ]);

        $komposisi = New Komposisi();
        $komposisi->tahun = $request->tahun;
        $komposisi->id_provinsi = $request->id_provinsi;
        $komposisi->id_kecamatan = $request->id_kecamatan;
        $komposisi->id_kelurahan = $request->id_kelurahan;
        $komposisi->id_kabupaten = $request->id_kabupaten;
        $komposisi->alamat = $request->alamat;
        $komposisi->sisa_makanan = $request->sisa_makanan;
        $komposisi->kayu = $request->kayu;
        $komposisi->kertas = $request->kertas;
        $komposisi->plastik = $request->plastik;
        $komposisi->logam = $request->logam;
        $komposisi->kain = $request->kain;
        $komposisi->karet = $request->karet;
        $komposisi->kaca = $request->kaca;
        $komposisi->lainnya = $request->lainnya;
        $komposisi->save();

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
        $komposisi = Komposisi::Find($id);

        return view('masterDataPengolahan.komposisi.show', compact('komposisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $komposisi = Komposisi::find($id);
        $provinsi = Provinsi::where('kode', 36)->get();
        $kabupaten = Kabupaten::where('provinsi_id', 3)->get();
        $kecamatan = Kecamatan::where('kabupaten_id', $komposisi->id_kabupaten)->get();
        $kelurahan = Kelurahan::where('kecamatan_id', $komposisi->id_kecamatan)->get();

        return view('masterDataPengolahan.komposisi.edit', compact('komposisi','provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
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

        $komposisi = Komposisi::Find($id);
        
        $komposisi->update([
        'tahun' => $request->tahun,
        'id_provinsi' => $request->id_provinsi,
        'id_kecamatan' => $request->id_kecamatan,
        'id_kelurahan' => $request->id_kelurahan,
        'id_kabupaten' => $request->id_kabupaten,
        'alamat' => $request->alamat,
        'sisa_makanan' => $request->sisa_makanan,
        'kayu' => $request->kayu,
        'kertas' => $request->kertas,
        'plastik' => $request->plastik,
        'logam' => $request->logam,
        'kain' => $request->kain,
        'karet' => $request->karet,
        'kaca' => $request->kaca,
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
        Komposisi::destroy($id);

        return response()->json([
            'message' => 'Data Berhasil di Hapus!'
        ]);
    }
}
