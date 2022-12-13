@extends('layouts.main')
@section('title', 'TPA')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-retweet amber-text s-18"></i>
                        TPA
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
                            <a href="{{route('MasterTpa.tpa.tambah_tpa')}}" class="btn btn-primary btn-sm"> <i class="icon icon-plus white-text s-18"></i>Tambah TPA</a>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th width="30">No</th>
                                    <th>Tahun</th>
                                    <th>Pengelola</th>
                                    <th>Alamat</th>
                                    <th>Nama Fasilitas</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                    <th>Sampah Masuk (ton/thn)</th>
                                    <th>Sampah Masuk (ton/thn)</th>
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
                url: "{{ route('MasterTpa.tpa.api') }}",
                method: 'POST'
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
                {data: 'tahun', name: 'tahun',className: 'text-center'},
                {data: 'pengelola', name: 'pengelola'},
                {data: 'alamat', name: 'alamat'},
                {data: 'nama_fasilitas', name: 'nama_fasilitas'},
                {data: 'id_jenis_tpa', name: 'id_jenis_tpa', className: 'text-center'},
                {data: 'id_status_tpa', name: 'id_status_tpa', className: 'text-center'},
                {data: 'sampah_masuk', name: 'sampah_masuk',className: 'text-center'},
                {data: 'sampah_landfil', name: 'sampah_landfil', className: 'text-center'},
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
                        $.post("{{ route('MasterTpa.tpa.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
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
