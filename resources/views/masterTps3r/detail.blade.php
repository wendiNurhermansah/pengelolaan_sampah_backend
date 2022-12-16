@extends('layouts.main')
@section('title', 'Detail TPS3R')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list amber-text s-18"></i>
                        Detail || {{$tps->nama_fasilitas}}
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterTps3r.tps3r.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
                        </li>
                    
                    </ul>
                </div>
        </div>
    </header>
<div class="container-fluid relative animatedParent animateOnce">
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b">
                    <div class="card-body">
                    <div class="card">
                            

                                <h6 class="card-header">
                                    <strong>Data TPS3R :</strong>
                                    @if($tps->kelola == null)
                                    <strong style="float: right;" class=""><a href="{{route('MasterTps3r.tps3r.kelola_tps3r', $tps->id)}}" class="btn btn-primary btn-sm">
                                        <i class="icon icon-plus white-text s-12"></i>Kelola TPS3R</a>
                                    </strong> 
                                    @endif
                                </h6>
                                
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Nama Fasilitas</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tps->nama_fasilitas}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Nama Fasilitas</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tps->telepon}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Alamat</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tps->alamat}}, {{$tps->kelurahan->n_kelurahan}},
                                            {{$tps->kecamatan->n_kecamatan}},{{$tps->kabupaten->n_kabupaten}},{{$tps->provinsi->n_provinsi}}
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Status Tps</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($tps->id_status == 1)
                                                    Fasum
                                                @else
                                                    Pinjam Pakai
                                                @endif
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Keaktifan Tps</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($tps->keaktifan_tps == 1)
                                                    Aktif 3R
                                                @else
                                                    Aktif Tanpa Pengomposan
                                                @endif
                                            </label>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Gambar</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                <img src="{{config('app.sftp_src').'/'.'gambar_tps3r'.'/'.$tps->foto}}" height="200" alt="">
                                            </label>
                                        </div>
                                        

                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Pengurus</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tps->pengurus}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Luas (m<sup>2</sup>)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tps->luas, 2, '.', ',')}}</label>
                                        </div> 
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Operator</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tps->operator}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Jumlah KK</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tps->jumlah_kk}}</label>
                                        </div> 
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sumber Dana</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($tps->sumber_dana == 1)
                                                    APBD
                                                @else
                                                    APBN
                                                @endif
                                            </label>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kordinat</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tps->kordinat}}</label>
                                        </div>

                                       
                                    </div>
                                </div>
                                
                            </div>

                            @if($tps->terkelola != null)
                            <h6 class="card-header">
                                    <strong>Data TP3R Terkelola :</strong>
                                   
                                    <strong style="float: right;" class=""><a href="{{route('MasterTps3r.tps3r.kelola_edit', $tps->id)}}" class="btn btn-success btn-sm">
                                        <i class="icon icon-pencil white-text s-12"></i>Rubah Kelola TPS3R</a>
                                    </strong> 
                                    
                            </h6>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Tahun</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tps->kelola->tahun}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Masuk (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tps->kelola->sampah_masuk, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Landfil (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tps->kelola->sampah_landfil, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Pakan Ternak (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tps->kelola->pakan_ternak, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Kompos (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tps->kelola->kompos, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Daur Ulang (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tps->kelola->daur_ulang, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Up-cycle (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tps->kelola->cycle, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Sumber Energi (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tps->kelola->sumber_energi, 2, '.', ',')}}</label>

                                        </div>
                                    

                                        

                                    </div>
                                    <div class="col-md-6">
                                       

                                       
                                    </div>
                                </div>
                                
                            </div>

                            @endif

                           
                            </div>
                            
                            
                        </div>
                      
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('script')

    

@endsection
