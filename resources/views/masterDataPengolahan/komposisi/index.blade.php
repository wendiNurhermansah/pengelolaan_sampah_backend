@extends('layouts.main')
@section('title', 'Komposisi Makanan')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-tags amber-text s-18"></i>
                        Komposisi Makanan
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
                            <a href="{{route('MasterDataPengolahan.komposisi_sampah.create')}}" class="btn btn-primary btn-sm"> <i class="icon icon-plus white-text s-18"></i>Komposisi Sampah</a>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th width="30">No</th>
                                    <th>Tahun</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Sisa Makanan (%)</th>
                                    <th>Kayu/Ranting (%)</th>
                                    <th>Kertas/Karton (%)</th>
                                    <th>Plastik (%)</th>
                                    <th>Logam (%)</th>
                                    <th>Kain (%)</th>
                                    <th>Karet/Kulit (%)</th>
                                    <th>Kaca (%)</th>
                                    <th>Lainnya (%)</th>
                                    
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
                url: "{{ route('MasterDataPengolahan.komposisi_sampah.api') }}",
                method: 'POST'
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
                {data: 'tahun', name: 'tahun',className: 'text-center'},
                {data: 'id_kabupaten', name: 'id_kabupaten'},
                {data: 'id_kecamatan', name: 'id_kecamatan'},
                {data: 'sisa_makanan', name: 'sisa_makanan', className: 'text-center'},
                {data: 'kayu', name: 'kayu', className: 'text-center'},
                {data: 'kertas', name: 'kertas', className: 'text-center'},
                {data: 'plastik', name: 'plastik', className: 'text-center'},
                {data: 'logam', name: 'logam', className: 'text-center'},
                {data: 'kain', name: 'kain', className: 'text-center'},
                {data: 'karet', name: 'karet', className: 'text-center'},
                {data: 'kaca', name: 'kaca', className: 'text-center'},
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
