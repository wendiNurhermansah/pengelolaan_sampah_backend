<?php

namespace App\Http\Controllers\masterTpa;


use App\Http\Controllers\Controller;
use App\Models\Status_tpa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatustpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterTpa.status_tpa');
    }

    public function api(){
        $status_tpa = Status_tpa::all();
        return DataTables::of($status_tpa)
        

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
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
            'nama' => 'required|unique:status_tpa,nama',
            
        ]);
        $input = $request->all();
        Status_tpa::create($input);
        return response()->json([
            'message' => 'Data berhasil tersimpan.'
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
        return Status_tpa::find($id);
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
            'nama' => 'required|unique:status_tpa,nama,' . $id,
            
        ]);

        $input = $request->all();
        $Status_tpa = Status_tpa::findOrfail($id);
        $Status_tpa->update($input);
        return response()->json([
            'message' => 'Data berhasil di perbaharui.'
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
        Status_tpa::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }
}
