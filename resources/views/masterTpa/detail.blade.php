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
                            <a class="nav-link" href="{{route('MasterTpa.tpa.index')}}"><i class="icon icon-arrow_back"></i>Semua Data TPA</a>
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
                                        <i class="icon icon-plus white-text s-12"></i>Sampah Terkelola</a>
                                    </strong> 

                                    @endif
                                    
                                    
                                   
                                </h6>
                                
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Nama Fasilitas</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->nama_fasilitas}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Jenis</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($tpa->id_jenis_tpa == 1)
                                                    TPA SWASTA
                                                @else
                                                    TPA PEMDA
                                                @endif
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Status</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->status->nama}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Alamat</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->alamat}}, {{$tpa->kelurahan->n_kelurahan}},
                                            {{$tpa->kecamatan->n_kecamatan}},{{$tpa->kabupaten->n_kabupaten}},{{$tpa->provinsi->n_provinsi}}
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Awal operasi</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->awal_beroprasi}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Luas (m<sup>2</sup>)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->luas, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Luas Landfill Aktif (m<sup>2</sup>)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->luas_landfil_aktif, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Penutupan Sampah Zona Aktif</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->penutupan_sampah_aktif}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Uji Lindi (dalam 1 tahun)</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->uji_lindi}}</label>
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
                                            <label class="col-md-4 text-left s-12"><strong>Pengelola</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->pengelola}}</label>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Masuk (ton/thn)</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->sampah_masuk, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Masuk Landfil (ton/thn)</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->sampah_landfil, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Jumlah Sumur Pantau</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->jumlah_sumur_pantau}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>IPL</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->ipl}}</label>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Drainase</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($tpa->drainase == 1)
                                                    ADA
                                                @elseif($tpa->drainase == 2)
                                                    TIDAK ADA
                                                @endif

                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Pemanfaatan gas Metana</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->gas_metana}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Jumlah KK yang memanfaatkan gas Metana</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->jumlah_kk}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Pencatatan</strong></label>
                                            <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$tpa->pencatatan}}</label>
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
                                <strong>Data Sampah Terkelola :</strong>
                                <strong style="float: right;" class=""><a href="{{route('MasterTpa.edit_pengolahan.edit_pengolahan', $tpa->id)}}" class="btn btn-success btn-sm">
                                    <i class="icon icon-pencil white-text s-12"></i>Edit Data</a>
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
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Organik terolah (Ton/thn)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->terkelola->sampah_organik, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah An-Organik terolah (Ton/thn)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->terkelola->sampah_an_organik, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Energi yang dihasilkan (MW)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($tpa->terkelola->energy, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Recovery Pemulung</strong></label>
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

@endsection

@section('script')

    

@endsection
