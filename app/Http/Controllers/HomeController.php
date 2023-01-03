<?php

namespace App\Http\Controllers;

use App\Models\Komposisi;
use App\Models\Sumber_sampah;
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
            'kaca',
            'lainnya',
            'tahun'
        ));
    }
}
