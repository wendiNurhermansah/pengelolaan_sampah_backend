<?php

namespace App\Http\Controllers\masterTps3r;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                    <a href='". route('MasterTpa.tpa.show', $p->id) ."'  title='Detail'><i class='icon-eye mr-1'></i></a>
                    <a href='". route('MasterTpa.tpa.edit', $p->id) ."'  title='Edit'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus'><i class='icon-remove'></i></a>";
            })

            ->editColumn('id_jenis', function($p){
                return $p->status->nama;
            })

            
            ->editColumn('id_status', function($p){
                return $p->status->nama;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
