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

                        
                            
                            
                        </div>
                      
                    </div>
                    
                </div>

                <div class="card no-b">
                    <div class="card-body">
                        <div class="card">
                            
                           
                            <h6 class="card-header">
                                    <strong>Data Bank Sampah Terkelola :</strong>
                                   
                                    <strong style="float: right;" class=""><a href="{{route('MasterBankSampah.bank_sampah.kelola_bank_sampah', $bank_sampah->id)}}" class="btn btn-primary btn-sm">
                                        <i class="icon icon-plus white-text s-12"></i>Kelola Bank Sampah</a>
                                    </strong>
                                    
                            </h6>
                            <input type="hidden" value="{{$bank_sampah->id}}" id="data_detail_id">

                            <div class="card-body">
                                <div class="table-responsive mt-3">
                                    <table id="dataTable2" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th width="30">No</th>
                                            <th>Tahun</th>
                                            <th>Sampah Masuk (ton)</th>
                                            <th>Sampah Landfil (ton)</th>
                                            <th>Bahan baku Pakan Ternak (ton)</th>
                                            <th>Bahan baku Kompos (ton)</th>
                                            <th>Bahan baku Daur Ulang (ton)</th>
                                            <th>Bahan baku Up-cycle (ton)</th>
                                            <th>Bahan baku Sumber Energi (ton)</th>
                                            <th width="60">Aksi</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
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

<script type="text/javascript">
    var table = $('#dataTable2').dataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                url: "{{ route('MasterBankSampah.bank_sampah.api_detail') }}",
                method: 'POST',
                data: function(data){
                    data.data_detail_id = $('#data_detail_id').val();
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
                {data: 'tahun', name: 'tahun',className: 'text-center'},
                {data: 'sampah_masuk', name: 'sampah_masuk',className: 'text-center'},
                {data: 'sampah_landfil', name: 'sampah_landfil', className: 'text-center'},
                {data: 'pakan_ternak', name: 'pakan_ternak', className: 'text-center'},
                {data: 'kompos', name: 'kompos', className: 'text-center'},
                {data: 'daur_ulang', name: 'daur_ulang', className: 'text-center', className: 'text-center'},
                {data: 'up_cycle', name: 'up_cycle', className: 'text-center'},
                {data: 'sumber_energi', name: 'sumber_energi', className: 'text-center'},
                {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
            ]
        });

        function remove_detail(id){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus data ini ?',
            icon: 'icon icon-question amber-text',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.post("{{ route('MasterBankSampah.bank_sampah.destroy_detail', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                            table.api().ajax.reload();
                            if(id == $('#id').val()) add();
                        }, "JSON").fail(function(){
                            location.reload();
                        });
                    }
                },
                cancel: function(){}
            }
        });
    }


</script>

    

@endsection
