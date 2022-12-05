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
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th width="30">No</th>
                                    <th>Tahun</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten/Kota</th>
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
            order: [ 0, 'asc' ],
            ajax: {
                url: "{{ route('MasterTpa.tpa.api') }}",
                method: 'POST'
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
                {data: 'tahun', name: 'tahun'},
                {data: 'id_provinsi', name: 'id_provinsi'},
                {data: 'id_kabupaten', name: 'id_kabupaten'},
                {data: 'nama_fasilitas', name: 'nama_fasilitas'},
                {data: 'id_jenis_tpa', name: 'id_jenis_tpa'},
                {data: 'id_status_tpa', name: 'id_status_tpa'},
                {data: 'sampah_masuk', name: 'sampah_masuk'},
                {data: 'sampah_landfil', name: 'sampah_landfil'},
                {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
            ]
        });

    </script>

@endsection
