<?php

namespace App\Http\Controllers;

use App\Models\Kelola_bank_sampah;
use App\Models\Kelola_tps3r;
use App\Models\Komposisi;
use App\Models\Sampah_terkelola;
use App\Models\Sumber_sampah;
use App\Models\Timbulan_sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $tahun = date('Y'); 
        // dd($tahun);

        //timbulan sampah 
        $timbulan = Timbulan_sampah::where('tahun', $tahun)->sum('timbul_tahunan');

        //sampah masuk TPA
        $tpa = Sampah_terkelola::where('tahun', $tahun)->sum('sampah_masuk');

        // sampah masuk Bank Sampah

        $bank_sampah = Kelola_bank_sampah::where('tahun', $tahun)->sum('sampah_masuk');

        // sampah masuk tps3r
        $tps3r = Kelola_tps3r::where('tahun', $tahun)->sum('sampah_masuk');
        
        //komposisi sampah

        $sisa_makanan = Komposisi::where('tahun', $tahun)->sum('sisa_makanan');
        // dd($sisa_makanan);
        $kayu = Komposisi::where('tahun', $tahun)->sum('kayu');
        $kertas = Komposisi::where('tahun', $tahun)->sum('kertas');
        $plastik = Komposisi::where('tahun', $tahun)->sum('plastik');
        $logam = Komposisi::where('tahun', $tahun)->sum('logam');
        $kain = Komposisi::where('tahun', $tahun)->sum('kain');
        $karet = Komposisi::where('tahun', $tahun)->sum('karet');
        $kaca = Komposisi::where('tahun', $tahun)->sum('kaca');
        $lainnya = Komposisi::where('tahun', $tahun)->sum('lainnya');

        //sumber sampah
       
        $rumah_tangga = Sumber_sampah::where('tahun', $tahun)->sum('rumah_tangga');
        $perkantoran = Sumber_sampah::where('tahun', $tahun)->sum('perkantoran');
        $pasar = Sumber_sampah::where('tahun', $tahun)->sum('pasar');
        $perniagaan = Sumber_sampah::where('tahun', $tahun)->sum('perniagaan');
        $publik = Sumber_sampah::where('tahun', $tahun)->sum('publik');
        $kawasan = Sumber_sampah::where('tahun', $tahun)->sum('kawasan');
        $lainnya2 = Sumber_sampah::where('tahun', $tahun)->sum('lainnya');

        return view('Home.dashboard', compact(
            'sisa_makanan','rumah_tangga',
            'kayu','perkantoran',
            'kertas','pasar',
            'plastik','perniagaan',
            'logam','publik',
            'kain','kawasan',
            'karet','lainnya2',
            'kaca', 'timbulan',
            'lainnya','tpa',
            'tahun', 'bank_sampah', 'tps3r'
        ));
    }
}
