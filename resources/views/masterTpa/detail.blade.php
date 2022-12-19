@extends('layouts.main')
@section('title', 'Detail TPA')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list amber-text s-18"></i>
                        Detail || {{$tpa->nama_fasilitas}}
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterTpa.tpa.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                                    <strong>Data TPA :</strong>
                                    @if($tpa->terkelola == null)
                                    <strong style="float: right;" class=""><a href="{{route('MasterTpa.tambah_pengolahan.pengolahan', $tpa->id)}}" class="btn btn-primary btn-sm">
                                        <i class="icon icon-plus white-text s-12"></i>Kelola TPA</a>
                                    </strong> 
                                    @endif
                            </h6>
                                
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kode</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->kode}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Nama Fasilitas</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->nama_fasilitas}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Telepon</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->telepon}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Alamat</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->alamat}}, {{$tpa->kelurahan->n_kelurahan}},
                                            {{$tpa->kecamatan->n_kecamatan}},{{$tpa->kabupaten->n_kabupaten}},{{$tpa->provinsi->n_provinsi}}
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Status Tps</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($tpa->id_status == 1)
                                                    TPA Swasta
                                                @else
                                                    TPA Pemda
                                                @endif
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Status Tps</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($tpa->id_status == 1)
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
                                                @if($tpa->keaktifan_tps == 1)
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
                                                <img src="{{config('app.sftp_src').'/'.'gambar_tpa'.'/'.$tpa->foto}}" height="200" alt="">
                                            </label>
                                        </div>
                                        

                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Pengurus</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->pengurus}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Luas (m<sup>2</sup>)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->luas, 2, '.', ',')}}</label>
                                        </div> 
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Operator</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->operator}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Jumlah KK</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->jumlah_kk}}</label>
                                        </div> 
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sumber Dana</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($tpa->sumber_dana == 1)
                                                    APBD
                                                @else
                                                    APBN
                                                @endif
                                            </label>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kordinat</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->kordinat}}</label>
                                        </div>

                                       
                                    </div>
                                </div>
                                
                            </div>

                            @if($tpa->terkelola != null)
                            <h6 class="card-header">
                                    <strong>Data TPA Terkelola :</strong>
                                   
                                    <strong style="float: right;" class=""><a href="{{route('MasterTpa.edit_pengolahan.edit_pengolahan', $tpa->id)}}" class="btn btn-success btn-sm">
                                        <i class="icon icon-pencil white-text s-12"></i>Rubah TPA</a>
                                    </strong> 
                                    
                            </h6>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Tahun</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->terkelola->tahun}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Masuk (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->terkelola->sampah_masuk, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Landfil (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->terkelola->sampah_landfil, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Organik (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->terkelola->sampah_organik, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah An-Organik (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->terkelola->sampah_an_organik, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Energi yang dihasilkan (MW)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->terkelola->energy, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Recovery Pemulung (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->terkelola->recovery_pemulung, 2, '.', ',')}}</label>
                                        </div>
                                        
                                    

                                        

                                    </div>
                                    <div class="col-md-6">
                                       

                                       
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
</div>

@endsection

@section('script')

    

@endsection
