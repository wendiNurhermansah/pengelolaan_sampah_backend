@extends('layouts.main')
@section('title', 'Tambah TPS3R')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-building amber-text s-18"></i>
                        TPS3R
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterTps3r.tps3r.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                    <div id="load" class="loader" style="display: none">
                            <div class="plane-container">
                                <div class="preloader-wrapper small active">
                                    <div class="spinner-layer spinner-blue">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                    </div>

                                    <div class="spinner-layer spinner-red">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                    </div>

                                    <div class="spinner-layer spinner-yellow">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                    </div>

                                    <div class="spinner-layer spinner-green">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="alert"></div>
                            <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                {{ method_field('POST') }}
                                @csrf
                                <input type="hidden" id="id" name="id"/>
                                <h4 id="formTitle">Tambah TPS3R</h4><hr>
                                
                                <div class="row">
                                      
                                    <div class="col-md-6">
                                        <input type="text" class="form-control light fs-14" name="kode"
                                                id="kode" value="" hidden>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="nama_fasilitas" class="font-weight-bold fs-14">Nama TPS3R<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" name="nama_fasilitas"
                                                id="nama_fasilitas" value="" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="pengurus" class="font-weight-bold fs-14">Pengurus<span
                                                    class="text-danger fs-12">*</span></label>
                                                    <input type="text" class="form-control light fs-14" name="pengurus" id="pengurus"
                                                value="" required>
                                        </div>
                                        
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_provinsi" class="font-weight-bold fs-14">Provinsi<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_provinsi" id="provinsi" autocomplete="off">
                                                 <option value="">Pilih</option>
                                                 @foreach($provinsi as $i)
                                                    <option value="{{$i->id}}">{{$i->n_provinsi}}</option>
                                                 @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_kabupaten" class="font-weight-bold fs-14">Kabupaten<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_kabupaten" id="kabupaten" autocomplete="off">
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_kecamatan" class="font-weight-bold fs-14">Kecamatan<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_kecamatan" id="kecamatan" autocomplete="off">
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_kelurahan" class="font-weight-bold fs-14">Kelurahan<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_kelurahan" id="kelurahan" autocomplete="off">
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="alamat" class="font-weight-bold fs-14">Alamat<span
                                                    class="text-danger fs-12">*</span></label>
                                            <textarea name="alamat" id="alamat" class="form-control light" cols="5" rows="2" required></textarea>
                                        </div>

                                        <div class="form-group mt-2 ml-3">
                                            <label for="telepon" class="font-weight-bold fs-14">Telepon<span
                                                    class="text-danger fs-12">*</span></label>
                                                    <input type="text" class="form-control light fs-14" name="telepon" id="telepon"
                                                value="" onkeypress="return hanyaAngka(event)" maxlength="12" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="kordinat" class="font-weight-bold fs-14">Kordinat<span
                                                    class="text-danger fs-12">*</span></label>
                                            <textarea name="kordinat" id="kordinat" class="form-control light" cols="5" rows="2" required></textarea>
                                            <div class="mt-1">
                                                <span>contoh : -6.2927683577999405, 106.7089962988124</span>
                                            </div>
                                        </div>

                                        
                                        
           
                                                    
                                    </div>
                                    <div class="col-md-6">
                                        
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="foto" class="font-weight-bold fs-14">Foto<span
                                                    class="text-danger fs-12">*</span></label>
                                                    <input type="file" class="form-control light fs-14" name="foto" id="foto"
                                                value="" required>
                                        </div>
                                        
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="luas" class="font-weight-bold fs-14">Luas Lahan (m<sup>2</sup> )<span
                                                    class="text-danger fs-12">*</span></label>
                                                    <input type="text" class="form-control light fs-14" name="luas" id="luas"
                                                value="" onkeypress="return hanyaAngka(event)" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="operator" class="font-weight-bold fs-14">Operator<span
                                                    class="text-danger fs-12">*</span></label>
                                                    <input type="text" class="form-control light fs-14" name="operator" id="operator"
                                                value="" onkeypress="return hanyaAngka(event)" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="jumlah_kk" class="font-weight-bold fs-14">Jumlah KK<span
                                                    class="text-danger fs-12">*</span></label>
                                                    <input type="text" class="form-control light fs-14" name="jumlah_kk" id="jumlah_kk"
                                                value="" onkeypress="return hanyaAngka(event)" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_jenis" class="font-weight-bold fs-14">Jenis Bank Sampah<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_jenis" id="id_jenis" autocomplete="off">
                                                <option value="">Pilih</option>
                                                <option value="1">TPS3R SWASTA</option>
                                                <option value="2">TPS3R PEMDA</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_status" class="font-weight-bold fs-14">Status TPS3R<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_status" id="id_status" autocomplete="off">
                                                <option value="">Pilih</option>
                                                <option value="1">Fasum</option>
                                                <option value="2">Pinjam Pakai</option>
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sumber_dana" class="font-weight-bold fs-14">Sumber Dana<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="sumber_dana" id="sumber_dana" autocomplete="off">
                                                <option value="">Pilih</option>
                                                <option value="1">APBD</option>
                                                <option value="2">APBN</option>
                                                
                                            </select>
                                        </div>

                                        <div class="form-group mt-2 ml-3">
                                            <label for="keaktifan_tps" class="font-weight-bold fs-14">Keaktifan TPS<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="keaktifan_tps" id="keaktifan_tps" autocomplete="off">
                                                <option value="">Pilih</option>
                                                <option value="1">Aktif 3R</option>
                                                <option value="2">Aktif Tanpa Pengomposan</option>
                                                
                                            </select>
                                        </div>
                                        

           
                                                    
                                    </div>
                                </div>
                                <div style="" class="ml-3 mt-3">

                                    <button type="submit" class="btn btn-primary btn-sm" id="action"><i
                                            class="icon-save mr-1"></i>Tambahkan<span id="txtAction"></span></button>
                                    <a class="btn btn-secondary btn-sm white-text" onclick="add()" id="reset">Reset</a>
                                </div>
                                

                            </form>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('script')

    <script type="text/javascript">
        function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
        //tahun 
        $("#datepicker").datepicker({
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years"
        });

        //getprovinsi 
        $('#provinsi').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kabupaten').html(option);
            $('#kecamatan').html(option);
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kabupaten').html("<option value=''>Loading...</option>");
            url = "{{ route('MasterTpa.kabupatenByProvinsi', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kabupaten +"</li>";
                    });
                    $('#kabupaten').empty().html(option);
                    $("#kabupaten").val($("#kabupaten option:first").val()).trigger("change.select2");
                }else{
                    $('#kabupaten').html(option);
                    $('#kecamatan').html(option);
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });


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
    $('#kecamatan').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kelurahan').html("<option value=''>Loading...</option>");
            url = "{{ route('MasterTpa.kelurahanByKecamatan', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kelurahan +"</li>";
                    });
                    $('#kelurahan').empty().html(option);
                    $("#kelurahan").val($("#kelurahan option:first").val()).trigger("change.select2");
                }else{
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    //resset
    function add(){
        save_method = "add";
        $('#form').trigger('reset');
    }


    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            $('#load').show();
            url = "{{ route('MasterTps3r.tps3r.store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    $('#load').hide();
                    add();
                },
                error : function(data){
                    err = '';
                    respon = data.responseJSON;
                    if(respon.errors){
                        $.each(respon.errors, function( index, value ) {
                            err = err + "<li>" + value +"</li>";
                        });
                    }
                    $('#load').hide();
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
            });
            return false;
        }
        $(this).addClass('was-validated');
    });


       

    </script>

@endsection
