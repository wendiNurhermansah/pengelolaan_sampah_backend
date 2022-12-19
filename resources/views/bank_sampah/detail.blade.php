@extends('layouts.main')
@section('title', 'Detail Bank Sampah')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list amber-text s-18"></i>
                        Detail || {{$bank_sampah->nama_fasilitas}}
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterBankSampah.bank_sampah.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                                    <strong>Data Bank Sampah :</strong>
                                    @if($bank_sampah->kelola == null)
                                    <strong style="float: right;" class=""><a href="{{route('MasterBankSampah.bank_sampah.kelola_bank_sampah', $bank_sampah->id)}}" class="btn btn-primary btn-sm">
                                        <i class="icon icon-plus white-text s-12"></i>Kelola Bank Sampah</a>
                                    </strong> 
                                    @endif
                            </h6>
                                
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kode</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$bank_sampah->kode}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Nama Fasilitas</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$bank_sampah->nama_fasilitas}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Telepon</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$bank_sampah->telepon}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Alamat</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$bank_sampah->alamat}}, {{$bank_sampah->kelurahan->n_kelurahan}},
                                            {{$bank_sampah->kecamatan->n_kecamatan}},{{$bank_sampah->kabupaten->n_kabupaten}},{{$bank_sampah->provinsi->n_provinsi}}
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Status Tps</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($bank_sampah->id_status == 1)
                                                    Bank Sampah Swasta
                                                @else
                                                    Bank Sampah Pemda
                                                @endif
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Status Tps</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($bank_sampah->id_status == 1)
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
                                                @if($bank_sampah->keaktifan_tps == 1)
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
                                                <img src="{{config('app.sftp_src').'/'.'gambar_bank_sampah'.'/'.$bank_sampah->foto}}" height="200" alt="">
                                            </label>
                                        </div>
                                        

                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Pengurus</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$bank_sampah->pengurus}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Luas (m<sup>2</sup>)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($bank_sampah->luas, 2, '.', ',')}}</label>
                                        </div> 
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Operator</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$bank_sampah->operator}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Jumlah KK</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$bank_sampah->jumlah_kk}}</label>
                                        </div> 
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sumber Dana</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">
                                                @if($bank_sampah->sumber_dana == 1)
                                                    APBD
                                                @else
                                                    APBN
                                                @endif
                                            </label>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Kordinat</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$bank_sampah->kordinat}}</label>
                                        </div>

                                       
                                    </div>
                                </div>
                                
                            </div>

                            @if($bank_sampah->kelola != null)
                            <h6 class="card-header">
                                    <strong>Data Bank Sampah Terkelola :</strong>
                                   
                                    <strong style="float: right;" class=""><a href="{{route('MasterBankSampah.bank_sampah.kelola_edit_bank_sampah', $bank_sampah->id)}}" class="btn btn-success btn-sm">
                                        <i class="icon icon-pencil white-text s-12"></i>Rubah Bank Sampah</a>
                                    </strong> 
                                    
                            </h6>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Tahun</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{$bank_sampah->kelola->tahun}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Masuk (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($bank_sampah->kelola->sampah_masuk, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Sampah Landfil (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($bank_sampah->kelola->sampah_landfil, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Pakan Ternak (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($bank_sampah->kelola->pakan_ternak, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Kompos (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($bank_sampah->kelola->kompos, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Daur Ulang (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($bank_sampah->kelola->daur_ulang, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Up-cycle (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($bank_sampah->kelola->up_cycle, 2, '.', ',')}}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-left s-12"><strong>Bahan baku Sumber Energi (ton)</strong></label>
                                             <label class="">:</label>
                                            <label class="col-md-6 s-12">{{number_format($bank_sampah->kelola->sumber_energi, 2, '.', ',')}}</label>

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
