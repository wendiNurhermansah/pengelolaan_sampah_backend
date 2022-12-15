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
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterTpa.tpa.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                        <div id="alert"></div>
                            <form class="needs-validation" id="form" method="PATCH"  enctype="multipart/form-data" novalidate>
                            {{ method_field('PATCH') }}
                                
                                <input type="hidden" id="id" value="{{$tpa->id}}" name="id"/>
                                <input type="hidden" id="kode" value="{{$tpa->kode}}" name="kode"/>
                                <h4 id="formTitle">Edit TPA</h4><hr>
                                <div class="">
                                    <h6><b>Data TPA :</b> </h6>
                                </div>
                                <div class="row">
                                      
                                    <div class="col-md-6">
                                        <div class="form-group mt-2 ml-3">
                                            <label for="pengelola" class="font-weight-bold fs-14">Pengelola<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" name="pengelola"
                                                id="pengelola" value="{{$tpa->pengelola}}" required>
                                        </div>
                                        
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_provinsi" class="font-weight-bold fs-14">Provinsi<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_provinsi" id="provinsi" autocomplete="off">
                                                 <option value="">Pilih</option>
                                                 @foreach($provinsi as $i)
                                                    <option value="{{$i->id}}" {{ $tpa->id_provinsi == $i->id ? 'selected' : '' }}>{{$i->n_provinsi}}</option>
                                                 @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_kabupaten" class="font-weight-bold fs-14">Kabupaten<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_kabupaten" id="kabupaten" autocomplete="off">
                                                <option value="">Pilih</option>
                                                 @foreach($kabupaten as $i)
                                                    <option value="{{$i->id}}" {{ $tpa->id_kabupaten == $i->id ? 'selected' : '' }}>{{$i->n_kabupaten}}</option>
                                                 @endforeach
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_kecamatan" class="font-weight-bold fs-14">Kecamatan<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_kecamatan" id="kecamatan" autocomplete="off">
                                                <option value="">Pilih</option>
                                                 @foreach($kecamatan as $i)
                                                    <option value="{{$i->id}}" {{ $tpa->id_kecamatan == $i->id ? 'selected' : '' }}>{{$i->n_kecamatan}}</option>
                                                 @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_kelurahan" class="font-weight-bold fs-14">Kelurahan<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_kelurahan" id="kelurahan" autocomplete="off">
                                                <option value="">Pilih</option>
                                                 @foreach($kelurahan as $i)
                                                    <option value="{{$i->id}}" {{ $tpa->id_kelurahan == $i->id ? 'selected' : '' }}>{{$i->n_kelurahan}}</option>
                                                 @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="alamat" class="font-weight-bold fs-14">Alamat<span
                                                    class="text-danger fs-12">*</span></label>
                                            <textarea name="alamat" id="alamat" class="form-control light" cols="5" rows="2">{{$tpa->alamat}}</textarea>
                                        </div>
                                        
           
                                                    
                                    
                                        <div class="form-group mt-2 ml-3">
                                            <label for="awal_beroprasi " class="font-weight-bold fs-14">Awal Operasi<span
                                                    class="text-danger fs-12">*</span></label>
                                                    <input type="date" class="form-control light fs-14" name="awal_beroprasi" id="awal_beroprasi"
                                                value="{{$tpa->awal_beroprasi}}" required>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="luas_landfil_aktif" class="font-weight-bold fs-14">Luas Landfill Aktif (m<sup>2</sup>)<span
                                                    class="text-danger fs-12"></span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="luas_landfil_aktif" id="luas_landfil_aktif"
                                                value="{{$tpa->luas_lanfil_aktif}}">
                                                <span style="font-size: 10px;">*contoh : 1500</span>
                                        </div>
                                       
                                        <div class="form-group mt-2 ml-3">
                                            <label for="jembatan_timbang" class="font-weight-bold fs-14">Jembatan Timbang<span
                                                    class="text-danger fs-12"></span></label>
                                            <input type="text" class="form-control light fs-14" name="jembatan_timbang" id="jembatan_timbang"
                                                value="{{$tpa->jembatan_timbang}}">
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="penutupan_sampah_aktif" class="font-weight-bold fs-14">Penutupan Sampah Zona Aktif<span
                                                    class="text-danger fs-12"></span></label>
                                            <input type="text" class="form-control light fs-14" name="penutupan_sampah_aktif" id="penutupan_sampah_aktif"
                                                value="{{$tpa->penutupan_sampah_aktif}}">
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="jumlah_sumur_pantau" class="font-weight-bold fs-14">Jumlah Sumur Pantau<span
                                                    class="text-danger fs-12"></span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="jumlah_sumur_pantau" id="jumlah_sumur_pantau"
                                                value="{{$tpa->jumlah_sumur_pantau}}">
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="drainase" class="font-weight-bold fs-14">Drainase<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="drainase" id="drainase" autocomplete="off">
                                                <option value="">Pilih</option>
                                                <option value="1" {{$tpa->drainase == 1 ? 'selected' : ''}}>ADA</option>
                                                <option value="2" {{$tpa->drainase == 2 ? 'selected' : ''}}>TIDAK ADA</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="pencatatan" class="font-weight-bold fs-14">Pencatatan<span
                                                    class="text-danger fs-12"></span></label>
                                            <textarea name="pencatatan" id="pencatatan" class="form-control light" cols="5" rows="2">{{$tpa->pencatatan}}</textarea>
                                        </div>
                                        
           
                                                    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2 ml-3">
                                            <label for="foto" class="font-weight-bold fs-14">Foto<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="file" class="form-control light fs-14" name="foto" id="foto"
                                                value="">
                                            <span style="font-size:10px; color: red;">*kosongkan bila tidak ingin merubah</span>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="nama_fasilitas" class="font-weight-bold fs-14">Nama Fasilitas<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" name="nama_fasilitas" id="nama_fasilitas"
                                                value="{{$tpa->nama_fasilitas}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="luas" class="font-weight-bold fs-14">Luas (m<sup>2</sup>)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="luas" id="luas"
                                                value="{{$tpa->luas}}" required>
                                            <span style="font-size:10px;">*contoh : 1000</span>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_jenis_tpa" class="font-weight-bold fs-14">Jenis TPA<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_jenis_tpa" id="id_jenis_tpa" autocomplete="off">
                                                <option value="">Pilih</option>
                                                <option value="1" {{$tpa->id_jenis_tpa == 1 ? 'selected' : ''}}>TPA SWASTA</option>
                                                <option value="2" {{$tpa->id_jenis_tpa == 2 ? 'selected' : ''}}>TPA PEMDA</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_status_tpa" class="font-weight-bold fs-14">Status TPA<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_status_tpa" id="id_status_tpa" autocomplete="off">
                                                <option value="">Pilih</option>
                                                @foreach($status_tpa as $i)
                                                <option value="{{$i->id}}" {{$tpa->id_status_tpa == $i->id ? 'selected' : ''}}>{{$i->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="ipl" class="font-weight-bold fs-14">IPL<span
                                                    class="text-danger fs-12"></span></label>
                                            <input type="text" class="form-control light fs-14" name="ipl" id="ipl"
                                                value="{{$tpa->ipl}}">
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="uji_lindi" class="font-weight-bold fs-14">Uji Lindi (dalam 1 tahun)<span
                                                    class="text-danger fs-12"></span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="uji_lindi" id="uji_lindi"
                                                value="{{$tpa->uji_lindi}}">
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="gas_metana" class="font-weight-bold fs-14">Pemanfaatan gas Metana<span
                                                    class="text-danger fs-12"></span></label>
                                            <input type="text" class="form-control light fs-14" name="gas_metana" id="gas_metana"
                                                value="{{$tpa->gas_metana}}">
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="jumlah_kk" class="font-weight-bold fs-14">Jumlah KK<span
                                                    class="text-danger fs-12"></span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="jumlah_kk" id="jumlah_kk"
                                                value="{{$tpa->jumlah_kk}}">
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_masuk" class="font-weight-bold fs-14">Sampah Masuk (ton)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_masuk" id="sampah_masuk"
                                                value="{{$tpa->sampah_masuk}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_landfil" class="font-weight-bold fs-14">Sampah Masuk Landfil (ton)<span
                                                    class="text-danger fs-12"></span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_landfil" id="sampah_landfil"
                                                value="{{$tpa->sampah_landfil}}">
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="kordinat" class="font-weight-bold fs-14">Kordinat<span
                                                    class="text-danger fs-12">*</span></label>
                                            <textarea name="kordinat" id="kordinat" class="form-control light" cols="5" rows="2" required>{{$tpa->kordinat}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div style="" class="ml-3 mt-3">

                                    <button type="submit" class="btn btn-success btn-sm" id="action"><i
                                            class="icon-save mr-1"></i>Rubah<span id="txtAction"></span></button>
                                    
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
            url = "{{ route('MasterTpa.tpa.update', ':id') }}".replace(':id', $('#id').val());
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                   table.api.reload();
                },
                error : function(data){
                    err = '';
                    respon = data.responseJSON;
                    if(respon.errors){
                        $.each(respon.errors, function( index, value ) {
                            err = err + "<li>" + value +"</li>";
                        });
                    }
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
            });
            return false;
        }
        $(this).addClass('was-validated');
    });


       

    </script>

@endsection
