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
                <div class="card no-b m-2">
                    <div class="card-body">
                        <div class="form-row form-inline">
                            <div class="col-md-8">
                                <div class="form-group mt-2">
                                    <label for="tahun" class="font-weight-bold fs-14 col-md-4">Tahun</label>
                                    <input type="text" name="tahun" id="datepicker" placeholder="masukan Tahun" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                </div>
                                <div class="form-group mt-2">
                                                <label class="font-weight-bold fs-14 col-md-4">Kabupaten / Kota</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="kabupaten" id="kabupaten" autocomplete="off">
                                                        <option value="">Semua</option>
                                                        @foreach($kabupaten as $i)
                                                        <option value="{{$i->id}}">{{$i->n_kabupaten}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                </div>
                                <div class="form-group mt-2">
                                                <label class="font-weight-bold fs-14 col-md-4">Kecamatan</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="kecamatan" id="kecamatan" autocomplete="off">
                                                        <option value="">Semua</option>
                                                        
                                                    </select>
                                                </div>
                                </div>
                                <div class="mt-2" style="margin-left: 33%">
                                    <button type="submit" onclick="fillter()" class="btn btn-primary btn-sm" id="action"><i class="icon-search mr-2"></i>Cari<span id="txtAction"></span></button>
                                </div>
                            </div>

                        
                        </div>

                    </div>
                </div>
                <div class="card no-b m-2">
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

         //search 

         function fillter(){
            table.api().ajax.reload();
        }

        //tahun 
        $("#datepicker").datepicker({
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years"
        });

        var table = $('#dataTable').dataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                url: "{{ route('MasterDataPengolahan.sumber_sampah.api') }}",
                method: 'POST',
                data: function(data){
                    data.tahun = $('#tahun').val();
                    data.kabupaten = $('#kabupaten').val();
                    data.kecamatan = $('#kecamatan').val();
                }
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


    $('#kabupaten').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kecamatan').html(option);
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kecamatan').html("<option value=''>Loading...</option>");
            url = "{{ route('MasterTpa.kecamatanByKabupaten', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kecamatan +"</li>";
                    });
                    $('#kecamatan').empty().html(option);
                    $("#kecamatan").val($("#kecamatan option:first").val()).trigger("change.select2");
                }else{
                    $('#kecamatan').html(option);
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    </script>

@endsection
