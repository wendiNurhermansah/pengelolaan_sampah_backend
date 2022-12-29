@extends('layouts.main')
@section('title', 'Sumber Sampah')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-pause amber-text s-18"></i>
                        Sumber Makanan
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid relative animatedParent animateOnce">
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b">
                    <div class="card-body">
                        <div class="mt-2 mb-3" style="float: right;">
                            <a href="{{route('MasterDataPengolahan.sumber_sampah.create')}}" class="btn btn-primary btn-sm"> <i class="icon icon-plus white-text s-18"></i>Sumber Sampah</a>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th width="30">No</th>
                                    <th>Tahun</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Rumah Tangga (ton)</th>
                                    <th>Perkantoran (ton)</th>
                                    <th>Pasar Tradisional (ton)</th>
                                    <th>Pusat Perniagaan (ton)</th>
                                    <th>Fasilitas Publik (ton)</th>
                                    <th>Kawasan (ton)</th>
                                    <th>Lainnya (ton)</th>
                                    
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

@endsection

@section('script')

    <script type="text/javascript">
        var table = $('#dataTable').dataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                url: "{{ route('MasterDataPengolahan.sumber_sampah.api') }}",
                method: 'POST'
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
                {data: 'tahun', name: 'tahun',className: 'text-center'},
                {data: 'id_kabupaten', name: 'id_kabupaten'},
                {data: 'id_kecamatan', name: 'id_kecamatan'},
                {data: 'rumah_tangga', name: 'rumah_tangga', className: 'text-center'},
                {data: 'perkantoran', name: 'perkantoran', className: 'text-center'},
                {data: 'pasar', name: 'pasar', className: 'text-center'},
                {data: 'perniagaan', name: 'perniagaan', className: 'text-center'},
                {data: 'publik', name: 'publik', className: 'text-center'},
                {data: 'kawasan', name: 'kawasan', className: 'text-center'},
                {data: 'lainnya', name: 'lainnya', className: 'text-center'},
               
                
                {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
            ]
        });

        function remove(id){
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
                        $.post("{{ route('MasterDataPengolahan.komposisi_sampah.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
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
