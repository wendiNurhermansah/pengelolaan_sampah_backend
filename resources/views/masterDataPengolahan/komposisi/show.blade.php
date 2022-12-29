@extends('layouts.main')
@section('title', 'Detail Komposisi')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list amber-text s-18"></i>
                        Detail Komposisi
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterDataPengolahan.komposisi_sampah.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                                    <strong>Data Komposisi Sampah :</strong>
                                   
                            </h6>
                                
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Tahun</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$komposisi->tahun}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kabupaten / Kota</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$komposisi->kabupaten->n_kabupaten}}</label>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kecamatan</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$komposisi->kecamatan->n_kecamatan}}</label>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Alamat Lengkap</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$komposisi->alamat}}, {{$komposisi->kelurahan->n_kelurahan}}, {{$komposisi->kecamatan->n_kecamatan}}, {{$komposisi->kabupaten->n_kabupaten}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kayu / Ranting (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($komposisi->kayu, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sisa Makanan (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($komposisi->sisa_makanan, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kertas / Karton (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($komposisi->kertas, 2, '.', ',')}}</label>
                                        </div>

                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Plastik (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($komposisi->plastik, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Logam (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($komposisi->logam, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kain (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($komposisi->kain, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Karet / Kulit (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($komposisi->karet, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kaca (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($komposisi->kaca,  2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Lainnya (Ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($komposisi->lainnya, 2, '.', ',')}}s</label>
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
