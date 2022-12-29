<?php

namespace App\Http\Controllers\masterBankSampah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank_sampah;
use App\Models\Jenis_bank_sampah;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelola_bank_sampah;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Status_bank_sampah;
use Yajra\DataTables\Facades\DataTables;

class BankSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bank_sampah.bank_sampah');
    }


    public function api(){
        $bank_sampah = Bank_sampah::all();
        return DataTables::of($bank_sampah)
        

        ->addColumn('action', function ($p) {
            return "
                <a href='". route('MasterBankSampah.bank_sampah.show', $p->id) ."'  title='Detail'><i class='icon-eye mr-1'></i></a>
                <a href='". route('MasterBankSampah.bank_sampah.edit', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
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
               return "Bank Sampah Swasta";
            } else {
                return "Bank Sampah Pemda";
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::where('kode', 36)->get();
        return view ('bank_sampah.create', compact('provinsi'));
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
            $image->storeAs('gambar_bank_sampah', $nameFoto, 'sftp', 'public');
        }

        //kode
        //kode urut
        $data = Bank_sampah::all()->max('kode');
        // $kode_terbesar = $data_tpa->kode;
        $urutan = substr($data, -3, 3);
        $urutan++;
        $no_urut =  sprintf("%04s", $urutan);

        // dd('urutan='.$no_urut);
        $id_jenis = sprintf("%02s", $request->id_jenis);
        // dd($id_jenis)

         $kode = "$id_jenis$request->id_kecamatan$no_urut";
        //  dd($kode);

        $bank_smpah = new Bank_sampah();
        $bank_smpah->nama_fasilitas = $request->nama_fasilitas;
        $bank_smpah->foto = $nameFoto;
        $bank_smpah->alamat = $request->alamat;
        $bank_smpah->id_kelurahan = $request->id_kelurahan;
        $bank_smpah->id_kecamatan = $request->id_kecamatan;
        $bank_smpah->id_kabupaten = $request->id_kabupaten;
        $bank_smpah->id_provinsi = $request->id_provinsi;
        $bank_smpah->telepon = $request->telepon;
        $bank_smpah->kordinat = $request->kordinat;
        $bank_smpah->pengurus = $request->pengurus;
        $bank_smpah->operator = $request->operator;
        $bank_smpah->jumlah_kk = $request->jumlah_kk;
        $bank_smpah->id_status = $request->id_status;
        $bank_smpah->id_jenis = $request->id_jenis;
        $bank_smpah->sumber_dana = $request->sumber_dana;
        $bank_smpah->keaktifan = $request->keaktifan;
        $bank_smpah->luas = $request->luas;
        $bank_smpah->kode = $kode;
        $bank_smpah->save();

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
        $bank_sampah = Bank_sampah::findOrFail($id);

        return view('bank_sampah.detail', compact('bank_sampah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank_sampah = Bank_sampah::findOrFail($id);
        $provinsi = Provinsi::where('kode', 36)->get();
        $kabupaten = Kabupaten::where('provinsi_id', 3)->get();
        $kecamatan = Kecamatan::where('kabupaten_id', $bank_sampah->id_kabupaten)->get();
        $kelurahan = Kelurahan::where('kecamatan_id', $bank_sampah->id_kecamatan)->get();
        return view('bank_sampah.edit', compact('bank_sampah','provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
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

        $bank_sampah = Bank_sampah::findOrFail($id);

        if($request->foto != null){
            $image = $request->file('foto');
            $nameFoto = rand() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar_tps3r', $nameFoto, 'sftp', 'public');

            $bank_sampah->update([

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

        

        $bank_sampah->update([

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
        Bank_sampah::destroy($id);
        Kelola_bank_sampah::where('id_bank_sampah', $id)->delete();
        

        return response()->json([
            'message' => 'Data Berhasil di Hapus!'
        ]);
    }

    public function api_detail(Request $request){

        $id_bank_sampah = $request->data_detail_id;

        $bank_detail = Kelola_bank_sampah::where('id_bank_sampah', $id_bank_sampah)
        ->orderBy('tahun', 'DESC')
        ->get();
        // dd($tpa_detail);
        return DataTables::of($bank_detail)
        

        ->addColumn('action', function ($p) {
            return "
               
                <a href='". route('MasterBankSampah.bank_sampah.kelola_edit_bank_sampah', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
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

        $bank_sampah = Bank_sampah::findOrfail($id);
        

        return view('bank_sampah.kelola', compact('bank_sampah'));

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

       

        $kelola = new Kelola_bank_sampah();
        $kelola->id_bank_sampah = $request->id_bank_sampah;
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

        $bank_sampah = Kelola_bank_sampah::find($id);

        return view('bank_sampah.kelola_edit', compact('bank_sampah'));
            
    }

    public function kelola_update(Request $request){

        $bank_sampah = Kelola_bank_sampah::whereId($request->id)->first();
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

        $bank_sampah->update([
            'sampah_masuk'=>$request->sampah_masuk,
            'tahun'=>$request->tahun,
            'sampah_landfil'=>$request->sampah_landfil,
            'pakan_ternak'=>$request->pakan_ternak,
            'kompos'=>$request->kompos,
            'sumber_energi'=>$request->sumber_energi,
            'up_cycle'=>$request->up_cycle,
            'daur_ulang'=>$request->daur_ulang,
            'id_bank_sampah'=>$request->id_bank_sampah,

        ]);

        return response()->json([
            'message' => 'Data Berhasil di Rubah!',
        ]);

        

            
    }

    public function destroy_detail($id)
    {
        // dd($id);
        $kelola = Kelola_bank_sampah::find($id);
        $kelola->delete();

        return response()->json([
            'message' => 'Data TPA Berhasil di Hapus.'
        ]);
    }
}
