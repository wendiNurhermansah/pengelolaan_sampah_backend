@extends('layouts.main')
@section('title', 'Detail Sumber Sampah')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list amber-text s-18"></i>
                        Detail Sumber Sampah
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterDataPengolahan.sumber_sampah.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                                    <strong>Data Sumber Sampah :</strong>
                                   
                            </h6>
                                
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Tahun</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$sumber->tahun}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kabupaten / Kota</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$sumber->kabupaten->n_kabupaten}}</label>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kecamatan</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$sumber->kecamatan->n_kecamatan}}</label>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Alamat Lengkap</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$sumber->alamat}}, {{$sumber->kelurahan->n_kelurahan}}, {{$sumber->kecamatan->n_kecamatan}}, {{$sumber->kabupaten->n_kabupaten}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Rumah Tangga (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($sumber->rumah_tangga, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Perkantoran (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($sumber->perkantoran, 2, '.', ',')}}</label>
                                        </div>
                                        

                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Pasar Tradisional (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($sumber->pasar, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Pusat Perniagaan (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($sumber->perniagaan, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kawasan Publik (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($sumber->publik, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kawasan (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($sumber->kawasan, 2, '.', ',')}}</label>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Lainnya (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($sumber->lainnya, 2, '.', ',')}}s</label>
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
</div>

@endsection

@section('script')

    

@endsection
