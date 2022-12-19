@extends('layouts.main')
@section('title', 'Detail Timbulan sampah')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list amber-text s-18"></i>
                        Detail Timbulan Sampah
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterDataPengolahan.timbulan_sampah.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                                    <strong>Data Timbulan Sampah :</strong>
                                   
                            </h6>
                                
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Tahun</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$timbulan->pengurus}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kabupaten / Kota</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$timbulan->kabupaten->n_kabupaten}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kecamatan</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$timbulan->kecamatan->n_kecamatan}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Alamat Lengkap</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$timbulan->alamat}}, {{$timbulan->kelurahan->n_kelurahan}},
                                            {{$timbulan->kecamatan->n_kecamatan}},{{$timbulan->kabupaten->n_kabupaten}},{{$timbulan->provinsi->n_provinsi}}
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Timbulan Harian (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($timbulan->timbul_harian, 2, '.', ',')}}</label>
                                        </div> 
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Timbulan Tahunan (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($timbulan->timbul_tahunan, 2, '.', ',')}}</label>
                                        </div> 
                                        

                                        

                                    </div>
                                    <div class="col-md-6">
                                        

                                       
                                    </div>
                                </div>
                                
                            </div>

                            
                                
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
